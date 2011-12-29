#!/usr/bin/env python
import MySQLdb
import cgi
import commons

def changePassword():
	form=cgi.FieldStorage()
	try:
		uname=form['uname'].value
		passwd=form['passwd'].value
	except KeyError:
		commons.redirect('/recoverPassword.html')
	con=MySQLdb.connect("localhost","root","password","GitRepo")
	cursor=con.cursor()
	cursor.execute("SELECT * FROM Accounts WHERE uname='%s'"%(uname))
	if int(cursor.rowcount) == 0:
		commons.redirect('/recoverPassword.html')
	else :
		cursor.execute("UPDATE Accounts SET passwd=SHA1('%s') WHERE uname='%s'"%(passwd,uname))
		con.close();
	commons.redirect('/')
changePassword()


