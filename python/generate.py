import MySQLdb
import os
db = MySQLdb.connect(host="localhost",user="root",passwd="root-user",db="GitRepo")
cursor = db.cursor()
projectList=''
fp=open("data.txt","w")
n=int(raw_input("Enter number of entries "))
for i in range(0,n):
	admno=raw_input("Enter admission number of user "+str(i+1)+" ")
	project=raw_input("Enter project name of user "+str(i+1)+" ")
	if project not in projectList:
		projectList+=project+" "
	email=raw_input("Enter email ID of user "+str(i+1)+" ")
	data=admno+"| |"+project+"|"+email+"| | |0|0|0\n"
	fp.write(data)
fp.close()
projectList=projectList.split()
target='/home/rajeevs/lag/controllers/gitCommands/repos/';
for i in projectList:
	os.system("mkdir "+target+i)
cursor.execute(" load data local infile \"/var/www/data.txt\" into table Accounts fields terminated by \"|\"")



