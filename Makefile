test:
	php vendor/bin/phpunit -c phpunit.xml

phpstan:
	vendor/bin/phpstan analyse -l 8 src tests