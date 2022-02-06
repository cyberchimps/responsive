# Gitpod docker image for WordPress | https://github.com/luizbills/gitpod-wordpress
# License: MIT (c) 2020 Luiz Paulo "Bills"
# Version: 0.8
FROM gitpod/workspace-mysql

### General Settings ###
ENV PHP_VERSION="7.4"
ENV APACHE_DOCROOT="public_html"

### Setups, Node, NPM ###
USER gitpod
ADD https://api.wordpress.org/secret-key/1.1/salt?rnd=152634 /dev/null
RUN git clone https://github.com/luizbills/gitpod-wordpress $HOME/gitpod-wordpress && \
    cat $HOME/gitpod-wordpress/conf/.bashrc.sh >> $HOME/.bashrc && \
    . $HOME/.bashrc && \
    bash -c ". .nvm/nvm.sh && nvm install --lts"

### MailHog ###
USER root
ARG DEBIAN_FRONTEND=noninteractive
RUN go get github.com/mailhog/MailHog && \
    go get github.com/mailhog/mhsendmail && \
    cp $GOPATH/bin/MailHog /usr/local/bin/mailhog && \
    cp $GOPATH/bin/mhsendmail /usr/local/bin/mhsendmail && \
    ln $GOPATH/bin/mhsendmail /usr/sbin/sendmail && \
    ln $GOPATH/bin/mhsendmail /usr/bin/mail &&\
    ### Apache ###
    apt-get -y install apache2 && \
    chown -R gitpod:gitpod /var/run/apache2 /var/lock/apache2 /var/log/apache2 && \
    echo "include $HOME/gitpod-wordpress/conf/apache.conf" > /etc/apache2/apache2.conf && \
    echo ". $HOME/gitpod-wordpress/conf/apache.env.sh" > /etc/apache2/envvars && \
    ### PHP ###
    apt-get -qy purge php* && \
    add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get -qy install \
        libapache2-mod-php \
        php${PHP_VERSION} \
        php${PHP_VERSION}-common \
        php${PHP_VERSION}-cli \
        php${PHP_VERSION}-mbstring \
        php${PHP_VERSION}-curl \
        php${PHP_VERSION}-gd \
        php${PHP_VERSION}-intl \
        php${PHP_VERSION}-mysql \
        php${PHP_VERSION}-xml \
        php${PHP_VERSION}-json \
        php${PHP_VERSION}-zip \
        php${PHP_VERSION}-soap \
        php${PHP_VERSION}-bcmath \
        php${PHP_VERSION}-opcache \
        php-xdebug && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* && \
    update-alternatives --set php /usr/bin/php${PHP_VERSION} && \
    cat /home/gitpod/gitpod-wordpress/conf/php.ini >> /etc/php/${PHP_VERSION}/apache2/php.ini && \
    ### Setup PHP in Apache ###
    a2dismod php* && \
    a2dismod mpm_* && \
    a2enmod mpm_prefork && \
    a2enmod php${PHP_VERSION} && \
    ### WP-CLI ###
    wget -q https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -O $HOME/wp-cli.phar && \
    chmod +x $HOME/wp-cli.phar && \
    mv $HOME/wp-cli.phar /usr/local/bin/wp && \
    chown gitpod:gitpod /usr/local/bin/wp

USER gitpod