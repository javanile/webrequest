#!make

start: serve

serve:
	@docker-compose build webrequest
	@docker-compose up -d --force-recreate
	@echo "Visit: <http://localhost:8080>"

build:
	@docker-compose build webrequest

update:
	@docker-compose run --rm webrequest composer update

require:
	@docker-compose run --rm webrequest composer require --prefer-dist javanile/php-input

## ======
## Docker
## ======

stop:
	@docker stop $$(docker ps | grep ":8080" | cut -c1-12) > /dev/null 2>&1 || true

push:
	@docker login -u javanile
	@docker build -t javanile/webrequest .
	@docker push javanile/webrequest

## =======
## Develop
## =======

dev-test: stop
	@docker-compose build webrequest
	@docker run --rm -it -v $$PWD:/app -v $$PWD:/var/www/html -p 8080:80 javanile/webrequest webrequest.php

## =====
## Tests
## =====

test-guzzle:
	@docker-compose run --rm webrequest ./vendor/bin/pest tests/GuzzleTest.php

test-http:
	@docker-compose run --rm webrequest ./vendor/bin/pest tests/HttpTest.php

test-laravel:
	@docker-compose run --rm webrequest ./vendor/bin/pest tests/LaravelTest.php

test-airtable:
	@docker-compose run --rm webrequest ./vendor/bin/pest tests/AirtableTest.php

test-local:
	@docker-compose build webrequest
	@docker run --rm -it -v $$PWD:/app -v $$PWD:/var/www/html -p 8080:80 javanile/webrequest tests/fixtures/local/ui.php

test-live-post:
	@bash tests/live/post-test.sh
