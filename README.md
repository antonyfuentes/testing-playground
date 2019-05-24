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
- User/Password: `automation/automation`
- Consumer key:  `ck_747561c1957b4d5e9c4ba174397365f9bdf43ab7`
- Consumer secret:  `cs_ae256b8de43dd771568cab572c8c135b11ff21f3`
