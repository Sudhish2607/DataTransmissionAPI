# DataTransmissionAPI
API implementing 3 layer security

**Project Title:** Secure Data Transfer Over the Internet

**Required software:**
Python
xampp server: to host application
SSMS: to host database
GitBash: to run git commands(required only for windows)

**Python package:**
pycrypto
stegano

**Projects:**
1. DataTransmissionAPI: API to perform data transmission
2. LenaBankManagementSystem: prototype of a bank website which uses our proposed 3-layer security system.

**Git Repo:**
https://github.com/Sudhish2607/LenaBankManagementSystem
https://github.com/Sudhish2607/DataTransmissionAPI

**Installation instructions:**
1. Install python from below link-
https://www.ics.uci.edu/~pattis/common/handouts/pythoneclipsejava/python.html
2. This project uses below 2 python packages-
	pycrypto
	stegano
3. Install pycrypto package using below command
pip install pycryptodome
4. Install stegano package using below command
pipenv install Stegano
pip install Stegano

5. Install SSMS database tool and import the BankGatewayDB.mdf database. Do not explicitly declare any authentication, rather use standard windows authentication for the database.
6. Install xampp server from below url. We will be using this server to host our applications.
https://www.apachefriends.org/download.html
7. Once the installation is successful, go to <installation_directory>/xampp/htdocs/ directory and extract the project zip file(SecureDataTransmission.zip) to this directory.
8. You can either extract the SecureDataTransmission.zip file or run below commands to retrieve the code from GitHub
git clone https://github.com/Sudhish2607/DataTransmissionAPI.git 
git clone https://github.com/Sudhish2607/LenaBankManagementSystem.git
9. Install GitBash for windows from below url. If you are using MacOS, then skip this step.
https://git-scm.com/downloads
10. Install php from below url
https://www.php.net/downloads.php
11. Start the xampp server.
12. Open terminal and go to below directory
<installation_directory_of_xampp>/xampp/htdocs/DataTransmissionAPI
and run below command
php -S localhost:8001
13. Now go to below directory
<installation_directory_of_xampp>/xampp/htdocs/LenaBankManagementSystem
and run below command
php -S localhost:7001
14. Step 12 deploys the project DataTransmissionAPI on 8001 port, whereas step 13 deploys the project LenaBankManagementSystem on 7001 port.
15. Open any browser, and go to below home page to run the project-
http://localhost:7001/App/smc/security/customerDetails.php
