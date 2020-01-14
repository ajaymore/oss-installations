```
docker run --name wp-ajaymore --net reverse-proxy -p 8080:80 \
  -v /home/ajay/prod/web-ajaymore/wp-content:/var/www/html/wp-content \
  -e 'WORDPRESS_DB_HOST=mysql-server' \
  -e 'WORDPRESS_DB_USER=root' -e 'WORDPRESS_DB_PASSWORD=my-secret-pw' \
  -e 'LETSENCRYPT_EMAIL=mail@site.in' \
  -e 'LETSENCRYPT_HOST=site.in' \
  -e 'VIRTUAL_HOST=site.in'\
  -e 'WORDPRESS_DB_NAME=mydb' -d wordpress

docker cp wp-ajaymore:/var/www/html/wp-config.php .

define('FORCE_SSL_ADMIN', true);
// in some setups HTTP_X_FORWARDED_PROTO might contain
// a comma-separated list e.g. http,https
// so check for https existence
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
       $_SERVER['HTTPS']='on';

docker cp wp-config.php wp-ajaymore:/var/www/html/wp-config.php


docker cp wp-ajaymore:/var/www/html/.htaccess .
docker cp .htaccess wp-ajaymore:/var/www/html/.htaccess
```
