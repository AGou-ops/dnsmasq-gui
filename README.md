## build dnsmasq-gui docker image

推荐使用：

```bash
make build
# 参考运行参数
docker run -d -p 5553:53/tcp -p 5553:53/udp -p 5555:8080 --dns 127.0.0.1 --name dnsmasq-with-gui -v `pwd`/conf/hosts.dnsmasq:/etc/hosts.dnsmasq dnsmasq-gui:v1
```

## use docker-compose

搞了好久，php-fpm使用端口监听，其他容器死活连不上，一直报错`File not found`，索性直接构建一个`all in one`的镜像吧，懒得折腾了.

仅供参考：

```bash
make compose
```
