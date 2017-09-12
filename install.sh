sudo apt-get update && sudo apt-get upgrade
git clone https://github.com/xpertsavenue/WiringOP-Zero.git
cd WiringOP-Zero
chmod +x ./build
sudo ./build
sudo apt-get install apache2 php5 libapache2-mod-php5
sudo apt-get install mysql-server python-mysqldb
sudo apt-get install mysql-server && sudo apt-get install mysql-client
sudo apt-get install mysql-client php5-mysql
sudo apt-get install mysql-server-5.5
sudo apt-get upgrade mysql-server
sudo apt-get install python-mysqldb
cd /var/www
sudo rm -r html
git clone https://github.com/VRDragon/php-login
mv php-login html
shutdown -h  now
