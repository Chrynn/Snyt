up:
	docker-compose -f docker-compose.yml up -d

build:
	docker-compose -f docker-compose.yml up --build

down:
	docker-compose -f docker-compose.yml down

node:
	docker-compose -f docker-compose.yml exec node bash;

php:
	docker-compose -f docker-compose.yml exec php bash;

node:
	docker-compose -f docker-compose.yml exec node bash;
