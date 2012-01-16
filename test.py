#!/usr/bin/env python
import os
print '''Content-type: text/html\nSet-Cookie: session=12345\n\n'''

print os.environ['HTTP_COOKIE']


