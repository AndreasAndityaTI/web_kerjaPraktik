# Gunakan PHP sebagai dasar
FROM php:7.4-apache

# Aktifkan modul PHP dan pengaturan lainnya
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

# Salin file PHP Anda ke dalam container
COPY . /var/www/html/

# Expose port 80 agar dapat diakses dari luar container
EXPOSE 80
