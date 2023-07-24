phpstan:
	docker-compose -f docker-compose.yml exec php vendor/bin/phpstan analyse -c config/phpstan.neon
