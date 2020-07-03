#!/usr/bin/env bash
# See https://akrabat.com/developing-wordpress-sites-with-docker/

# Restore DB from dump file
docker exec -i $(docker-compose ps -q db) mysql -u"wordpress" -p"wordpress" "wordpress" < data/dump.sql