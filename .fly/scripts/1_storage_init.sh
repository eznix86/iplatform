
#!/usr/bin/env bash

FOLDER=/var/www/html/storage/app
if [ ! -d "$FOLDER" ]; then
    echo "$FOLDER is not a directory, creating content of storage"
    mkdir -p /var/www/html/storage/{app,framework/{cache,data,sessions,testing,views},logs}
fi

FOLDER=/var/www/html/storage/database
if [ ! -d "$FOLDER" ]; then
    echo "$FOLDER is not a directory, initializing database"
    mkdir -p /var/www/html/storage/database
    touch /var/www/html/storage/database/database.sqlite
fi
