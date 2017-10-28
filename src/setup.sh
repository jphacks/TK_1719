#!/bin/bash
set -e # fail on any error

PWD=`pwd`
cd `dirname $0`

SUDO=''
if [ "$(uname)" != 'Darwin' ]; then
    SUDO='sudo'
fi

# setup laravel
find storage -type d | $SUDO xargs chmod 777
find bootstrap/cache -type d | $SUDO xargs chmod 777

npm install

if [ "$1" = "production" ]; then
    composer install --no-dev
    npm run production
else
    composer install
    npm run dev
fi

cd $PWD
