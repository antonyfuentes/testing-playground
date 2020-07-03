docker-machine rm default -y
docker-machine create -d virtualbox --virtualbox-disk-size "60000" default
echo "The docker machine will use this IP: $(docker-machine ip default)"