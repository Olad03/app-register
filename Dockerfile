FROM php:8.2-apache

# Install system dependencies required to build PHP extensions
RUN apt-get update && apt-get install -y \
    gcc \
    make \
    libmariadb-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get purge -y gcc make \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite (optional)
RUN a2enmod rewrite

# Copy application source
COPY . /var/www/html/

# Fix permissions for OpenShift random UID
RUN chown -R 1001:0 /var/www/html && chmod -R g+rwX /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]

