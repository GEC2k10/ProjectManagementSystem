#!/usr/bin/env python


import MySQLdb
import Cookie
import os
from datetime import datetime,timedelta
from hashlib import sha1
def redirect(url):
#	print "Content-type: text/html"
	print '''
	<html>
	<body onload="document.location='%s'">
	</html>
	'''%(url)

def setCookie():
	con=MySQLdb.connect('localhost','root','password','GitRepo')
	cur=con.cursor()
	ssid=sha1(str(datetime.now())).hexdigest()
	expiration = datetime.now() + timedelta(minutes=15)
	expiry=expiration.strftime("%a, %d-%b-%Y %H:%M:%S GMT")
	cur.execute("UPDATE Accounts SET sessionID='%s' WHERE uname='admin'"%(ssid))
	print '''Content-type: text/html\nSet-Cookie:session= %s\nSet-Cookie:Expires= %s\r\n'''%(ssid,expiry)
	print os.environ['HTTP_COOKIE']
	con.close()
	return 

def checkCookie():
	con=MySQLdb.connect('localhost','root','password','GitRepo')
	cur=con.cursor()
	if cur.execute("SELECT sessionID FROM Accounts WHERE uname='admin'"):
		ssid=cur.fetchone()[0]
		con.close()
		if os.environ.has_key('HTTP_COOKIE'):		
			sessionID=os.environ['HTTP_COOKIE'].find('session')
			if sessionID !=-1:
				print os.environ['HTTP_COOKIE'][8:48] == ssid
				return True
	return True 
