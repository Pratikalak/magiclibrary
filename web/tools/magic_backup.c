#include <stdlib.h>
int main() {
    // Archive the webroot—this is our SUID binary’s payload
    system("tar -czf /backups/html.tar.gz /var/www/html");
    return 0;
}
