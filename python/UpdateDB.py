#This script will update th DB according to the files dataguide.txt and  datauser.txt. This script is to be executed after running generate.py ,which creates dataguide.txt and datauser.txt.
import MySQLdb
db = MySQLdb.connect(host="localhost",user="root",passwd="password",db="GitRepo")
cursor = db.cursor()
cursor.execute("load data local infile \"/var/www/lag/python/datauser.txt\" into table Accounts fields terminated by \"|\"")
cursor.execute("load data local infile \"/var/www/lag/python/dataguide.txt\" into table Accounts fields terminated by \"|\"")
