#!/bin/sh

while getopts dm OPT
do
    case $OPT in
        d)  NODAEMON=1
            ;;
        m)  NOMIGRATION=1
            ;;
    esac
done
shift $((OPTIND - 1))

host=$DBSERVER
port=3306

echo -n "waiting for TCP connection to $host:$port..."

while ! nc -vz $host $port > /dev/null 2>&1
do
    echo -n .
    sleep 1
done
echo "connected"

if [ ! $NOMIGRATION ]; then
    php artisan migrate
fi

if [ ! $NODAEMON ]; then
    php-fpm
fi

