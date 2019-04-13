"""
Created on Fri Feb  28 10:01:04 2019

@author: chintal

This prgram encrypts and decrypts the message using Caesar Cipher algorithm.

"""
import os
import os.path
import sys
class CeasarCipher:
    def encryption(self, secret_text_file_path):
        '''
        This function encrypts each character the message. The first character is
        randomly encrypted by adding the ascii value of it with the random number
        generated. Later, if index of the character is divisble by 2, then the new
        character will have ascii value equal to ascii value of old character plus 2.
        if index of the character is divisble by 3, then the new character will
        have ascii value equal to ascii value of old character plus 3. Else, the
        new character will have ascii value equal to ascii value of old character
        plus 1.

        '''
        snapshot_file = open(secret_text_file_path, "r+")
        message = snapshot_file.readline()
#         print(message)
        snapshot_file.close()
        encrypted_message = ""
        for index in range(len(message)):
            letter = message[index].lower()
            if (ord(letter) >= 97 and ord(letter) <= 122):
                
                if message[index] == 'X' or message[index] == 'x':
                    new_alpha = ord(message[index]) + 2
                    new_alpha = chr(new_alpha)
                    encrypted_message = encrypted_message + new_alpha
                
                elif message[index] == 'Y' or message[index] == 'y':
                    new_alpha = ord(message[index]) - 23
                    new_alpha = chr(new_alpha)
                    encrypted_message = encrypted_message + new_alpha
                    
                elif message[index] == 'Z' or message[index] == 'z':
                    new_alpha = ord(message[index]) - 25
                    new_alpha = chr(new_alpha)
                    encrypted_message = encrypted_message + new_alpha
                    
                elif index % 2 == 0:
                    new_alpha = ord(message[index]) + 2
                    new_alpha = chr(new_alpha)
                    encrypted_message = encrypted_message + new_alpha
                    
                elif index % 3 == 0:
                    new_alpha = ord(message[index]) + 3
                    new_alpha = chr(new_alpha)
                    encrypted_message = encrypted_message + new_alpha
                    
                else:
                    new_alpha = ord(message[index]) + 1
                    new_alpha = chr(new_alpha)
                    encrypted_message = encrypted_message + new_alpha
            else:
                encrypted_message = encrypted_message + message[index]

        snapshot_file = open(secret_text_file_path + ".smc", "w")
        snapshot_file.write(encrypted_message)
        snapshot_file.close()
#         os.remove(secret_text_file_path)
        print('level1:', encrypted_message,"\n\n")

        return encrypted_message


    def charCheck(self, c):
        if (ord('a') <= ord(c) and ord('z') >= ord(c)) or (ord('A') <= ord(c) and ord('Z') >= ord(c)) or (ord('0') <= ord(c) and ord('9') >= ord(c)):
            return True
        else:
            return False
        
    def decryption(self, secret_text_file_path):
        '''
        This function decrypts each character the message. The first character is
        decrypted using the random number generated during encryption by subtracting
        the ascii value of it with the random number provided. Later, if index of
        the character is divisble by 2, then the new character will have ascii
        value equal to ascii value of old character minus 2. If index of the
        character is divisble by 3, then the new character will have ascii value
        equal to ascii value of old character minus 3. Else, the new character will
        have ascii value equal to ascii value of old character minus 1.

        '''
        snapshot_file = open(secret_text_file_path + ".smc", "r+")
        encrypted_message = snapshot_file.readline()
#         print(encrypted_message)
        snapshot_file.close()

        decrypted_message = ""
        for index in range(len(encrypted_message)):
            letter = encrypted_message[index].lower()
            if (ord(letter) >= 97 and ord(letter) <= 122):
                
                if encrypted_message[index] == 'Z' or encrypted_message[index] == 'z':
                    new_alpha = ord(encrypted_message[index]) - 2
                    new_alpha = chr(new_alpha)
                    decrypted_message = decrypted_message + new_alpha
                
                elif encrypted_message[index] == 'A' or encrypted_message[index] == 'a':
                    new_alpha = ord(encrypted_message[index]) + 25
                    new_alpha = chr(new_alpha)
                    decrypted_message = decrypted_message + new_alpha
                    
                elif encrypted_message[index] == 'B' or encrypted_message[index] == 'b':
                    new_alpha = ord(encrypted_message[index]) + 23
                    new_alpha = chr(new_alpha)
                    decrypted_message = decrypted_message + new_alpha
                    
                elif index % 2 == 0:
                    new_alpha = ord(encrypted_message[index]) - 2
                    new_alpha = chr(new_alpha)
                    decrypted_message = decrypted_message + new_alpha
                
                elif index % 3 == 0:
                    new_alpha = ord(encrypted_message[index]) - 3
                    new_alpha = chr(new_alpha)
                    decrypted_message = decrypted_message + new_alpha
                    
                else:
                    new_alpha = ord(encrypted_message[index]) - 1
                    new_alpha = chr(new_alpha)
                    decrypted_message = decrypted_message + new_alpha
            else:
                decrypted_message = decrypted_message + encrypted_message[index]

        snapshot_file = open(secret_text_file_path, "w")
        snapshot_file.write(decrypted_message)
        snapshot_file.close()
        os.remove(secret_text_file_path + ".smc")

        return decrypted_message


def main():
    file_name = sys.argv[1]
    operation = sys.argv[2]
#     print('file_name:', file_name)
    level1 = CeasarCipher()
    if operation == "encrypt":
        level1.encryption(file_name)
    elif operation == "decrypt":
        level1.encryption(file_name)
    # print('Encrypted_message file_name:', file_name)
#     decrypted_message = ceas.decryption(file_name)
#     print('Decrypted message:', decrypted_message)


if __name__ == '__main__':
    main()
