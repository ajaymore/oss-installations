```
docker run -d \
    --name moodle \
    --restart always \
    --net reverse-proxy \
    -p 3005:80 \
    -e DB_HOST= \
    -e DB_NAME= \
    -e DB_USER= \
    -e DB_PASSWORD= \
    -e DB_PORT= \
    -e MOODLE_URL= \
    -e SSL_PROXY=true \
    -e "TZ=Asia/Kolkata" \
    -e 'LETSENCRYPT_EMAIL=mail@abc.org' \
    -e 'LETSENCRYPT_HOST=moodle.abc.org' \
    -e 'VIRTUAL_HOST=moodle.abc.org' moodle

```
