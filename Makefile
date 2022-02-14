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

## ======
## Docker
## ======

push:
	@docker login -u javanile
	@docker build -t javanile/webrequest .
	@docker push javanile/webrequest

## =====
## Tests
## =====

test-guzzle:
	@docker-compose run --rm webrequest ./vendor/bin/pest tests/GuzzleTest.php

test-laravel:
	@docker-compose run --rm webrequest ./vendor/bin/pest tests/LaravelTest.php

test-local:
	@docker-compose build webrequest
	@docker run --rm -it -v $$PWD:/app -v $$PWD:/var/www/html -p 8080:80 javanile/webrequest tests/fixtures/local/ui.php

test-live-post:
	@bash tests/live/post-test.sh
