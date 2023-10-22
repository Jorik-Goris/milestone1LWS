# Use the Ubuntu 22.04 as the base image
FROM ubuntu:22.04

# Install Apache and PHP
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y apache2 php

RUN apt-get install -y php-mysql


# Remove the default index.html file
RUN rm /var/www/html/index.html

# Copy your index.php file to the web server directory
COPY index.php /var/www/html/index.php

# Expose port 80 for the web server
EXPOSE 80

# Start Apache when the container runs
CMD ["apachectl", "-D", "FOREGROUND"]
