echo -e "\n**************************************"
echo "** CLEANING UP                      **"
echo "**************************************"
export DOCKER_IP=$(docker-machine ip default)
echo "DOCKER_IP: ${DOCKER_IP}"
docker-compose -f windows/docker-compose.yml down -v
yes | docker volume prune
cp data/dump.sql data/dump_windows.sql
sed -i "s/localhost:8000/$DOCKER_IP:8000/g" data/dump_windows.sql

echo "**************************************"
echo "** STARTING THE APP                 **"
echo "**************************************"
docker-compose -f windows/docker-compose.yml up -d --build
echo -e "\n\nDone, go to http://${DOCKER_IP}:8000/ and wait for the application to start. It can take a minute!!\n"
