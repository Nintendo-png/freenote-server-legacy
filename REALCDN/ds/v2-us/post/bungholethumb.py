#Gootcheds Bad Thumbnail Script
import contextlib
import mmap
filename = "bunghole.ppm"

with open(filename, 'r') as f:
    with contextlib.closing(mmap.mmap(f.fileno(), 0, access=mmap.ACCESS_READ)) as m:
        global fb
        global ib
        global lb
        lb = m[102:102+3] #Everything after the 32 bytes we appended
        print(lb)
