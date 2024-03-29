# -*- test-case-name: twisted.web.test.test_proxy -*-
# Copyright (c) Twisted Matrix Laboratories & Freenote People.
# See LICENSE for details.

"""
Freenote Proxy

Just the TwistedWeb random proxy.py

With, some changes of course.
"""
from __future__ import absolute_import, division

from twisted.python.compat import urllib_parse, urlquote
from twisted.internet import reactor
from twisted.internet.protocol import ClientFactory
from twisted.web.resource import Resource
from twisted.web.server import NOT_DONE_YET
from twisted.web.http import HTTPClient, Request, HTTPChannel, _QUEUED_SENTINEL

global servaddr
global killaddr

servdomain = "cdn.freenote.xyz"
servaddr = "192.168.1.139"
killaddr = "192.168.1.135"



class ProxyClient(HTTPClient):
	"""
	Used by ProxyClientFactory to implement a simple web proxy.

	@ivar _finished: A flag which indicates whether or not the original request
		has been finished yet.
	"""
	_finished = False

	def __init__(self, command, rest, version, headers, data, father):
		self.father = father
		self.command = command
		self.rest = rest
		if b"proxy-connection" in headers:
			del headers[b"proxy-connection"]
		headers[b"connection"] = b"close"
		headers.pop(b'keep-alive', None)
		headers[b"DSI_SID"]=None;
		self.headers = headers
		self.data = data


	def connectionMade(self):
		self.sendCommand(self.command, self.rest)
		for header, value in self.headers.items():
			self.sendHeader(header, value)
		self.endHeaders()
		self.transport.write(self.data)


	def handleStatus(self, version, code, message):
		self.father.setResponseCode(int(code), message)


	def handleHeader(self, key, value):
		# t.web.server.Request sets default values for these headers in its
		# 'process' method. When these headers are received from the remote
		# server, they ought to override the defaults, rather than append to
		# them.
		if key.lower() in [b'server', b'date', b'content-type']:
			self.father.responseHeaders.setRawHeaders(key, [value])
		else:
			self.father.responseHeaders.addRawHeader(key, value)


	def handleResponsePart(self, buffer):
		self.father.write(buffer)


	def handleResponseEnd(self):
		"""
		Finish the original request, indicating that the response has been
		completely written to it, and disconnect the outgoing transport.
		"""
		if not self._finished:
			self._finished = True
			self.father.finish()
			self.transport.loseConnection()



class ProxyClientFactory(ClientFactory):
	"""
	Used by ProxyRequest to implement a simple web proxy.
	"""

	protocol = ProxyClient


	def __init__(self, command, rest, version, headers, data, father):
		self.father = father
		self.command = command
		self.rest = rest
		self.headers = headers
		self.data = data
		self.version = version


	def buildProtocol(self, addr):
		return self.protocol(self.command, self.rest, self.version,
							 self.headers, self.data, self.father)


	def clientConnectionFailed(self, connector, reason):
		"""
		Report a connection failure in a response to the incoming request as
		an error.
		"""
		self.father.setResponseCode(501, b"Gateway error")
		self.father.responseHeaders.addRawHeader(b"Content-Type", b"text/html")
		self.father.write(b"<H1>Could not connect</H1>")
		self.father.finish()



class ProxyRequest(Request):
	"""
	Used by Proxy to implement a simple web proxy.

	@ivar reactor: the reactor used to create connections.
	@type reactor: object providing L{twisted.internet.interfaces.IReactorTCP}
	"""

	protocols = {b'http': ProxyClientFactory}
	ports = {b'http': 80}

	def __init__(self, channel, queued=_QUEUED_SENTINEL, reactor=reactor):
		Request.__init__(self, channel, queued)
		self.reactor = reactor


	def process(self):
		parsed = urllib_parse.urlparse(self.uri)
		protocol = parsed[0]
		host = parsed[1].decode('ascii')
		port = self.ports[protocol]
		if ':' in host:
			hurl = host.split(':')[0]
		else:
			hurl = host
		if hurl == "flipnote.hatena.com" or hurl == servdomain or hurl == "conntest.nintendo.com":
			if hurl == "flipnote.hatena.com" or hurl == servdomain:
				host = servaddr
			else:
				pass
		else:
			host = killaddr
		if ':' in host:
			host, port = host.split(':')
			port = int(port)
		rest = urllib_parse.urlunparse((b'', b'') + parsed[2:])
		if not rest:
			rest = rest + b'/'
		class_ = self.protocols[protocol]
		headers = self.getAllHeaders().copy()
		if b'host' not in headers:
			headers[b'host'] = host.encode('ascii')
		self.content.seek(0, 0)
		s = self.content.read()
		clientFactory = class_(self.method, rest, self.clientproto, headers,
							   s, self)
		self.reactor.connectTCP(host, port, clientFactory)



class Proxy(HTTPChannel):
	"""
	This class implements a simple web proxy.

	Since it inherits from L{twisted.web.http.HTTPChannel}, to use it you
	should do something like this::

		from twisted.web import http
		f = http.HTTPFactory()
		f.protocol = Proxy

	Make the HTTPFactory a listener on a port as per usual, and you have
	a fully-functioning web proxy!
	"""

	requestFactory = ProxyRequest



class ReverseProxyRequest(Request):
	"""
	Used by ReverseProxy to implement a simple reverse proxy.

	@ivar proxyClientFactoryClass: a proxy client factory class, used to create
		new connections.
	@type proxyClientFactoryClass: L{ClientFactory}

	@ivar reactor: the reactor used to create connections.
	@type reactor: object providing L{twisted.internet.interfaces.IReactorTCP}
	"""

	proxyClientFactoryClass = ProxyClientFactory

	def __init__(self, channel, queued=_QUEUED_SENTINEL, reactor=reactor):
		Request.__init__(self, channel, queued)
		self.reactor = reactor


	def process(self):
		"""
		Handle this request by connecting to the proxied server and forwarding
		it there, then forwarding the response back as the response to this
		request.
		"""
		self.requestHeaders.setRawHeaders(b"host",
										  [self.factory.host.encode('ascii')])
		clientFactory = self.proxyClientFactoryClass(
			self.method, self.uri, self.clientproto, self.getAllHeaders(),
			self.content.read(), self)
		self.reactor.connectTCP(self.factory.host, self.factory.port,
								clientFactory)



class ReverseProxy(HTTPChannel):
	"""
	Implements a simple reverse proxy.

	For details of usage, see the file examples/reverse-proxy.py.
	"""

	requestFactory = ReverseProxyRequest



class ReverseProxyResource(Resource):
	"""
	Resource that renders the results gotten from another server

	Put this resource in the tree to cause everything below it to be relayed
	to a different server.

	@ivar proxyClientFactoryClass: a proxy client factory class, used to create
		new connections.
	@type proxyClientFactoryClass: L{ClientFactory}

	@ivar reactor: the reactor used to create connections.
	@type reactor: object providing L{twisted.internet.interfaces.IReactorTCP}
	"""

	proxyClientFactoryClass = ProxyClientFactory


	def __init__(self, host, port, path, reactor=reactor):
		"""
		@param host: the host of the web server to proxy.
		@type host: C{str}

		@param port: the port of the web server to proxy.
		@type port: C{port}

		@param path: the base path to fetch data from. Note that you shouldn't
			put any trailing slashes in it, it will be added automatically in
			request. For example, if you put B{/foo}, a request on B{/bar} will
			be proxied to B{/foo/bar}.  Any required encoding of special
			characters (such as " " or "/") should have been done already.

		@type path: C{str}
		"""
		Resource.__init__(self)
		self.host = host
		self.port = port
		self.path = path
		self.reactor = reactor


	def getChild(self, path, request):
		"""
		Create and return a proxy resource with the same proxy configuration
		as this one, except that its path also contains the segment given by
		C{path} at the end.
		"""
		return ReverseProxyResource(
			self.host, self.port, self.path + b'/' + urlquote(path, safe=b"").encode('utf-8'),
			self.reactor)


	def render(self, request):
		"""
		Render a request by forwarding it to the proxied server.
		"""
		# RFC 2616 tells us that we can omit the port if it's the default port,
		# but we have to provide it otherwise
		if self.port == 80:
			host = self.host
		else:
			host = self.host + u":" + str(self.port)
		request.requestHeaders.setRawHeaders(b"host", [host.encode('ascii')])
		request.content.seek(0, 0)
		qs = urllib_parse.urlparse(request.uri)[4]
		if qs:
			rest = self.path + b'?' + qs
		else:
			rest = self.path
		clientFactory = self.proxyClientFactoryClass(
			request.method, rest, request.clientproto,
			request.getAllHeaders(), request.content.read(), request)
		self.reactor.connectTCP(self.host, self.port, clientFactory)
		return NOT_DONE_YET
