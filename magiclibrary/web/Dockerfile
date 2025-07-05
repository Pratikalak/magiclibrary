FROM wordpress:5.2.1-php7.4-apache

# Install required packages
RUN apt-get update && \
    apt-get install -y default-mysql-client gcc && \
    rm -rf /var/lib/apt/lists/*

# Create Linux user and set up flag
RUN useradd -m -s /bin/bash library-user && \
    echo "library-user:shellpass" | chpasswd && \
    echo "FLAG{user_flag_here}" > /home/library-user/user.txt && \
    chown library-user:library-user /home/library-user/user.txt && \
    chmod 400 /home/library-user/user.txt

# Set up Phase 2 components
COPY ../tools/magic_backup.c /tmp/
RUN gcc /tmp/magic_backup.c -o /usr/bin/magic_backup && \
    rm /tmp/magic_backup.c && \
    chmod u+s /usr/bin/magic_backup && \
    mkdir -p /backups && \
    chmod 777 /backups && \
    echo "FLAG{root_flag_here}" > /root/root.txt && \
    chmod 400 /root/root.txt

# Copy PHP files
COPY search.php download.php /var/www/html/

# Create uploads directory
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads
