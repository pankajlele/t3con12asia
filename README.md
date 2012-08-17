FLOW3 as RESTful data proxy for Sencha Touch 2 App
==================================================

Example application code for my talk "FLOW3 as RESTful data proxy for Sencha Touch 2 App" at T3CON12ASIA.

All Packages/Framework/* in this repository are directly linked as submodules from git.typo3.org.

Requirements:

1. To run FLOW3 on your computer please visit requirements here http://flow3.typo3.org/documentation/guide/partii/requirements.html
2. Google Chrome or Safari web browser or iOS Simulator will be best ;)

To install (Ubuntu or Mac):

Note: Disk paths shown below are not mandatory. You can put the code anywhere on the disk.

1. git clone git://github.com/pankajlele/t3con12asia.git /var/www/t3con12asia.app
2. cd /var/www/t3con12asia.app
3. git submodule init
4. git submodule update
5. Create new MySQL database and a user if you want
6. Create new VirtualHost pointing to /var/www/t3con12asia.app/FLOW3Application/Web (Visit http://flow3.typo3.org/documentation/guide/partii/installation.html for more information)
7. Create a local DNS entry in your /etc/hosts file 127.0.0.1 t3con12asia.app
8. Edit /var/www/t3con12asia.app/FLOW3Application/Configuration/Development/Settings.yaml file and update the database name and credentials
9. cd /var/www/t3con12asia.app/FLOW3Application
10. ./flow3 doctrine:migrate
11. Open http://t3con12asia.app/app in Google Chrome or Safari and enjoy the demo
