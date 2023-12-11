# run environment scripts
init\:env:
	cd config && touch local.neon
	make up
	docker compose -f .docker/docker-compose.yml exec php composer install
	docker compose -f .docker/docker-compose.yml exec node npm install
	docker compose -f .docker/docker-compose.yml exec php bin/console migration:reset

# run containers scripts
up:
	docker compose -f .docker/docker-compose.yml up -d

build:
	docker compose -f .docker/docker-compose.yml up -d --build

down:
	docker compose -f .docker/docker-compose.yml down

# join container scripts
php:
	docker compose -f .docker/docker-compose.yml exec php bash;

node:
	docker compose -f .docker/docker-compose.yml exec node bash;
