# Web &amp; Mobile Full-Stack - Stagetool

### Description

* This internship tool will make it possible to manage internships and companies. Each user has it's own role and can do specific things
* The tool will be able to manage students, companies and proposals
* A coordinator wil be able remove, add or change those things
* A company will be able to add proposals
* A student wil be able to write his reports about the internship

## Installation instructions

### Setup docker environment
* Install [git](https://git-scm.com/downloads) and [Docker Desktop](https://www.docker.com/products/docker-desktop).
* Start the Docker Desktop application
* Run from your terminal/cmd:
```shell
git clone https://git.ikdoeict.be/louis.dhont/2021wmfs-louisdhont.git
```
* When Docker is up and running, run from your terminal/cmd:
```shell
cd 2021wmfs-louisdhont
docker-compose up
```
* When the containers are up and running, run from a new terminal/cmd:
```shell
cd 2021wmfs-louisdhont
docker ps
docker exec -it { php-web container id } bash
```
From the Bash terminal in the php-web container, run the following commands:
```shell
composer install
cp .env.example .env
php artisan key:generate
```

* If you want to use the developers container, you have to install the dependencies. Run from a new terminal/cmd:
```shell
cd 2021wmfs-louisdhont/client
npm install
```

* Browse to [http://localhost:8083](http://localhost:8083) to view the administrator page
* Browse to [http://localhost:8080](http://localhost:8080) to view the stagetool SPA
* Browse to [http://localhost:8082](http://localhost:8082) to view the stagetool SPA in developer mode
* Stop the environment in your terminal/cmd by pressing <code>Ctrl+C</code>
* In order to avoid conflicts with your lab environment, run from your terminal/cmd
```shell
docker-compose down
```

## Recipes and troubleshooting

### Updating the course materials 
* Run from your terminal/cmd, in your <code>2021wmfs-louisdhont</code> directory
```shell
git reset --hard
git pull origin master
```

### <code>docker-compose up</code> does not start one or more containers
* Look at the output of <code>docker-compose up</code>. When a container (fails and) exits, it is shown as the last line of the container output (colored tags by container)
* Alternatively, start another terminal/cmd and inspect the output of <code>docker-compose ps -a</code>. You can see which container exited, exactly when.
* Probably one of the containers fails because TCP/IP port 8000, 8080 or 3307 is already in use on your system. Stop the environment, change the port in <code>docker-compose.yml</code> en rerun <code>docker-compose up</code>.

### Restoring the database (tables)
Might be necessary when this repository contains *raw* database updates.
* Before running <code>docker-compose up</code>, delete all files in the <code>mysql-data</code> directory

Nevertheless, Laravel-related database updates will be provided in the form of Migrations, which can be administered by running ```php artisan migrate``` from the php-web container


## Laravel API & Vue routes

### Vue routes

* GET | /login
* POST | /login
* GET | /companies/login
* POST /companies/login
* GET | /register
* POST | /register
* GET | /proposals
* GET | /proposals/{proposal}/details
* GET | /students/tasks/add
* POST | /students/tasks/add
* GET | /students/tasks
* GET | /companies
* GET | /companies/add-proposal
* POST | /companies/add-proposal
* GET | companies/proposals

### Laravel API

* PUT|PATCH | api/students/{student}/tasks/{task}
* PUT|PATCH | api/companies/{company}/proposals/{proposal}
* GET		| api/companies/{company}/proposals/{proposal}
* GET		| api/companies/{company}/proposals
* POST		| api/companies/{company}/proposals
* POST		| api/students/{student}/tasks
* GET		| api/students/{student}/tasks/{task}
* GET		| api/students/{student}/tasks
* PUT|PATCH | api/students/{student}
* GET		| api/students/{student}
* PUT|PATCH | api/proposals/{proposal}
* POST		| api/proposals
* GET		| api/proposals/{proposal}
* GET		| api/proposals
* PUT|PATCH | api/companies/{company}
* GET		| api/companies/{company}
* GET		| api/companies
* POST		| api/students
* POST		| api/companies
