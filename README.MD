## App for testing

### Get started:
- run
```
php app.php input.txt
composer install
php newApp.php input.txt
```

### Get started (by docker linux container):
- Open terminal tab. Create `.env` file and set up user id `id $USER`. Then run
```
docker-compose up
```
- run old app
```
docker-compose exec php php app.php input.txt
```
- run new app
```
docker-compose exec php composer install
docker-compose exec php php newApp.php input.txt
```
- run tests
```
docker-compose exec php vendor/bin/phpunit tests
```
