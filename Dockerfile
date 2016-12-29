FROM wordpress

MAINTAINER email@matturban.com

RUN mkdir /var/www/html/wp-content/themes/MEH
ADD theme/* /var/www/html/wp-content/themes/MEH/
