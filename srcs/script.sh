#!bin/bash

service php7.3-fpm start

chown -R www-data:www-data /var/www/html/phpmyadmin;
chown -R mysql: /var/lib/mysql;


service mysql start;

mysql -u root -e "CREATE USER 'mgrissen'@'localhost' IDENTIFIED BY '123456';"
mysql -u root -e "CREATE DATABASE mgrissendb; use mgrissendb; "
mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'mgrissen'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"
mysql --user=mgrissen --password=123456 mgrissendb < mgrissendb.sql

mysql -u root < /var/www/html/phpmyadmin/sql/create_tables.sql;


nginx -g 'daemon off;'
