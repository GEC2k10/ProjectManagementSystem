import sys
import smtplib
to=sys.argv[1];
frm="gecgitrepository@gmail.com";
password="giagc.ilg"
message="Hello\n,This is your new password (dfijgdflh) of your GitRepository account\nThanks"
server=smtplib.SMTP("smtp.gmail.com:587")
server.starttls()
server.login(frm,password)
server.sendmail(frm,to,message)
server.quit()
