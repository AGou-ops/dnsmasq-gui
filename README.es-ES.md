

![image](https://user-images.githubusercontent.com/57939102/233824555-2b818df3-cfc4-4680-9ba1-b84707015eb7.png)

*interfaz web gui de: https://github.com/nzgamer41/dnsmasqgui*

Imagen en Docker Hub: https://hub.docker.com/r/suofeiya/dnsmasq-gui

## Construir la imagen de Docker dnsmasq-gui


```bash
make build
# run dnsmasq container
docker run -d -p 53:53/tcp -p 53:53/udp -p 5555:8080 --dns 127.0.0.1 --name dnsmasq-with-gui -v `pwd`/conf/dnsmasq.conf:/etc/dnsmasq.conf -v `pwd`/conf/hosts.dnsmasq:/etc/hosts.dnsmasq dnsmasq-gui:v2
```

usuario y contraseña predeterminados de autenticación básica: `admin:admin`

## ~usar docker-compose~

~Tras pasar mucho tiempo con esto, php-fpm escucha en un puerto, pero los otros contenedores no logran conectarse de ninguna manera, dando siempre el error `File not found`. Al final, es mejor construir directamente una imagen `all in one`, no vale la pena seguir complicándose.~

~Solo para referencia:~

```bash
make compose
```
