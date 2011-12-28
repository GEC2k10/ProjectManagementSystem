#!/usr/bin/env python
import MySQLdb
import cgi

def getCols():
	con=MySQLdb.connect("localhost","root","password","GitRepo");
	cursor=con.cursor();
	cursor.execute("SELECT uname FROM Accounts WHERE uname != projectName");
	l=cursor.fetchall()
	return l
def display():
	data=getCols()
	unames=''
	for i in data:
		unames+='<input type=checkbox value='+i[0].encode("utf-8","ignore")+'>'+i[0]+'<br>'
	print "Content-type: text/html\n\n"
	html='''
	<html>
	<title>Timeline</title>
	<body  bgcolor=#dfdfdf alink="#ee0000" link="#0000ee" vlink="#551a8b">
	%s	
	</body>
	</html>
	'''
	print html%(unames)
display()


