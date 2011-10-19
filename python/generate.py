import MySQLdb
import os
import randPass
db = MySQLdb.connect(host="localhost",user="root",passwd="password",db="GitRepo")
cursor = db.cursor()
projectList=''
fp=open("data.txt","w")
n=int(raw_input("Enter number of entries "))
target='/var/www/lag/controllers/gitCommands/repos/';
sessionID=randPass.gen()
for i in range(0,n):
	admno=raw_input("Enter admission number of user "+str(i+1)+" ")
	project=raw_input("Enter project name of user "+str(i+1)+" ")
	cursor.execute("create table  user"+admno+"( Contributions char(40) primary key,Date char(20) )")#Creates table in DB for each user
	if project not in projectList:
		projectList+=project+" "
	email=raw_input("Enter email ID of user "+str(i+1)+" ")
	data=admno+"| |"+project+"|"+email+"| | |0|"+sessionID+"|0\n"
	fp.write(data)
projectList=projectList.split()
for i in projectList: 
	project=raw_input("Enter the email ID of guide for "+i+" : ")
	data=admno+"| |"+project+"|"+email+"| | |0|"+sessionID+"|0\n"
	fp.write(data)
	os.system("mkdir "+target+i) #Creating Directory for each project.
cursor.execute(" load data local infile \"/var/www/lag/python/data.txt\" into table Accounts fields terminated by \"|\"")
fp.close()
