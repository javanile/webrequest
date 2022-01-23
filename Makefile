#!make

start:
	@docker-compose up -d
	@echo "Visit: <http://localhost:10000>"

update:
	@composer update --ignore-platform-reqs

require:
	@docker-compose run --rm php composer require --prefer-dist guzzlehttp/guzzle

## =====
## Tests
## =====

test-laravel:
	./vendor/bin/pest tests/LaravelTest.php
