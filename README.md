# Climber's Soul CAI Arosio backend

## Project structure

```
docker/   docker files for test environment
php/      project source code
sql/      database schema and test data
```

## Database access

In order to establish a connection to the database you must create a `login.php` file starting from the `php/config/include/login.php_template` file provided

## Test environment

For test and developement you can use the `docker/docker-compose.yaml` file to easily spin up:
- An Apache HTTP server with PHP and MySQL PDO connector, listening on port 8000. The contents of the `php/` folder are automatically synced to this server
- A MySQL database to store all your test data
- A phpMyAdmin interface to easily manage the database, listening on port 8080
