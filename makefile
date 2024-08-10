composer.lock: composer.json
	composer update

vendor: composer.lock
	composer install

phar: vendor
	php bin/build.php resize.phar
	cp resize.phar "C:\Users\Cyril\bin\resize"

install: phar
.DEFAULT_GOAL := install
