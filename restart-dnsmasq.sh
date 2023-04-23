#!/usr/bin/env sh
inotifywait -m -e CLOSE_WRITE /etc/hosts* |
while read events;
do
	echo $events;
	sleep 2
	pkill dnsmasq && sleep 1 && /usr/sbin/dnsmasq
done
