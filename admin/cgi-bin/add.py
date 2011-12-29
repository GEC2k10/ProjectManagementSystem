#!/usr/bin/env python
import cgi
import MySQLdb
import randPass
import smtplib
import mail
import os
class user:
	uname=''
	passwd=''
	project=''
	email=''
	def __init__(self,uname,project,email):
		self.uname=uname
		self.project=project
		self.email=email
		self.passwd=randPass.gen()
	def writeToDatabase(self):
		con=MySQLdb.connect("localhost","root","password","GitRepo")
		cursor=con.cursor()
		query="INSERT INTO Accounts VALUES('%s',SHA1('%s'),'%s','%s','%s','%s','%s')"\
		%(self.uname,self.passwd,self.project,self.email,' ',' ',' ')
		cursor.execute(query)
		con.close()
	def mail(self,login):
		if not mail.send(self.uname,self.passwd,self.email,login):
			return 0
		return 1
	def mkdir(self):
		try :
			os.mkdir('/var/www/repos/'+self.project,0777)
		except OSError:
			return
		os.system('chmod 777 /var/www/repos/'+self.project)
		return
def getLogin(password):
	server=smtplib.SMTP("smtp.gmail.com:587")
	server.starttls()
	server.login('gecgitrepository@gmail.com',password)
	return server
def getdata():
	form=cgi.FieldStorage()
	i=0
	server=getLogin(form['password'].value)
	while(1):
		try:
			uname=form['uname[%d]'%(i)].value
			project=form['project[%d]'%(i)].value
			email=form['email[%d]'%(i)].value
		except KeyError:
			break
		userObj=user(uname,project,email)
		i=i+1
		userObj.writeToDatabase()
		userObj.mail(server)
		userObj.mkdir()
	server.quit()
def redirect():
	print "Content-type: text/html\n\n"
	print '''
	<html>
	<body onload="document.location='/'">
	</html>
	'''
getdata()
redirect()
