#This script will collect the details of students and guide.This is the script that has to be run for the first time.This script creates two files, datauser.txt and dataguide.txt. The details collected can be verified in that files. It is from the above files that the the database is loaded by the script UpdateDb.py. 
import MySQLdb
import os
import randPass
db=MySQLdb.connect(host="localhost",user="root",passwd="password",db="GitRepo")
cursor=db.cursor()
projectList=''
fp=open("datauser.txt","w")
n=int(raw_input("Enter number of entries "))
target='/var/www/lag/controllers/gitCommands/repos/';
sessionID=randPass.gen()
for i in range(0,n):
	admno=raw_input("Enter admission number of user "+str(i+1)+" ")
	query=("CREATE TABLE user"+admno+" ( Contribution varchar(40), DateandTime varchar(40),Commitsha varchar(40) primary key )")
	cursor.execute(query);
	project=raw_input("Enter project name of user "+str(i+1)+" ")
	if project not in projectList:
		projectList+=project+" "
	email=raw_input("Enter email ID of user "+str(i+1)+" ")
	data=admno+"| |"+project+"|"+email+"| | |0|"+sessionID+"|0\n"
	fp.write(data)
fp.close()
fp=open("dataguide.txt","w")
projectList=projectList.split()
for i in projectList: 
	email=raw_input("Enter the email ID of guide for "+i+" : ")
	data=i+"| |"+project+"|"+email+"| | |0|"+sessionID+"|0\n"
	fp.write(data)
	os.system("mkdir "+target+i) #Creating Directory for each project.
fp.close()
