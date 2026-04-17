FROM php:8.2-apache

# Python ve Pillow'u kur
RUN apt-get update && apt-get install -y python3 python3-pip
RUN pip3 install Pillow --break-system-packages

# Yazma izinlerini ayarla (Resim yükleyebilmek için kritik!)
RUN mkdir -p /var/www/html/resimler && chmod -R 777 /var/www/html/resimler

COPY . /var/www/html/

# Port ayarı
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

WORKDIR /var/www/html/
