![image](https://user-images.githubusercontent.com/57939102/233824555-2b818df3-cfc4-4680-9ba1-b84707015eb7.png)

*web gui from: https://github.com/nzgamer41/dnsmasqgui*

Docker hub image: https://hub.docker.com/r/suofeiya/dnsmasq-gui

## build dnsmasq-gui docker image


```bash
make build
# run dnsmasq container
docker run -d -p 53:53/tcp -p 53:53/udp -p 5555:8080 --dns 127.0.0.1 --name dnsmasq-with-gui -v `pwd`/conf/dnsmasq.conf:/etc/dnsmasq.conf -v `pwd`/conf/hosts.dnsmasq:/etc/hosts.dnsmasq dnsmasq-gui:v2
```

default basic auth user and password: `admin:admin`

## ~use docker-compose~

~搞了好久，php-fpm使用端口监听，其他容器死活连不上，一直报错`File not found`，索性直接构建一个`all in one`的镜像吧，懒得折腾了.~

~仅供参考：~

```bash
make compose
```
