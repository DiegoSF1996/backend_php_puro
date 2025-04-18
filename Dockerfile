FROM php:8.2-cli 
WORKDIR /usr/src/www
COPY . ./usr/src/www
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80"]