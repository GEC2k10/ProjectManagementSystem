#!/usr/bin/env python
def redirect(url):
	print "Content-type: text/html\n\n"
	print '''
	<html>
	<body onload="document.location='%s'">
	</html>
	'''%(url)
