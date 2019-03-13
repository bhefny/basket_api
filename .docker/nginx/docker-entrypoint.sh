#!/usr/bin/env sh

echo "🤖 🤖 🤖 🤖 🤖 ENTRYPOINT: NGINX 🤖 🤖 🤖 🤖 🤖"

echo -n "" > /etc/nginx/conf.d/default.conf
envsubst "$(env | awk -F = '{printf " $%s", $1}')"< /etc/nginx/conf.d/basket.ng_temp > /etc/nginx/conf.d/basket.conf;

nginx -g 'daemon off;'

