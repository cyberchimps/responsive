FROM gitpod/workspace-full:latest

RUN sudo apt-get update
RUN sudo apt-get update
RUN sudo apt-get -y install lsb-release
RUN sudo apt-get -y install apt-utils
RUN sudo apt-get -y install python
RUN sudo apt-get install -y libmysqlclient-dev
RUN sudo apt-get -y install rsync
RUN sudo apt-get -y install curl
RUN sudo apt-get -y install libnss3-dev
RUN sudo apt-get -y install openssh-client
RUN sudo apt-get -y install mc
RUN sudo apt install -y software-properties-common
RUN sudo apt-get -y install gcc make autoconf libc-dev pkg-config
RUN sudo apt-get -y install libmcrypt-dev
RUN sudo mkdir -p /tmp/pear/cache
RUN sudo mkdir -p /etc/bash_completion.d/cargo
RUN sudo apt install -y php-dev
RUN sudo apt install -y php-pear
RUN sudo apt-get -y install dialog

RUN sudo apt-get update \
    && sudo apt-get install -y curl zip unzip git software-properties-common supervisor sqlite3 \
    && sudo add-apt-repository -y ppa:ondrej/php \
    && sudo apt-get update \
    && sudo apt-get install -y php7.4-dev php7.4-fpm php7.4-common php7.4-cli php7.4-imagick php7.4-gd php7.4-mysql php7.4-pgsql php7.4-imap php-memcached php7.4-mbstring php7.4-xml php7.4-xmlrpc php7.4-soap php7.4-zip php7.4-curl php7.4-bcmath php7.4-sqlite3 php7.4-apcu php7.4-apcu-bc php7.4-intl php-dev php7.4-dev php7.4-xdebug php-redis \
    && sudo php -r "readfile('http://getcomposer.org/installer');" | sudo php -- --install-dir=/usr/bin/ --version=1.10.16 --filename=composer \
    && sudo mkdir /run/php \
    && sudo chown gitpod:gitpod /run/php \
    && sudo chown -R gitpod:gitpod /etc/php \
    && sudo apt-get remove -y --purge software-properties-common \
    && sudo apt-get -y autoremove \
    && sudo apt-get clean \
    && sudo rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && sudo update-alternatives --remove php /usr/bin/php8.0 \
    && sudo update-alternatives --remove php /usr/bin/php7.3 \
    && sudo update-alternatives --set php /usr/bin/php7.4 \
    && sudo echo "daemon off;" >> /etc/nginx/nginx.conf

    # Install MySQL
ENV PERCONA_MAJOR 5.7
RUN sudo apt-get update \
 && sudo apt-get -y install gnupg2 \
 && sudo apt-get clean && sudo rm -rf /var/cache/apt/* /var/lib/apt/lists/* /tmp/* \
 && sudo mkdir /var/run/mysqld \
 && sudo wget -c https://repo.percona.com/apt/percona-release_latest.stretch_all.deb \
 && sudo dpkg -i percona-release_latest.stretch_all.deb \
 && sudo apt-get update

RUN set -ex; \
	{ \
		for key in \
			percona-server-server/root_password \
			percona-server-server/root_password_again \
			"percona-server-server-$PERCONA_MAJOR/root-pass" \
			"percona-server-server-$PERCONA_MAJOR/re-root-pass" \
		; do \
			sudo echo "percona-server-server-$PERCONA_MAJOR" "$key" password 'admin@12345'; \
		done; \
	} | sudo debconf-set-selections; \
	sudo apt-get update; \
	sudo apt-get install -y \
		percona-server-server-5.7 percona-server-client-5.7 percona-server-common-5.7 \
	;
	
RUN sudo chown -R gitpod:gitpod /etc/mysql /var/run/mysqld /var/log/mysql /var/lib/mysql /var/lib/mysql-files /var/lib/mysql-keyring

# Install our own MySQL config
COPY mysql.cnf /etc/mysql/conf.d/mysqld.cnf
COPY .my.cnf /home/gitpod
COPY mysql.conf /etc/supervisor/conf.d/mysql.conf
RUN sudo chown gitpod:gitpod /home/gitpod/.my.cnf

# Install default-login for MySQL clients
COPY client.cnf /etc/mysql/conf.d/client.cnf

#Copy nginx default and php-fpm.conf file
#COPY default /etc/nginx/sites-available/default
COPY php-fpm.conf /etc/php/7.4/fpm/php-fpm.conf
RUN sudo chown -R gitpod:gitpod /etc/php

COPY nginx.conf /etc/nginx

# Install Chrome and Chromium
RUN sudo wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb \
    && sudo dpkg -i google-chrome-stable_current_amd64.deb; sudo apt-get -fy install \
    && sudo apt-get install -yq \
       gconf-service libasound2 libatk1.0-0 libatk-bridge2.0-0 libc6 libcairo2 libcups2 libdbus-1-3 \
       libexpat1 libfontconfig1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 libgtk-3-0 libnspr4 \
       libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 \
       libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates \
       fonts-liberation libappindicator1 libnss3 lsb-release xdg-utils wget

# Install Redis.
RUN sudo apt-get update \
 && sudo apt-get install -y \
  redis-server \
 && sudo rm -rf /var/lib/apt/lists/*
 
 #n98-magerun2 tool.
    
# nvm environment variables
RUN sudo mkdir -p /usr/local/nvm
RUN sudo chown gitpod:gitpod /usr/local/nvm
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 14.17.3

# Replace shell with bash so we can source files
RUN sudo rm /bin/sh && sudo ln -s /bin/bash /bin/sh

# install nvm
# https://github.com/creationix/nvm#install-script
RUN curl --silent -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash

# install node and npm, set default alias
RUN source $NVM_DIR/nvm.sh \
  && nvm install $NODE_VERSION \
  && nvm alias default $NODE_VERSION \
  && nvm use default

# add node and npm to path so the commands are available
ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH
    
RUN curl https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-5.6.16.tar.gz --output elasticsearch-5.6.16.tar.gz \
    && tar -xzf elasticsearch-5.6.16.tar.gz
ENV ES_HOME56="$HOME/elasticsearch-5.6.16"

RUN curl https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-6.8.9.tar.gz --output elasticsearch-6.8.9.tar.gz \
    && tar -xzf elasticsearch-6.8.9.tar.gz
ENV ES_HOME68="$HOME/elasticsearch-6.8.9"

RUN curl https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.9.3-linux-x86_64.tar.gz --output elasticsearch-7.9.3-linux-x86_64.tar.gz \
    && tar -xzf elasticsearch-7.9.3-linux-x86_64.tar.gz
ENV ES_HOME79="$HOME/elasticsearch-7.9.3"