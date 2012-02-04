#!/usr/bin/env python
import cgi
import MySQLdb
import randPass
import smtplib
import mail
import os
import commons
class user:
	uname=''
	passwd=''
	project=''
	email=''
	def __init__(self,uname,name,project,email):
		self.uname=uname
		self.project=project
		self.email=email
		self.passwd=randPass.gen()
	def writeToDatabase(self):
		con=MySQLdb.connect("localhost","root","password","GitRepo")
		cursor=con.cursor()
		query="INSERT INTO Accounts VALUES('%s','%s',SHA1('%s'),'%s','%s','%s')"\
		%(self.uname,self.name,self.passwd,self.project,self.email,' ')
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
			name=form['name[%d]'%(i)].value
			project=form['project[%d]'%(i)].value
			email=form['email[%d]'%(i)].value
		except KeyError:
			break
		userObj=user(uname,name,project,email)
		i=i+1
		userObj.writeToDatabase()
		userObj.mail(server)
		userObj.mkdir()
	server.quit()
getdata()
commons.redirect('/lag/admin')
