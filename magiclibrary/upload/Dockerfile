FROM php:7.4-apache

# Copy PHP file
COPY upload.php /var/www/html/index.php

# Create uploads directory
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads
