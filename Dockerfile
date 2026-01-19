FROM registry.access.redhat.com/ubi9/php-83

# Copy application
COPY . /opt/app-root/src

# OpenShift permissions
RUN chgrp -R 0 /opt/app-root/src \
 && chmod -R g+rwX /opt/app-root/src

EXPOSE 8080

# Required by OpenShift S2I images
CMD ["run-httpd"]
