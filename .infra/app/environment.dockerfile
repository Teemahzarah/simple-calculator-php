# OS
FROM amazonlinux:2018.03

# Owner
LABEL key="Helio Nogueira <helio.nogueir@gmail.com>"

# Workspace
ENV WORKSPACE=/var/www/app
RUN mkdir -p $WORKSPACE
WORKDIR $WORKSPACE

# TIMEZONE
RUN echo "ZONE=\"UTC\"" | tee --append /etc/sysconfig/clock
RUN ln -sf /usr/share/zoneinfo/UTC /etc/localtime

# /root/.bashrc
RUN echo "alias ll=\"ls -alh --color\"" | tee --append /root/.bashrc;

# Update and Upgrade
RUN yum -y update && yum -y upgrade

# Install Nginx Server
RUN yum install -y nginx
RUN echo "NETWORKING=yes" > /etc/sysconfig/network

# Install PHP 7.0
RUN yum install -y \
  php73 \
  php73-bcmath \
  php73-cli \
  php73-common \
  php73-dba \
  php73-dbg \
  php73-embedded \
  php73-enchant \
  php73-fpm \
  php73-gd \
  php73-intl \
  php73-json \
  php73-mbstring \
  php73-mysqlnd \
  php73-opcache \
  php73-pdo \
  php73-xml \
  php73-xmlrpc

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/bin/composer

# Clean Install
RUN yum clean all

# Start
ENTRYPOINT [ "/bin/bash", "-c", "/bin/sh ./bin/start" ]