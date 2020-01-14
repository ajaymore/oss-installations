# Docker-Moodle
# Dockerfile for moodle instance. more dockerish version of https://github.com/sergiogomez/docker-moodle
# Forked from Jade Auer's docker version. https://github.com/jda/docker-moodle
FROM ubuntu:19.04
LABEL maintainer="Ajay More <ajaymore@protonmail.com>"

VOLUME ["/var/moodledata"]
EXPOSE 80 443
COPY moodle-config.php /var/www/html/config.php

# Let the container know that there is no tty
ENV DEBIAN_FRONTEND noninteractive

COPY ./foreground.sh /etc/apache2/foreground.sh

RUN apt-get update && \
    apt-get -y install mysql-client pwgen python-setuptools curl git unzip apache2 php \
    php-gd libapache2-mod-php postfix wget supervisor php-pgsql curl libcurl4 \
    libcurl3-dev php-curl php-xmlrpc php-intl php-mysql git-core php-xml php-mbstring php-zip php-soap cron php-ldap && \
    cd /tmp && \
    git clone -b MOODLE_37_STABLE git://git.moodle.org/moodle.git --depth=1 && \
    mv /tmp/moodle/* /var/www/html/ && \
    rm /var/www/html/index.html && \
    chown -R www-data:www-data /var/www/html && \
    chmod +x /etc/apache2/foreground.sh

#cron
COPY moodlecron /etc/cron.d/moodlecron
RUN chmod 0644 /etc/cron.d/moodlecron

# Enable SSL, moodle requires it
RUN a2enmod ssl && a2ensite default-ssl  #if using proxy dont need actually secure connection

# Cleanup, this is ran to reduce the resulting size of the image.
RUN apt-get clean autoclean && apt-get autoremove -y && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/lib/dpkg/* /var/lib/cache/* /var/lib/log/*

ENTRYPOINT ["/etc/apache2/foreground.sh"]