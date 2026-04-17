FROM php:8.2-apache

# Python ve Pillow'u kur
RUN apt-get update && apt-get install -y python3 python3-pip
RUN pip3 install Pillow --break-system-packages

# ÇALIŞMA DİZİNİNİ AYARLA
WORKDIR /var/www/html/

# ÖNCE DOSYALARI KOPYALA
COPY . /var/www/html/

# ŞİMDİ KLASÖRÜ OLUŞTUR VE İZİNLERİ VER (EN KRİTİK KISIM)
RUN mkdir -p /var/www/html/resimler && \
    chmod -R 777 /var/www/html/resimler && \
    chown -R www-data:www-data /var/www/html/resimler

# Port ayarı
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
