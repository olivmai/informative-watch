start:
	docker-compose up -d
	php -S localhost:8000

stop:
	docker-compose stop

test:
	php vendor/bin/phpunit -c phpunit.xml

phpstan:
	vendor/bin/phpstan analyse -l 8 src tests

phpcs:
	vendor/bin/php-cs-fixer fix src

check:
	@make phpcs
	@make phpstan
	@make test