# Use the official PHP image as the base image
FROM php:7.4-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Install required PHP extensions and dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the application code to the container's working directory
COPY . .

# Expose port 80 for Apache web server
EXPOSE 80
