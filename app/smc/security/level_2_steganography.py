__author__ = 'Thazhakasseril, Sudhish Surendran'
"""
CSCI.622.01 - Data Security and Privacy :: Project
Author: Thazhakasseril, Sudhish Surendran (sst9235@g.rit.edu)

This is the implementation of the LSB technique of image steganographic 
using the package stegano. This module would be used in order to hide 
the secret text in the provided image.
"""
import os
import os.path
from stegano import lsb
import sys
class Steganography:
    def __init__(self, input_image_file_path, steganographic_image_file_path, secret_text_file_path):
        self.input_image_file_path = input_image_file_path
        self.steganographic_image_file_path = steganographic_image_file_path
        self.secret_text_file_path = secret_text_file_path


    def encrypt(self):
        """
        This function implements the least significant bit encryption technique to hide
        a message within an image file.
        :param input_image_file_path: contains the file path of the input image
        :param output_image_file_path:  contains the file path where the image is to be saved
        :param secret_text: contains the secret text to be hidden in the image
        :return:    directory of the output file
        """
        print('level2:done' )
        snapshot_file = open(self.secret_text_file_path, "r+")
        secret_text = snapshot_file.readline()
        snapshot_file.close()
        steganographic_image_object = lsb.hide(self.input_image_file_path, secret_text)
        steganographic_image_object.save(self.steganographic_image_file_path)
        os.remove(self.secret_text_file_path)
#         os.remove(self.input_image_file_path)
        print('level2:done' )
        return self.steganographic_image_file_path


    def decrypt(self):
        """
        This function implements the decrypts the image in order to reveal the
        secret text hidden in the image
        :param steganographic_image: contains the file path of the steganographic image
        :return:    revealed secret text
        """
        decrypted_secret_text = lsb.reveal(self.steganographic_image_file_path)
        snapshot_file = open(self.decrypted_secret_text, "w")
        snapshot_file.write(decrypted_secret_text)
        snapshot_file.close()
        os.remove(self.steganographic_image_file_path)
        return decrypted_secret_text


def main():
        """
        This is a main function which helps in understanding how this package could be used.
        :return: None
        """
        input_image_file_path = sys.argv[1]
        steganographic_image_file_path = sys.argv[2]
        secret_text_file_path = sys.argv[3]
        operation = sys.argv[4]
        level2 = Steganography(input_image_file_path, steganographic_image_file_path, secret_text_file_path + ".smc")
        level2 = Steganography(input_image_file_path, steganographic_image_file_path, secret_text_file_path + ".smc")
        if operation == "encrypt":
            level2.encrypt()
        elif operation == "decrypt":
            level2.decrypt()


if __name__ == "__main__":
    main()
