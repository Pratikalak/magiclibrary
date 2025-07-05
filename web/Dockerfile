FROM wordpress:php7.4-apache

# Install MySQL client and build tools
RUN apt-get update && \
    apt-get install -y default-mysql-client gcc make && \
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

# Set up Phase 2: SUID binary and root flag
COPY tools/magic_backup.c /tmp/
RUN mkdir -p /backups && \
    gcc /tmp/magic_backup.c -o /usr/bin/magic_backup && \
    rm /tmp/magic_backup.c && \
    chown root:root /usr/bin/magic_backup && \
    chmod 4755 /usr/bin/magic_backup && \
    echo "FLAG{root_flag_here}" > /root/root.txt && \
    chmod 600 /root/root.txt
