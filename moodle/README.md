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

```
docker run -d \
    --name moodle \
    --restart always \
    --net reverse-proxy \
    -v $PWD/moodledata:/var/moodledata \
    -p 3005:80 \
    -e DB_HOST=mysql-server \
    -e DB_ENV_MYSQL_DATABASE=moodle \
    -e DB_ENV_MYSQL_USER=root \
    -e DB_ENV_MYSQL_PASSWORD= \
    -e DB_PORT_3306_TCP_ADDR=3306 \
    -e MOODLE_URL=https://moodle.abc.org \
    -e SSL_PROXY=true \
    -e "TZ=Asia/Kolkata" \
    -e 'LETSENCRYPT_EMAIL=mail@abc.in' \
    -e 'LETSENCRYPT_HOST=moodle.abc.org' \
    -e 'VIRTUAL_HOST=moodle.abc.org' jhardison/moodle
```
