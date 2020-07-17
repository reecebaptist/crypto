#RSA Algorithm:
import math
p=13
q=17
M=int(input('Enter: '))

#Step #1:
#Find n
n=p*q
print("N is: ",n)
#Step #2:
#Find phi(n)
phi=(p-1)*(q-1)
print("Phi is ",phi)
#Step #3:
#Assume e:
for i in range(2,phi):
	if(math.gcd(i,phi)==1):
		e=i
		break

print("E is: ",e)
#Step #4:
#Assume d:
a=e%phi
for i in range(1,phi):
	if((a*i)%phi==1):
		d=i
		break
	else:
		d=1
print("D is: ",d)
#Step #5:
#Encrypt M:
C=(M**e)%n
print("Cipher Text: ",C)
C=str(C)
fileobj=open(r"encry.txt.enc","w")
fileobj.write(C)
fileobj.close()

fileobj2=open(r"encry.txt.enc","r")
CC=fileobj2.read()
fileobj2.close()

MM=(int(CC)**d)%n
print(MM,"Booyah!")






	
