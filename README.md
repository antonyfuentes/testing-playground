# Testing Playground
The testing playground project is a real-world app built with WordPress. It is pre-populated with specific plugins, settings, and data. This is a good option for anyone who wants to practice its software testing skills in a safe environment.

## Setup on Mac and Linux:
- Install docker
- Download (or clone) this repository
- Using your terminal cd into the root folder of the project
- Run this script to run the app on docker: `sudo bash start-app-mac-linux.sh`
- Wait for the script to finish running
- Navigate to [http://localhost:8000/](http://localhost:8000/)

## Setup on AWS EC2:
- Create an EC2 instance (I usually use Ubuntu) (This runs fine on free tier)
- Make sure of editing the security group attached to your instance to allow incoming HTTP traffic on port `8000` from Anywhere
- Check the instance details and copy the `Public IPv4 address`
- SSH into your instance and make sure that Docker and Git are installed
- Clone this repo into a folder on your EC2 instance
- `cd` into the repository
- Inside `data/` folder, there is a file called `dump.sql` that dump file was generated on a local environment and is used to run the system using a pre-filled database. The problem with that is that the dump has hardcoded `localhost:8000` in multiple places, which needs to be replaced with the instance's public IP address. To make things simpler, use the `sed` command from below.
- `sed -i "s/localhost:8000/$PUBLIC_IP:8000/g" data/dump.sql.sql` Note: Make sure of replacing `$PUBLIC_IP` with the corresponding public IP of the instance
- After the dump is updated, run this script to run the application on Docker: `sudo bash start-app-mac-linux.sh`
- Wait for it to finish, and after it ends, wait two more minutes
- Then in your browser navigate to: [http://public-ip:8000/](http://public-ip:8000/) where `public-ip` should be replaced with the corresponding value


## Setup on Windows:
- Install docker toolbox
- Download (or clone) this repository
- Using the Docker QuickStart Terminal, cd into the root folder of the project
- Docker toolbox uses a VirtualBox VM to run its containers, to make sure that the VM has enough space to run this script to re-create the VM: `bash windows/re-create-docker-machine.sh`
- Then run this script to run the app on docker toolbox: `bash start-app-windows.sh`
- Wait for the script to finish running
- Navigate to the URL printed in the terminal

## API Details:
This app has 3 APIs available that are described below:
- WordPress RestAPI:
  - This API provides different endpoints to execute actions against WordPress
  - Endpoint: http://localhost:8000/wp-json/wp/v2/
  - Documentation: https://developer.wordpress.org/rest-api/reference/
- Woocommerce RestAPI:
  - This API provides different endpoints to execute actions against Woocommerce
  - Endpoint: http://localhost:8000/wp-json/wc/v3/
  - Documentation: https://woocommerce.github.io/woocommerce-rest-api-docs/?shell#introduction
- GraphQL: 
  - This API summarizes mutations and queries that can be performed against WordPress and Woocommerce
  - Endpoint: http://localhost:8000/graphql
  - Playground: http://localhost:8000/wp-admin/admin.php?page=wp-graphiql%2Fwp-graphiql.php
  - Schema file: [app/wp-content/plugins/wp-graphql-develop/schema.graphql](app/wp-content/plugins/wp-graphql-develop/schema.graphql)

## Notes:
- While running the commands above, sometimes docker could get stuck while downloading some image layers. If that is your case, cancel the command with `CTRL + C` and rerun the script again
- Since this is a dummy site, I'm publicly sharing the following:
  - User/Password: `automation/automation`
  - Consumer key:  `ck_747561c1957b4d5e9c4ba174397365f9bdf43ab7`
  - Consumer secret:  `cs_ae256b8de43dd771568cab572c8c135b11ff21f3`
  
## This is how the application looks:
  ![Testing Playground](https://raw.githubusercontent.com/atfuentess/dummy_wordpress/master/playground.png)
