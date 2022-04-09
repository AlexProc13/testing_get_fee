## App for testing

### Get started:
- run
```
php app.php input.txt
```

### Get started (by docker):
- run in terminal tab
```
docker-compose up
```
- run old app
```
docker-compose exec php php app.php input.txt
```
- tun new app
```
docker-compose exec php composer install
docker-compose exec php php newApp.php input.txt
```
- run tests
```
docker-compose exec php vendor/bin/phpunit tests
```
