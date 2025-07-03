FROM wordpress:5.2.1-php7.4-apache

# Install MySQL client
RUN apt-get update && \
    apt-get install -y default-mysql-client && \
    rm -rf /var/lib/apt/lists/*

# Create Linux user and set up flag
RUN useradd -m -s /bin/bash library-user && \
    echo "library-user:shellpass" | chpasswd && \
    echo "FLAG{user_flag_here}" > /home/library-user/user.txt && \
    chown library-user:library-user /home/library-user/user.txt && \
    chmod 400 /home/library-user/user.txt

# Copy PHP files
COPY search.php download.php /var/www/html/

# Create uploads directory
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads
