from level_1_ceasar import CeasarCipher
from level_2_steganography import Steganography
from level_3_aes import AES_Algo
import sys

def main():
    secret_text_file_path = sys.argv[1]
    input_image_file_path = sys.argv[2]
    steganographic_image_file_path = sys.argv[3]
    operation = sys.argv[4]

    level1 = CeasarCipher()
    level2 = Steganography(input_image_file_path, steganographic_image_file_path, secret_text_file_path + ".smc")
    level3 = AES_Algo(steganographic_image_file_path)

    if operation == "encrypt":
        level1.encryption(secret_text_file_path)
        level2.encrypt()
        level3.operation(operation)

    if operation == "decrypt":
        level3.operation(operation)
        level2.decrypt()
        level1.decryption(secret_text_file_path)

if __name__ == "__main__":
    main()