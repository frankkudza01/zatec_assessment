
# Use the official PHP image as the base image
FROM php:7.4-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the Laravel application files to the container
COPY . /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --no-scripts

# Set the appropriate permissions
RUN chown -R www-data:www-data /var/www/html/storage

# Expose port 8000
EXPOSE 8000

# Start the Apache server
CMD ["apache2-foreground"]