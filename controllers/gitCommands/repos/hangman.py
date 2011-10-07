import random
import string
def Occurence(string,char):
	occ = []
	j=0
	for i in range(0,len(string)):
		if string[i] == char:
			occ.append(i)
			j+=1
	return occ
f=open("words")
j=random.randrange(1,11956)
i=0
for line in f:
	i+=1
	if i == j:
		Guess=line
Guess=string.lower(Guess)
stat="HANGMAN";Yourguess=""
for i in range(1,len(Guess)):
	Yourguess+="*"
i=0
while i<7:	
	c=raw_input('Enter the character : ')
	occ=Occurence(Guess,c);
	if len(occ) == 0	:
		i+=1
		print stat[0:i]
	for j in range(0,len(occ)):
		Yourguess=list(Yourguess)
		Yourguess[occ[j]]=c;
		Yourguess= "".join(Yourguess)
		if Guess == Yourguess:
			print "You won"
			exit
	print Yourguess
if Guess == Yourguess:
	print "You won"
else :
	print "The word was ",Guess	
