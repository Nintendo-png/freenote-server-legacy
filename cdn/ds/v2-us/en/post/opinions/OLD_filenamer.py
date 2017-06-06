#Freenote Thing

import contextlib
import mmap
import sys
import rstr
import os
import numpy
filename = sys.argv[1]

#peders helper functions
def AscDec(ascii, LittleEndian=False):#Converts a ascii string into a decimal
	ret = 0
	l = map(ord, ascii)
	if LittleEndian: l.reverse()
	for i in l:
		ret = (ret<<8) | i
	return ret
def DecAsc(dec, length=None, LittleEndian=False):#Converts a decimal into an ascii string of chosen length
	out = []
	while dec <> 0:
		out.insert(0, dec&0xFF)
		dec >>= 8
	#"".join(map(chr, out))
	
	if length:
		if len(out) > length:
			#return "".join(map(chr, out[-length:]))
			out = out[-length:]
		if len(out) < length:
			#return "".join(map(chr, [0]*(length-len(out)) + out))
			out = [0]*(length-len(out)) + out
			
	if LittleEndian: out.reverse()
	return "".join(map(chr, out))
def AddPadding(i,pad = 0x10):#used mainly for zipaligning offsets
	if i % pad <> 0:
		return i + pad - (i % pad)
	return i

with open(filename, 'r') as f:
	with contextlib.closing(mmap.mmap(f.fileno(), 0, access=mmap.ACCESS_READ)) as m:
		global fb
		hdr = m.read(1696)
		fb = m[123:136]
		fb2 = m[105:118]
		p1 = m[0x56:0x5e][::-1].encode("HEX").upper()[-6:]
		nm = AscDec(m[12:14], True)
		snm="thatjusthappened"
		if(nm<10):
			snm="00"+str(nm)
		elif(nm<100):
			snm="0"+str(nm)
		else:
			snm=str(nm)
if(fb==fb2):
	fn = p1+"_"+fb+"_"+snm+".ppm"
	os.rename(filename,fn)
	print fn
	with open(fn[:-3]+"tmb", 'w') as f:
		ba = bytearray(hdr)
		f.write(ba)
else:
	print "Corrupted Comment"