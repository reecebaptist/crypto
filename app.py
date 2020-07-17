from flask import Flask, render_template, request
from Crypto import Random
from Crypto.Cipher import AES
import os
import os.path
from os import listdir
from os.path import isfile, join
import time
import hashlib

app = Flask(__name__)

class Encryptor:
    def __init__(self, key):
        self.key = key

    def pad(self, s):
        return s + b"\0" * (AES.block_size - len(s) % AES.block_size)

    def encrypt(self, message, key, key_size=256):
        message = self.pad(message)
        iv = Random.new().read(AES.block_size)
        cipher = AES.new(key, AES.MODE_CBC, iv)
        return iv + cipher.encrypt(message)

    def encrypt_file(self, file_name):
        with open(file_name, 'rb') as fo:
            plaintext = fo.read()
        enc = self.encrypt(plaintext, self.key)
        with open(file_name + ".enc", 'wb') as fo:
            fo.write(enc)
        os.remove(file_name)

    def decrypt(self, ciphertext, key):
        iv = ciphertext[:AES.block_size]
        cipher = AES.new(key, AES.MODE_CBC, iv)
        plaintext = cipher.decrypt(ciphertext[AES.block_size:])
        return plaintext.rstrip(b"\0")

    def decrypt_file(self, file_name):
        with open(file_name, 'rb') as fo:
            ciphertext = fo.read()
        dec = self.decrypt(ciphertext, self.key)
        with open(file_name[:-4], 'wb') as fo:
            fo.write(dec)
        os.remove(file_name)

src=""    
def decider(k1,k2,k3):
	if(k1=='encrypt'):
		src="Encryption Successfull!"
		enc = Encryptor(k3)
		enc.encrypt_file(str(k2))
	elif(k1=='decrypt'):
		enc = Encryptor(k3)
		enc.decrypt_file(str(k2))


def decider2(k0):
	m = hashlib.md5(k0.encode())
	return m.digest()
	
def decider3(k1):
	if(k1=='encrypt'):
		return "Encryption Successfull!"
	elif(k1=='decrypt'):
		return "Decryption Successfull!"
	
@app.route('/')
def index():
    return render_template('encrypt.php')

@app.route('/',methods=['POST'])
def getvalue():
    password = request.form['key']
    key=decider2(password)
    fil = request.form['file']
    choice = request.form['drop']
    decider(choice,fil,key)
    src=decider3(choice)
    return render_template('encrypt.php',k=src)


	

if __name__ == '__main__':
    app.run(debug=True)
