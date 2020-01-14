```
docker run -d \
    --name mantisbt \
    --restart always \
    --net reverse-proxy \
    -p 3006:80 \
    -e 'LETSENCRYPT_EMAIL=mail@ajaymore.in' \
    -e 'LETSENCRYPT_HOST=mantisbt.drushtikon.org' \
    -e 'VIRTUAL_HOST=mantisbt.drushtikon.org' mantisbt

```
