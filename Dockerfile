FROM php:8.2-cli
COPY . /var/www/html/
ENV PORT=80
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
