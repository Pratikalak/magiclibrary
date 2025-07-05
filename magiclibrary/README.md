# MagicLibrary - Vulnerable Web Application

This is a deliberately vulnerable web application designed for web security training purposes. It contains multiple security vulnerabilities including SQL injection, Local/Remote File Inclusion, unrestricted file upload, and privilege escalation via SUID binary exploitation.

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
   - Upload site: http://upload.magiclibrary.htb:8080

## Attack Flow

### Phase 1: Initial Access (User Flag)

1. SQL Injection
   - Visit the search page
   - Use SQL injection to extract database information
   - Discover user credentials

2. File Upload
   - Access the upload site
   - Upload a PHP web shell
   - Verify upload success

3. Local File Inclusion
   - Use LFI vulnerability to include uploaded shell
   - Gain remote code execution
   - Access user shell and read `/home/library-user/user.txt`

### Phase 2: Privilege Escalation (Root Flag)

1. SUID Binary Discovery
   ```bash
   find / -perm -4000 2>/dev/null
   ```
   - Locate the SUID binary at `/usr/bin/magic_backup`

2. Binary Analysis
   ```bash
   strings /usr/bin/magic_backup
   ```
   - Notice it uses `tar` command without full path
   - Vulnerable to PATH hijacking

3. Exploit via PATH Hijacking
   ```bash
   cd /tmp
   echo '#!/bin/bash' > tar
   echo 'cat /root/root.txt' >> tar
   chmod +x tar
   export PATH=/tmp:$PATH
   /usr/bin/magic_backup
   ```
   - The SUID binary will execute our malicious tar
   - Reads and displays root flag

## Complete Attack Chain

1. SQL Injection → Database access
2. Upload PHP shell → File on server
3. LFI → Remote code execution
4. Shell access → User flag
5. SUID binary + PATH hijack → Root access
6. Root shell → Root flag

## Vulnerabilities Summary

1. SQL Injection in search functionality
2. Unrestricted file upload
3. Local File Inclusion
4. SUID binary with PATH hijacking vulnerability
