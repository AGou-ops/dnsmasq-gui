.PHONY: build
build:
	docker build -t dnsmasq-gui:v1 .

.PHONY: compose
compose:
	docker-compose up -d
