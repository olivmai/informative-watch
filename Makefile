start:
	docker-compose up -d
	@make fixtures
	php -S localhost:8000

stop:
	docker-compose stop

test:
	@make fixtures-test
	php vendor/bin/phpunit -c phpunit.xml --coverage-html tests/coverage

phpstan:
	vendor/bin/phpstan analyse -l 8 src tests

phpcs:
	vendor/bin/php-cs-fixer fix src

fixtures:
	php tests/load-fixtures-script.php dev

fixtures-test:
	php tests/load-fixtures-script.php test

check:
	@make phpcs
	@make phpstan
	@make test