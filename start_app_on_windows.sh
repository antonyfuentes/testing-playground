echo -e "\n**************************************"
echo "** CLEANING UP                      **"
echo "**************************************"
docker-compose -f windows/docker-compose.yml down -v
yes | docker volume prune

echo "**************************************"
echo "** RESTORING DB AND WORDPRESS FILES **"
echo "**************************************"
rm -rf windows/v_db_data && mkdir -p windows/v_db_data
tar -xf automation_db_backup.tar.bz2 --directory=windows/v_db_data

rm -rf windows/v_wp_data && mkdir -p windows/v_wp_data
tar -xf automation_wp_files_backup.tar.bz2 --directory=windows/v_wp_data

echo "**************************************"
echo "** STARTING THE APP                 **"
echo "**************************************"
docker-compose -f windows/docker-compose.yml up -d --build

echo -e "\n\nDone, go to http://$(docker-machine ip default):8000/ and wait for the application to start. It can take a minute!!\n"
