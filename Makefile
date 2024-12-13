start:
	PHP_CLI_SERVER_WORKERS=5 php artisan serve --host 0.0.0.0 --port 8000

start-frontend:
	npm run dev

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	touch database/database.sqlite
	cat database/database.sqlite
	php artisan migrate
	php artisan db:seed

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml


lint:
	composer exec --verbose phpcs -- --standard=PSR12 app tests

fix-lint:
	composer exec --verbose phpcbf -- --standard=PSR12 app tests

