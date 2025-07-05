# MagicLibrary - Vulnerable Web Application

This is a deliberately vulnerable web application designed for web security training purposes. It contains multiple security vulnerabilities including SQL injection, Local/Remote File Inclusion, and unrestricted file upload.

⚠️ **WARNING**: This application is intentionally vulnerable. DO NOT deploy in a production environment or on any internet-facing servers.

## Setup Instructions

1. Add the following entries to your `/etc/hosts` file:
   ```
   127.0.0.1 magiclibrary.htb
   127.0.0.1 upload.magiclibrary.htb
   ```

2. Run the application:
   ```bash
   docker-compose up -d
   ```

3. Access the applications:
   - Main site: http://magiclibrary.htb:8080
   - Upload site: http://upload.magiclibrary.htb:8081

## Services

- Database (MySQL 5.7)
  - Database: magic
  - User: librarian
  - Password: library123

- Web Server (WordPress 5.2.1 with PHP 7.4)
  - Vulnerable search page: /search.php
  - Vulnerable download page: /download.php

- Upload Server (PHP 7.4)
  - Vulnerable upload page: /

## Vulnerabilities

1. SQL Injection in search.php
2. Local/Remote File Inclusion in download.php
3. Unrestricted File Upload in upload.php

## Default Credentials

System user:
- Username: library-user
- Password: shellpass

## Flag Location

The user flag is located at:
```
/home/library-user/user.txt
```
