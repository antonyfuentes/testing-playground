#!/usr/bin/env bash
# See https://akrabat.com/developing-wordpress-sites-with-docker/

# Dump DB into a file
docker exec -i $(docker-compose ps -q db) mysqldump --all-databases -u"wordpress" -p"wordpress" > data/dump.sql

# Remove password warning from the file
sed -i '.bak' 1,1d $file && rm "$file.bak"