#!/usr/bin/env python
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText 
def send(uname,passwd,email,server):
	handle=MIMEMultipart()
	handle["From"]="gecgitrepoitory@gmail.com"
	handle["Subject"]=" Confirmation Email from  GEC Git Repo "
	handle["To"]=email
	message='''
This is a computer generated Email.Please note that replies to this address may not be monitered.You have
received this mail as you have registered in  GEC Project Tracker.

Here are your account details:
	Username	:		%s 
	Password	:		%s 
If you have no idea what is happening,please ignore this mail.Some body might have entered your Mail ID by
mistake. 
'''%(uname,passwd)
	handle.attach(MIMEText(message))
	if(server.sendmail("gecgitrepository@gmail.com",email,handle.as_string())):
		return 0
	return 1
