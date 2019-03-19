all: docker-build docker-start docker-install # docker-load-fixtures 

#
# Standards build rules for all projects
#

build:
	php bin/console doctrine:schema:drop --full-database --force
	php bin/console doctrine:schema:create
	php bin/console doctrine:schema:update --force
	php bin/console doctrine:fixtures:load -n

test:
	echo "FIXME: Implement tests"

analysis:
	echo "FIXME: Implement linting"

#
# Project specific build rules
#

docker-install:
	docker-compose exec php composer install 

docker-load-fixtures:
	docker-compose exec php php bin/console doctrine:fixtures:load

docker-build:
	docker-compose build

docker-force-build:
	docker-compose build --force-rm --no-cache --pull

docker-start:
	docker-compose up -d

docker-run:
	docker-compose up

docker-stop:
	docker-compose stop

docker-destroy:
	docker-compose down

docker-php:
	docker-compose exec php sh

.PHONY: all install build test analysis \
		docker-install docker-build docker-start \
		docker-run docker-stop docker-php 


