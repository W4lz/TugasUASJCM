# Gunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Enable Apache modules yang diperlukan
RUN a2enmod rewrite

# Salin semua file project ke container
COPY . .

# Set permission yang tepat
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
