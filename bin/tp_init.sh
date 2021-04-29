clear
rm -rf /etc/profile.d/restore.sh
echo "Starting, please wait..."
sleep 10


IP=$(/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
URL=http://${IP}:8000

STATUS=$(curl --write-out '%{http_code}\n' --silent --output /dev/null http://${IP}:8000)

if [[ ${STATUS} -eq "200" ]]; then
  echo "The application is currently running."
else
  # start the docker containers if not running (this is very helpfull the very first time that the OVA is executed).
  docker-compose -f /home/testing-playground/docker-compose.yml up -d 
  echo "Starting containers. Please wait..."
  sleep 10

  # backup of the original dump file
  docker exec -ti testing-playground_db_1 cp docker-entrypoint-initdb.d/dump.sql docker-entrypoint-initdb.d/dump_tmp.sql

  # modify the dump to use the correct DHCP ip
  docker exec -ti testing-playground_db_1 sed -i "s/localhost:8000/$IP:8000/g" docker-entrypoint-initdb.d/dump_tmp.sql

  # change localhost to the correct ip in the dump file
  echo "mysql -u wordpress -p wordpress --password=wordpress < docker-entrypoint-initdb.d/dump_tmp.sql" > /etc/profile.d/restore.sh

  # restore the database based on the dump file just updated with an IP
  chmod u+x /etc/profile.d/restore.sh
  docker cp /etc/profile.d/restore.sh testing-playground_db_1:.
  docker exec -ti testing-playground_db_1 bash restore.sh
  rm -rf /etc/profile.d/restore.sh
  echo "We are done!!"
  sleep 3
fi

clear
echo "***************************************************************************************************"
echo "*                                                                                                  "
echo "*                 #######  #######  #######  #######  #######  ###   ##  #######                  *"
echo "*                   ##     ##       ##         ##       ##     ####  ##  ##                       *"
echo "*                   ##     #######  #######    ##       ##     ## ## ##  #######                  *"
echo "*                   ##     ##            ##    ##       ##     ##  ####  ##   ##                  *"
echo "*                   ##     #######  #######    ##     #######  ##   ###  #######                  *"
echo "*                                                                                                 *"
echo "*  #######  ##          ###     ##    ## #######  #######  #######  ##   ##  ###   ##  #######    *"
echo "*  ##   ##  ##         ## ##     ##  ##  ##       ##   ##  ##   ##  ##   ##  ####  ##  ##    ##   *"
echo "*  #######  ##        ##   ##     ####   #######  #######  ##   ##  ##   ##  ## ## ##  ##     ##  *"
echo "*  ##       ##       #########     ##    ##   ##  ## ##    ##   ##  ##   ##  ##  ####  ##    ##   *"
echo "*  ##       ####### ##       ##    ##    #######  ##  ###  #######   #####   ##   ###  #######    *"
echo "*                                                                                                  "
echo "***************************************************************************************************"
echo "*                                                                                                  "
echo "* IP ADDRESS      : ${IP}                                                                          "
echo "* WORDPRESS SITE  : http://${IP}:8000                                                              "
echo "* WORDPRESS ADMIN : http://${IP}:8000/wp-admin                                                     "
echo "*                                                                                                  "
echo "***************************************************************************************************"
echo -e "\n"