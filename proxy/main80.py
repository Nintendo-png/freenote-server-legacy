from twisted.web import proxy, http
from twisted.internet import reactor
from twisted.python import log
import sys
import freenoteproxy
log.startLogging(sys.stdout)
 
class ProxyFactory(http.HTTPFactory):
    protocol = freenoteproxy.Proxy
 
reactor.listenTCP(80, ProxyFactory())
reactor.run()
