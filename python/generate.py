import MySQLdb
import os
import randPass
projectList=''
fp=open("datauser.txt","w")
n=int(raw_input("Enter number of entries "))
target='/var/www/lag/controllers/gitCommands/repos/';
sessionID=randPass.gen()
for i in range(0,n):
	admno=raw_input("Enter admission number of user "+str(i+1)+" ")
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
	data=i+"|"+email+"| |0\n"
	fp.write(data)
	os.system("mkdir "+target+i) #Creating Directory for each project.
fp.close()
