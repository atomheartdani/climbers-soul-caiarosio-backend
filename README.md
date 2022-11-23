# Climber's Soul CAI Arosio backend

## Project structure

```
docker/   docker files for test environment
php/      project source code
sql/      database schema and test data
```

## Database access

In order to establish a connection to the database you must create a `config.php` file starting from the `php/config/include/config.php_template` file provided

## Test environment

For test and developement you can use the `docker/docker-compose.yaml` file to easily spin up:
- An Apache HTTP server with PHP and MySQL PDO connector, listening on port 8000. The contents of the `php/` folder are automatically synced to this server
- A MySQL database to store all your test data
- A phpMyAdmin interface to easily manage the database, listening on port 8080

## First run

When running the test environment for the first time, you must generate the required PHP dependencies
These dependencies can be automatically installed by running a script inside the `php-apache` container
Open a CLI to the `php-apache` container (either through Docker Desktop or with the `docker attach $container-id` command) and run this command:
```
./install-dependencies.sh
```
After succesfull execution you should find some new files and folders in the `php/` directory. These files are needed when deploying to production, but shouldn't be committed to the repository
