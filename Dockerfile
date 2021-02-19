FROM debian:buster
EXPOSE 80 443
ENV	DEBIAN_FRONTEND=noninteractive


RUN apt update 
RUN apt upgrade -y
RUN apt-get install nginx -y
RUN apt-get install wget -y
RUN apt install zip unzip -y
RUN apt install gnupg -y
RUN apt install lsb-release -y

RUN apt -y install php php-common
RUN apt -y install php-cli php7.3-fpm php-json php-pdo php-mysql php-zip php-gd  php-mbstring php-curl php-xml php-pear php-bcmath

RUN rm -rf /etc/nginx/sites-available/default
COPY ./srcs/default   /etc/nginx/sites-available/

RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-all-languages.zip
RUN unzip phpMyAdmin-5.0.4-all-languages.zip
RUN rm phpMyAdmin-5.0.4-all-languages.zip
RUN mv phpMyAdmin-5.0.4-all-languages/ /var/www/html/phpmyadmin


RUN chown -R www-data /var/www/html
RUN mkdir -p /var/lib/phpmyadmin/tmp
RUN chown -R www-data:www-data /var/lib/phpmyadmin
COPY ./srcs/config.inc.php   /var/www/html/phpmyadmin/
#RUN chmod 750 /var/www/html/phpmyadmin/config.inc.php

RUN wget https://dev.mysql.com/get/mysql-apt-config_0.8.13-1_all.deb
RUN echo "mysql-apt-config mysql-apt-config/select-server select mysql-5.7" | debconf-set-selections
RUN dpkg -i mysql-apt-config*
RUN apt update
RUN apt install mysql-server -y

COPY /srcs/wordpress  /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

RUN rm -rf /var/www/html/index.nginx-debian.html
RUN rm -rf /var/www/html/index.html
COPY /srcs/script.sh   /
RUN chmod 777 /script.sh

RUN apt  install openssl
RUN mkdir /etc/nginx/ssl
RUN chmod -R 600 /etc/nginx/ssl
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/nginx.key -out /etc/nginx/ssl/nginx.crt -subj "/C=US/ST=New Sweden/L=Stockholm /O=1337/OU=Cluster/CN=localhost/emailAddress=admin@localhost.com"

COPY srcs/mgrissendb.sql   /

CMD ["/script.sh"]