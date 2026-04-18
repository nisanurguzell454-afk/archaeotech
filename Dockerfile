FROM php:8.2-apache

# Python ve gerekli kütüphaneleri kur
RUN apt-get update && apt-get install -y python3 python3-pip
RUN pip3 install Pillow wikipedia --break-system-packages

WORKDIR /var/www/html/
COPY . /var/www/html/

RUN mkdir -p /var/www/html/resimler && \
    chmod -R 777 /var/www/html/resimler && \
    chown -R www-data:www-data /var/www/html/resimler

RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
