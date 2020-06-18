echo -e "\n*****************"
echo "** CLEANING UP **"
echo "*****************"
docker-compose down --rmi all
yes | docker volume prune

echo "**************************************"
echo "** RESTORING DB AND WORDPRESS FILES **"
echo "**************************************"
docker run -v dummy_wordpress_db_data:/volume -v $(pwd):/backup --rm loomchild/volume-backup restore automation_db_backup
docker run -v dummy_wordpress_wp_files:/volume -v $(pwd):/backup --rm loomchild/volume-backup restore automation_wp_files_backup

echo "**********************"
echo "** STARTING THE APP **"
echo "**********************"
docker-compose up -d

echo -e "\n\nDone, go to http://0.0.0.0:8000/ and wait for the application to start. It can take a minute!!\n"
