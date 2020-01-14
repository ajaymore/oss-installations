# oss-installations

Moodle, WordPress, Mantisbt, Drupal

# Create a reverse proxy

```
docker network create --driver bridge reverse-proxy
cd ~ && mkdir certs
docker run -d -p 80:80 -p 443:443 \
    --name nginx-proxy \
    --net reverse-proxy \
    -v $HOME/certs:/etc/nginx/certs:ro \
    -v /etc/nginx/vhost.d \
    -v /usr/share/nginx/html \
    -v /var/run/docker.sock:/tmp/docker.sock:ro \
    -e ENABLE_IPV6=true \
    --label com.github.jrcs.letsencrypt_nginx_proxy_companion.nginx_proxy=true \
    jwilder/nginx-proxy
docker run -d \
    --name nginx-letsencrypt \
    --net reverse-proxy \
    --volumes-from nginx-proxy \
    -v $HOME/certs:/etc/nginx/certs:rw \
    -v /var/run/docker.sock:/var/run/docker.sock:ro \
    jrcs/letsencrypt-nginx-proxy-companion
docker run -d \
    --name site-a \
    --net reverse-proxy \
    -e 'LETSENCRYPT_EMAIL=mail@abc.com' \
    -e 'LETSENCRYPT_HOST=a.example.com' \
    -e 'VIRTUAL_HOST=a.example.com' nginx
```

```
## renew certificates
docker exec nginx-letsencrypt /app/force_renew
```
