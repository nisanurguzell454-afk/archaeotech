# PHP 8.2 ve Apache sunucusunu temel alıyoruz
FROM php:8.2-apache

# Sistem güncellemelerini yap ve Python ile gerekli araçları kur
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    python3-venv \
    && rm -rf /var/lib/apt/lists/*

# Wikipedia ve resim işleme kütüphanelerini Python'a kur
# --break-system-packages parametresi yeni sistemlerde zorunludur
RUN pip3 install wikipedia Pillow requests --break-system-packages

# Çalışma dizinini ayarla
WORKDIR /var/www/html/

# Proje dosyalarını Docker içine kopyala
COPY . /var/www/html/

# Gerekli yazma izinlerini ver (Render ve Apache uyumu için)
RUN mkdir -p /var/www/html/resimler && \
    chmod -R 777 /var/www/html/resimler && \
    chown -R www-data:www-data /var/www/html/resimler

# Render'ın verdiği portu Apache'ye tanıt (80 portunu dinamik yapıyoruz)
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Apache sunucusunu başlat
CMD ["apache2-foreground"]
