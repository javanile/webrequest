#!make

start:
serve:
	@docker-compose up -d
	@echo "Visit: <http://localhost:10000>"

build:
	@docker-compose build php

update:
	@docker-compose run --rm php composer update

require:
	@docker-compose run --rm php composer require --prefer-dist guzzlehttp/guzzle

## =====
## Tests
## =====

test-guzzle:
	@docker-compose run --rm php ./vendor/bin/pest tests/GuzzleTest.php

test-laravel:
	@docker-compose run --rm php ./vendor/bin/pest tests/LaravelTest.php

test-local:
	@docker run --rm -v $PWD:/app -p 8080:80 javanile/webrequest tests/fixtures/local/ui.php
