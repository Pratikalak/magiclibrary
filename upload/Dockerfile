FROM php:7.4-apache

# Copy your upload script into place
COPY upload.php /var/www/html/upload.php

# Create the uploads directory and set permissions
RUN mkdir -p /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html/uploads
