#!/bin/bash

echo -n "Do you really reset the database?[yes]"
read CONFIRM
if [ "$CONFIRM" != "yes" ]; then
    echo "Aborted"
    exit;
fi

QUERY=`basename \`pwd\``
QUERY=${QUERY//_/}_mysql_
DB_CONTAINER=`docker-compose ps | awk "/$QUERY/"'{ print $1; }'`

if [ -z "$DB_CONTAINER" ]; then
    echo -e "\033[0;31mMysql docker container is not running\033[0;39m"
    exit;
fi

docker exec -it $DB_CONTAINER mysql -u root -pjphacks -e 'drop database jphacks;'
echo "Drop Database";
docker exec -it $DB_CONTAINER mysql -u root -pjphacks -e 'create database jphacks;'
echo "Create Database";

PHP_CONTAINER=`docker-compose ps | awk '/php/{ print $1; }'`
docker exec -it $PHP_CONTAINER php artisan migrate --seed
