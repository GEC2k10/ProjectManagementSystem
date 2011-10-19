import smtplib
import string
import MySQLdb
from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText 
import randPass
handle=MIMEMultipart()
handle["From"]="gecgitrepoitory@gmail.com"
handle["Subject"]=" Confirmation Email from  GEC Git Repo "
db = MySQLdb.connect(host="localhost",user="root",passwd="password",db="GitRepo")
cursor=db.cursor()
updateCursor=db.cursor()
passwd=raw_input("Enter password ");
server = smtplib.SMTP("smtp.gmail.com:587")
server.starttls()
server.login("gecgitrepository@gmail.com",passwd)
query="select * from Accounts where passwordMailed !='1'"
cursor.execute(query)
row=cursor.fetchone()
while row:
	randword=randPass.gen()
	query=" update Accounts set passwd=SHA1('"+randword+"'),passwordMailed='1' where uname='"+row[0]+"'";
	updateCursor.execute(query)
	handle["To"]=row[3]
	message=''' This is a computer generated Email.Please note That reply to this address may not be monitered
               You have received this mail  as you have requested for confirmation code  of GEC GitRepository.

	       Here are your account details:
	       Username          : ''' + row[0] +'''
	       Confirmation Code : ''' + randword + ''' 
	        

	       if you have no idea what is happening , please ignore this mail
	       Some body might have entered your Mail Id by mistake. '''
	
	handle.attach(MIMEText(message))
	server.sendmail("gecgitrepository@gmail.com",row[3],handle.as_string())
	print "Mail sent to "+row[3]
	row = cursor.fetchone()
server.quit()
