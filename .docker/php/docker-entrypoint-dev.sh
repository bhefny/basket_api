#!/usr/bin/env bash

echo "🤖 🤖 🤖 🤖 🤖 ENTRYPOINT: PHP 🤖 🤖 🤖 🤖 🤖 "

echo -n "" > logs/app.log
chmod 777 -R logs

# reset all tables & seed
sleep 10
vendor/robmorgan/phinx/bin/phinx rollback -e development -t 0 # safe for table creations
vendor/robmorgan/phinx/bin/phinx migrate
vendor/robmorgan/phinx/bin/phinx seed:run -s UserSeeder -s ProductSeeder -s BasketSeeder -s BasketProductSeeder

php-fpm
