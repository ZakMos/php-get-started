Start learnini PHP (Zakaria Moslim)
PHP get startd

Hypertext Preprocessor

https://www.php.net
https://www.apachefriends.org


to start server from terminal:
php -S localhost:8080   port could be any number



How to Install Apache, MySQL and PHP on Ubuntu 17.04
from website: https://www.vultr.com/docs/how-to-install-apache-mysql-and-php-on-ubuntu-17-04

Published on: Mon, Jan 8, 2018 at 1:35 pm EST
Linux Guides MySQL and MariaDB PHP Ubuntu
In this article, I will explain how to create a LAMP stack on Ubuntu 17.04.

Note: You will need sudo or root access for the commands in this article. If you've already escalated to the root user, you may omit the sudo command.

Step 1: Install Apache
First, update your package manager.

sudo apt-get update -y #using the -y option will automatically accept the conditions of the source update
sudo apt-get install apache2 -y #install apache
sudo systemctl start apache2.service #start apache
Alternatively, if you'd like to run everything at once, execute this.

sudo sh -c "apt-get update -y; apt-get install apache2 -y; systemctl start apache2.service"
Verify that Apache was installed without errors by accessing it from your local browser. Enter hostname -I to obtain your IP address for the server and navigate to http://SERVER_IP/.

Step 2: Install MySQL
Enter this into the shell prompt.

sudo apt-get install mysql-server -y
This will promptly install the MariaDB database server (a fork of MySQL). You will be asked to enter a password for the MySQL root user, so go ahead and do that.

Then, run

sudo /usr/bin/mysql_secure_installation
Enter "y".

Depending on the level of security, you'll have the option to adjust the password complexity. For now, we'll be using the strong security preset.

For any following options, enter "y" and continue.

Step 3: Install PHP
Next, let's install PHP. Execute the following command.

sudo apt-get install php -y
Then, install common PHP extensions such as GD, MySQL, and others.

sudo apt-get install -y php-{bcmath,bz2,intl,gd,mbstring,mcrypt,mysql,zip} && sudo apt-get install libapache2-mod-php -y
Step 4: Start Apache and MySQL on boot
This is necessary to start your web environment on boot.

sudo systemctl enable apache2.service
sudo systemctl enable mysql.service
Finally, restart Apache to allow PHP to run.

systemctl restart apache2.service
Additional Information
There are a set of modifications you may add to Apache. For example, one might want to take advantage of Apache's mod_rewrite module, which allows you to use regular expressions to change the destination URL, create "pretty" URLs, and more. This is accomplished via a2enmod, a command used by Apache to enable an add-on. To disable an add-on, use a2dismod in its place.

For mod_rewrite, you'd use this command to enable it.

sudo a2enmod rewrite
To disable it, execute this command.

sudo a2dismod rewrite
As usual, this is a configuration change, so you'll need to restart Apache after any change.

Firewall Configuration
This is only necessary if you've configured your system firewall. Depending on which firewall you've chosen, if you have enabled ufw (also known as uncomplicated firewall), it's as easy as running sudo ufw allow 80. If you only have iptables enabled, the command would be sudo iptables -A INPUT -p tcp --dport 80 -j ACCEPT.

Conclusion
You've successfully installed a LAMP stack on your Ubuntu 17.04 VPS. Happy coding!
