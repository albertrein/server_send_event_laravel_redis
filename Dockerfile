FROM php:7.3-apache-buster

# cria php.ini
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini


RUN apt-get update 

# instala ferramentas úteis
RUN apt-get install -y \
    nano


#cria arquivo config
RUN touch /etc/apache2/sites-available/laravel.conf
RUN echo "<VirtualHost *:80>" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    ServerName localhost.tld" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    ServerAdmin webmaster@localhost" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    DocumentRoot /var/www/html/public" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    <Directory /var/www/html/>" >> /etc/apache2/sites-available/laravel.conf
RUN echo "        AllowOverride All" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    </Directory>" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    ErrorLog ${APACHE_LOG_DIR}/error.log" >> /etc/apache2/sites-available/laravel.conf
RUN echo "    CustomLog ${APACHE_LOG_DIR}/access.log combined" >> /etc/apache2/sites-available/laravel.conf
RUN echo "</VirtualHost>" >> /etc/apache2/sites-available/laravel.conf

# habilita reescrita com .htaccess
RUN a2enmod rewrite
RUN a2dissite 000-default.conf
RUN a2ensite laravel.conf
RUN a2enmod rewrite
