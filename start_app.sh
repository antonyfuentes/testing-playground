echo -e "\n*****************"
echo "** CLEANING UP **"
echo "*****************"
docker-compose down --rmi all
yes | docker volume prune

echo "**********************"
echo "** STARTING THE APP **"
echo "**********************"
docker-compose up -d

echo -e "\n\nDone, go to http://0.0.0.0:8000/ and wait for the application to start. It can take a minute!!\n"
