#!/bin/bash
set -e

if [ "$1" = "dev" ]; then
    OPT="-f docker-compose.dev.yml"
fi


docker-compose -f docker-compose.yml $OPT up -d web
docker-compose logs -f
