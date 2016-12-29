FROM wordpress
MAINTAINER email@matturban.com
RUN mkdir -p /var/www/html/wp-content/themes/MEH
RUN chmod 775 /var/www/html/wp-content/themes/MEH
COPY ./theme wp-content/themes/MEH/
