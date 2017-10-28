start: stop
	@./start_docker.sh dev

stop:
	@docker-compose down

stop_orphans:
	@docker-compose down --remove-orphans

status:
	@docker-compose ps

build:
	@docker-compose -f docker-compose.yml -f docker-compose.dev.yml build php

test:
	@./runtest.sh

resetdb:
	@./resetdb.sh
