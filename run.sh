#!/usr/bin/env sh

sleep 1

nohup /restart-dnsmasq.sh > /dev/stdout &
/usr/sbin/nginx && /usr/sbin/php-fpm8 -R -D
/usr/sbin/dnsmasq

tail -f /dev/stdout
