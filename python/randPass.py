import random
if __name__ == "__main__":
	gen()
def gen():
	small='a b c d e f g h i j k l m n o p q r s t u v w x y z'
	caps=small.upper().split()
	small=small.split()
	num='1 2 3 4 5 6 7 8 9 0'.split()
	lst=''
	passwd=''
	for i in range(0,8):
		ch=random.randint(1,3)
		if ch==1:
			lst=small
		elif ch==2:
			lst=caps
		else:
			lst=num
		passwd+=lst[random.randint(0,len(lst)-1)]
	return passwd




	
