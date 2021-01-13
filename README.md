## Usage

run `docker-compose up -d --build site` first time for buiding environment.
run `docker-compose up -d site`


- `docker-compose run --rm composer update`
- `docker-compose run --rm npm run dev`
- `docker-compose run --rm artisan migrate` 

check `http://localhost:5000`



Bringing up the Docker Compose network with `site` instead of just using `up`, ensures that only our site's containers are brought up at the start, instead of all of the command containers as well. The following are built for our web server, with their exposed ports detailed:

- **nginx** - `:80`
- **mysql** - `:3306`
- **php** - `:9000`
- **redis** - `:6379`
- **mailhog** - `:8025` 

Three additional containers are included that handle Composer, NPM, and Artisan commands *without* having to have these platforms installed on your local computer. Use the following command examples from your project root, modifying them to fit your particular use case.

- `docker-compose run --rm composer update`
- `docker-compose run --rm npm run dev`
- `docker-compose run --rm artisan migrate` 

<!-- ## laravel app
make a directory  'src' alongside 'nginx' , php

put laravel app project in 'src'  -->



## persistent mysql

make a directory  'mysql' alongside 'nginx' , src , php

add in docker-compose file in mysql service ==>> 
volumes:
      - ./mysql:/var/lib/mysql


## MailHog

The current version of Laravel (8 as of today) uses MailHog as the default application for testing email sending and general SMTP work during local development. Using the provided Docker Hub image, getting an instance set up and ready is simple and straight-forward. The service is included in the `docker-compose.yml` file, and spins up alongside the webserver and database services.

To see the dashboard and view any emails coming through the system, visit [localhost:8025](http://localhost:8025) after running `docker-compose up -d site`.


## @==**==**==**=@
if permission issue occure, perhaps  'sudo' will be helpfull.

all the command can be run in `src`
