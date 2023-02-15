FROM debian:11

RUN apt update && apt install php apache2 sqlite3 php-sqlite3 net-tools -y
RUN apt install ffmpeg exiftool -y
RUN rm /var/www/html/index.html
COPY src /var/www/html/
RUN cat /var/www/html/install/tables.sql | sqlite3 /var/www/html/db.sqlite
RUN rm -rf /var/www/html/install/
RUN chown www-data:www-data -R /var/www/html/
RUN a2ensite default-ssl
RUN a2enmod ssl
RUN a2enmod rewrite
RUN printf "<Directory /var/www/>\n AllowOverride all\n</Directory>\n" >> /etc/apache2/apache2.conf
RUN printf "upload_max_filesize = 300M\npost_max_size = 300M\n" >> /etc/php/7.4/apache2/php.ini
RUN echo 'ifconfig | grep "inet"| cut -d " " -f  10| grep -v "127.0.0.1";apachectl start && tail -f /var/log/apache2/access.log' > /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT /entrypoint.sh
