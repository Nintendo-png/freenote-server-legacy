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

with open(filename, 'r') as f:
	with contextlib.closing(mmap.mmap(f.fileno(), 0, access=mmap.ACCESS_READ)) as m:
		print m[0x40:0x56].replace('^', "~").replace("\x08\xe0", "*&#").replace("\x00", "").replace("\xFF", "").replace("\x20", "")+" ("+m[0x8a:0x92][::-1].encode("HEX").upper()+")"
		#print ':'.join(x.encode('hex') for x in m[0x40:0x56].replace('^', "~").replace("\x08\xe0", "*&#").replace("\x00", "").replace("\x20", ""))