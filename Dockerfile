# Use pre-built PHP base image from Quay (already contains PHP binaries)
FROM quay.io/saburi_adekanbi/test-app/test-app-php:1.0

# Copy application source code
COPY . /var/www/html/

# Fix permissions for OpenShift random UID
RUN chown -R 1001:0 /var/www/html && \
    chmod -R g+rwX /var/www/html

# Expose HTTP port
EXPOSE 80

# Start Apache (assumes base image already has Apache configured)
CMD ["apache2-foreground"]
