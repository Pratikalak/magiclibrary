FROM wordpress:php7.4-apache

# Install MySQL client
RUN apt-get update && \
    apt-get install -y default-mysql-client && \
    rm -rf /var/lib/apt/lists/*

# Create Linux user and set up flag (world-readable)
RUN useradd -m -s /bin/bash library-user && \
    echo "library-user:shellpass" | chpasswd && \
    echo "FLAG{user_flag_here}" > /home/library-user/user.txt && \
    chown library-user:library-user /home/library-user/user.txt && \
    chmod 644 /home/library-user/user.txt

# Copy vulnerable PHP scripts
COPY search.php download.php /var/www/html/

# Create uploads directory (for the upload portal)
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads
