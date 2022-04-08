## App for testing

### Get started:
- run
```
docker-compose up
```
- old app
```
docker-compose exec php php app.php input.txt
```
- new app
```
docker-compose exec php php newApp.php input.txt
```
- run tests
```
docker-compose exec php vendor/bin/phpunit tests
```