#!/bin/bash

#       ______            _____
#      / ____/___  ____  / __(_)___ _
#     / /   / __ \/ __ \/ /_/ / __ `/
#    / /___/ /_/ / / / / __/ / /_/ /
#    \____/\____/_/ /_/_/ /_/\__, /
#                           /____/

echo "       ______          __     ____"
echo "      / ____/___  ____/ /__  / __ \____ ___  __"
echo "     / /   / __ \/ __  / _ \\/ / / / __ / / / /"
echo "    / /___/ /_/ / /_/ /  __/ /_/ / /_/ / /_/ /"
echo "    \\____/\\____/\\__,_/\\___/_____/\\__,_/\\__, /"
echo "                                      /____/"

echo "Welcome to the CodeDay setup wizard!"
echo "Just need a few details before we start."
echo "First of all, one of the ORGANIZERs of the event needs to log in to MyStudentRND."
echo
echo "It's important that an organizer does this. If not, the setup will fail because there's no fault tolerance."

PASSWORD=$(< /dev/urandom tr -dc A-Za-z0-9 | head -c 8; echo)
read -p "My.StudentRND Username: " MYSTUDENTRND_USERNAME
read -s -p "My.StudentRND Password: " MYSTUDENTRND_PASSWORD

echo
echo "A'ight, let's do this!"
echo
sleep 2

#        ____           __        ____   ____             __
#       /  _/___  _____/ /_____ _/ / /  / __ \____ ______/ /______ _____ ____  _____
#       / // __ \/ ___/ __/ __ `/ / /  / /_/ / __ `/ ___/ //_/ __ `/ __ `/ _ \/ ___/
#     _/ // / / (__  ) /_/ /_/ / / /  / ____/ /_/ / /__/ ,< / /_/ / /_/ /  __(__  )
#    /___/_/ /_/____/\__/\__,_/_/_/  /_/    \__,_/\___/_/|_|\__,_/\__, /\___/____/
#                                                                /____/

# Update our packages
apt-get update
sleep 5 # This was always necessary on AWS, not sure if the same is true here...

# Install Apache and PHP
echo "Installing Apache & PHP"
apt-get install -y apache2 php5 libapache2-mod-php5 php5-curl

# Git!
apt-get install -y git

# Install PEAR and MDB2
echo "Installing PEAR & packages"
apt-get install -y php-pear
sleep 5
pear install MDB2
pear install MDB2#MySQL

# Install debconf tools
echo "Installing debconf..."
apt-get install -qqy debconf-utils

# Install MySQL
echo "Installing MySQL..."

#    Preseed the debconf
cat << EOF | debconf-set-selections
mysql-server-5.0 mysql-server/root_password password $PASSWORD
mysql-server-5.0 mysql-server/root_password_again password $PASSWORD
mysql-server-5.0 mysql-server/root_password seen true
mysql-server-5.0 mysql-server/root_password_again seen true
EOF

#    And now install it...
apt-get install -y php5-mysql mysql-server

#       ______            _____
#      / ____/___  ____  / __(_)___ ___  __________
#     / /   / __ \/ __ \/ /_/ / __ `/ / / / ___/ _ \
#    / /___/ /_/ / / / / __/ / /_/ / /_/ / /  /  __/
#    \____/\____/_/ /_/_/ /_/\__, /\__,_/_/   \___/
#                           /____/

# Apache!
pushd /etc/apache2/sites-available
a2dissite default
rm *
echo '<VirtualHost *:80>
        ServerName local.my.codeday.org

        ErrorLog /var/log/apache2/error.log
        CustomLog /var/log/apache2/access.log combined

        DocumentRoot /var/www/local.my.codeday.org
        <Directory /var/www/local.my.codeday.org>
                Options FollowSymLinks
                AllowOverride All
        </Directory>
</VirtualHost>' > local.my.codeday.org.conf

echo '<VirtualHost *:80>
        ServerName mysql.local.my.codeday.org

        ErrorLog /var/log/apache2/error.log
        CustomLog /var/log/apache2/access.log combined

        DocumentRoot /var/www/mysql.local.my.codeday.org
        <Directory /var/www/mysql.local.my.codeday.org/>
                Options FollowSymLinks
                AllowOverride All
        </Directory>
</VirtualHost>' > mysql.local.my.codeday.org.conf

a2ensite local.my.codeday.org.conf
a2ensite mysql.local.my.codeday.org.conf

service apache2 restart
popd

# MySQL
echo "Downloading database from CodeDay HQ..."
wget -O dump.sql "http://my.codeday.org/admin/db_dump?username=$MYSTUDENTRND_USERNAME&password=$MYSTUDENTRND_PASSWORD"
echo "Importing database."
mysql --u root --password=$PASSWORD < dump.sql

# phpMyAdmin
pushd /var/www/
echo "Downloading phpMyAdmin"
wget http://dl.cihar.com/phpMyAdmin/master/phpMyAdmin-master-latest.tar.gz
tar xzf phpMyAdmin-master-latest.tar.gz
rm phpMyAdmin-master-latest.tar.gz
mv phpMyAdmin-master* mysql.local.my.codeday.org
popd

# CodeDay site
echo "Checking out CodeDay site"
pushd /var/www
git clone git://github.com/StudentRND/MyCodeDay.git local.my.codeday.org
cd local.my.codeday.org
echo "Downloading submodules..."
git submodule update --init

echo "[app]
debug=false
offline=true

[database]
type=mysql
host=localhost
db=mycodeday
username=root
password=$PASSWORD" > local.ini
popd

echo
echo
echo
echo "That's it! We're all done!"
echo "Have a nice time at CodeDay!"
echo
