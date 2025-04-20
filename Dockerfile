FROM php:8.2-cli  AS builder
WORKDIR /usr/src/www
COPY . ./usr/src/www

FROM php:8.2-fpm-alpine
COPY --from=builder /usr/src/www /usr/src/www
WORKDIR /usr/src/www
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80"]