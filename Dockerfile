FROM php:8.4-apache

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
