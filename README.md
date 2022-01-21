## Project Hustal
Project Hustal is a free of cost MOFH clientarea for account management and support services. It have easy to use features and a much like infinityfree.net interface. 

![AppVeyor](https://img.shields.io/badge/Licence-MIT-lightgrey)
![AppVeyor](https://img.shields.io/badge/Version-v1.1.0-lightgrey)
![AppVeyor](https://img.shields.io/badge/Build-passed-lightgreen)
![AppVeyor](https://img.shields.io/badge/dependencies-php-lightgrey)
![AppVeyor](https://img.shields.io/badge/Interface-light-lightgrey)
![AppVeyor](https://img.shields.io/badge/Development-discontinued-lightgrey)

## Table of Content 
- [Features](#features)
- [Requirements](#requirements) 
- [Installation](#installation)
- [Dependencies](#dependencies)
- [Contributer](#contributer)
- [Copyright](#copyright)

## Features
Hustal features are listed below:
- Sign up / Login
- Password reset functionality
- Validation / Verification 
- Account Management 
- Account Settings 
- GoGetSSL Api integration
- MOFH Api integration 
- Support system

## Requirements
Your server need to met minimal requirements to run hustal
**PHP Version 8.0 and above does not work currently.**
- php 5.6 to 7.4 
- mysql 5.7 or above

## Installation 
Installation of hustal is much then you think 
- Download the hustal zip file. 
- Extract it to your root folder of your domain. 
- Open config.php file in includes folder and edit details bellow
<pre>
// database information 
define('DB_HOST','Databse Hostname');// localhost
define('DB_USER','Databse Username');// root
define('DB_PASS','Database Password');// password
define('DB_NAME','Database Name');// vhost
// site info
define('SITE_ADDR','Domain Name');// example.com
define('SITE_NAME','Website Name');// Flexhost
define('SITE_EMAIL','Website Email');// example@example.com
define('SITE_PHONE','Website Phone Number');// +1 000 00000000
define('SITE_IP','185.27.134.46');// MOFH Server IP
define('AFF_ID','Affiliate ID');// iFastNet Affiliate ID
// API Settings
define('API_USER','MOFH WHMCS API Username');// resellerpanel -> whmcs -> api 
define('API_PASS','MOFH WHMCS API Password');// resellerpanel -> whmcs -> api 
define('API_PLAN','MOFH Reseller Plan Name');// resellerpanel -> plans -> plan name
// note: remember to add your server ip to reseller panel
// Mail Settings
define('MAIL_PORT','SMTP PORT');// 587
define('MAIL_USER','SMTP Username');// example@example.com
define('MAIL_PASS','SMTP Password');// example123
define('MAIL_HOST','SMTP Host');// smtp.example.com
// SSL Settings 
define('SSL_USERNAME',SSL API Username');// example@example.com
define('SSL_PASSWORD','SSL API Password');// example123
</pre>
- Setup database according to [DATABASE.md](DATABASE.md) file.
- Setup rules using [SETUP.md](SETUP.md) file. 
- All done. Enjoy free hosting.

## Dependencies
The following libraries are required to run hustal
- phpmailer
- anake-whm-api
- guzzle
- composer
- user info
- gogetssl

## Contributer
The build is created and modified by [Mahtab Hassan](https://github.com/mahtab2003)
## Copyright
Code Copyright 2021 Hustal. Code released under the MIT license.

