__author__ = 'Patel, Chintal Ashok Kumar'
"""
CSCI.622.01 - Data Security and Privacy :: Project
Author: Patel, Chintal Ashok Kumar (cap4677@g.rit.edu)

This is the implementation of AES algorithm on image file.
"""


from Crypto import Random
from Crypto.Cipher import AES
import os
import os.path
from os import listdir
from os.path import isfile, join
import sys

class AES_Algo:
    def __init__(self, input_image_file_path):
        self.input_image_file_path = input_image_file_path
        self.key = b'[EX\xc8\xd5\xbfI{\xa2$\x05(\xd5\x18\xbf\xc0\x85)\x10nc\x94\x02)j\xdf\xcb\xc4\x94\x9d(\x9e'
        self.key_size = 256
        
    def encrypt(self, message):
        message += b"\0" * (AES.block_size - len(message) % AES.block_size)
        iv = Random.new().read(AES.block_size)
        cipher = AES.new(self.key, AES.MODE_CBC, iv)
        return iv + cipher.encrypt(message)
    
    def decrypt(self, ciphertext):
        iv = ciphertext[:AES.block_size]
        cipher = AES.new(self.key, AES.MODE_CBC, iv)
        plaintext = cipher.decrypt(ciphertext[AES.block_size:])
        return plaintext.rstrip(b"\0")
    
    def operation(self, operation):
        if operation == "encrypt":
            with open(self.input_image_file_path, 'rb') as fo:
                text = fo.read()
            enc = self.encrypt(text)
            with open(self.input_image_file_path + ".smc", 'wb') as fo:
                fo.write(enc)
            os.remove(self.input_image_file_path)
        elif operation == 'decrypt':
            with open(self.input_image_file_path + ".smc", 'rb') as fo:
                text = fo.read()
            dec = self.decrypt(text)
            with open(self.input_image_file_path, 'wb') as fo:
                fo.write(dec)
            os.remove(self.input_image_file_path + ".smc")

def main():
    operation = sys.argv[1]
    file_path = sys.argv[2]
    obj = AES_Algo(file_path)
    obj.operation(operation)
    print('done')

if __name__ == "__main__":
    main()