FROM webdevops/php-nginx-dev:8.3

RUN curl -L https://deb.nodesource.com/setup_20.x | bash \
    && apt-get install -yq \
        nodejs