import MySQLdb
db = MySQLdb.connect(host="localhost",user="root",passwd="mysql",db="GitRepo")
cursor = db.cursor()
fp=open("/var/www/data.txt","w")
n=int(raw_input("Enter number of entries "))
for i in range(0,n):
	admno=raw_input("Enter admission number of user "+str(i+1)+" ")
	project=raw_input("Enter project name of user "+str(i+1)+" ")
	email=raw_input("Enter email ID of user "+str(i+1)+" ")
	data=admno+"| |"+project+"|"+email+"| | |0|0|0\n"
	fp.write(data)
fp.close()
cursor.execute(" load data local infile \"/var/www/data.txt\" into table Accounts fields terminated by \"|\"")



