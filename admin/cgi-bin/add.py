import cgi
import MySQLdb
import randPass
import smtplib
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
		con=MySQLdb.connect("localhost","root","passsword","GitRepo")
		cursor=con.cursor()
		query="INSERT INTO Accounts VALUES('%s',SHA1('%s'),'%s','%s','%s','%s','%s')"%(self.uname,self.passwd,self.project,self.email,' ',' ',' ')
		cursor.execute(query)
		con.close()
	def mail(self,login):

def getLogin(password):





def getdata():
	form=cgi.FieldStorage()
	i=0
	while(form['uname[%d]'%(i)].value!=''):
		userObject=user(form['uname[%d]'%(i)].value,form['project[%d]'%(i)].value,form['email[%d]'%(i)].value)
		i=i+1
		userObject.writeToDatabase()
		userObject.mail(getLogin(form['mail'].value))
