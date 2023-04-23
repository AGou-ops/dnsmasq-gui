build:
	docker build -t dnsmasq-gui:v2 .

no-cache:
	docker build --no-cache -t dnsmasq-gui:v2 .

changePHPversion:
	sed -i 's/php7/php81/g' ./Dockerfile
	sed -i 's/fpm7/fpm81/g' ./run.sh

compose:
	docker-compose up -d
