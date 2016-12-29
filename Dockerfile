FROM wordpress
MAINTAINER email@matturban.com
USER www-data
ADD theme/ /var/www/html/wp-content/themes/MEH/
