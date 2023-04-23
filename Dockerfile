FROM alpine
USER 0
LABEL AUTHOR="AGou-ops"
RUN apk update && apk add --no-cache php-fpm dnsmasq-dnssec nginx inotify-tools

COPY ./conf/ /etc/
COPY ./php-fpm/ /etc/php81/php-fpm.d/
COPY ./nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY ./nginx/html/ /usr/share/nginx/html/

COPY ./restart-dnsmasq.sh /
COPY ./run.sh /

RUN chmod +x /run.sh && chmod +x /restart-dnsmasq.sh

ENTRYPOINT [ "/run.sh" ]

EXPOSE 53/tcp 53/udp 8080/tcp
