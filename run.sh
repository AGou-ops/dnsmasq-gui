#!/usr/bin/env sh

sleep 1

nohup /restart-dnsmasq.sh > /dev/stdout &
/usr/sbin/nginx && /usr/sbin/php-fpm81 -R -D
/usr/sbin/dnsmasq

 watch -n 3 netstat -anl > /dev/stdout
