#!/usr/bin/env python
def displayForm(): 
	inputTags='''
		%d<input type=text name=uname[%d] style=display:inline>
		<input type=text name=project[%d] style=display:inline>
		<input type=text name=email[%d] style=display:inline><br>
		'''
	spaces='&nbsp;'
	indexedInputTags=''
	for i in range(0,10):
		indexedInputTags+=inputTags%(i+1,i,i,i)
	form='''
	<html>
	<body bgcolor=#efefef style=font-family:ubuntu>
	<h1>Add new users.</h1>
	Username%sProject name%sEmail ID
	<form action=add.py method=post>
	%s
	%s<input type=submit value='Add users' style=height:50px>
	</form>
	</body>
	</html>'''%(spaces*40,spaces*40,indexedInputTags,spaces*60)
	print "Content-type: text/html\n\n"
	print form
displayForm()


		
