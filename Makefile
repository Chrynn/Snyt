up:
	docker-compose -f docker-compose.yml up -d

build:
	docker-compose -f docker-compose.yml up -d --build

down:
	docker-compose -f docker-compose.yml down

php:
	docker-compose -f docker-compose.yml exec php bash;

node:
	docker-compose -f docker-compose.yml exec node bash;
