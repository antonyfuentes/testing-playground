# dummy_wordpress
This is a dummy wordpress site that is pre-populated with specific plugins, settings and data. To be used as a playground in automation courses.

## Setup steps
- `git clone` the repository and `cd` into project root directory
- restore the db and wp file volumes:
  - `docker run -v dummy_wordpress_db_data:/volume -v $(pwd):/backup --rm loomchild/volume-backup restore automation_db_backup`
  - `docker run -v dummy_wordpress_wp_files:/volume -v $(pwd):/backup --rm loomchild/volume-backup restore automation_wp_files_backup`
- Run this to confirm that the volumes were properly loaded: `docker volume ls`
- Then run: `docker-compose up -d`
- Wait until the app runs, and load this in your browser: http://localhost:8000/

## Notes:
- Since this is a dummy site, I'm publicly sharing the following:
  - User/Password: `automation/automation`
  - Consumer key:  `ck_747561c1957b4d5e9c4ba174397365f9bdf43ab7`
  - Consumer secret:  `cs_ae256b8de43dd771568cab572c8c135b11ff21f3`
- These are the commands used to create the volume backups:
  - `docker run -v dummy_wordpress_db_data:/volume -v $(pwd):/backup --rm loomchild/volume-backup backup automation_db_backup`
  - `docker run -v dummy_wordpress_wp_files:/volume -v $(pwd):/backup --rm loomchild/volume-backup backup automation_wp_files_backup`
- Also, if you want to destroy (containers, images and volumes) and then recreate this just use the commands below:
  - *Note: Use these commands below with caution, you could unintentionally delete other running containers so bear that in mind*
  - `docker-compose down --rmi all`
  - `docker volume prune` (If you delete the containers and images, the volumes will still persist. So this command will delete those dangling volumes)
  
## Here is an screenshot of how the application looks:
  ![Dummy Wordpress](https://raw.githubusercontent.com/atfuentess/dummy_wordpress/master/playground.png)
