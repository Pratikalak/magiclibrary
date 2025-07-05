#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>

void backup_file(const char *filename) {
    char cmd[256];
    // Vulnerable: no path validation, command injection possible
    snprintf(cmd, sizeof(cmd), "tar -czf /backups/%s.tar.gz %s", filename, filename);
    setuid(0); // Ensure we run as root
    system(cmd);
}

int main(int argc, char *argv[]) {
    if (argc != 2) {
        printf("Usage: %s <filename>\n", argv[0]);
        return 1;
    }
    
    backup_file(argv[1]);
    printf("Backup completed successfully.\n");
    return 0;
}
