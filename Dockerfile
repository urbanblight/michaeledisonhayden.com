FROM wordpress
MAINTAINER email@matturban.com
RUN mkdir /usr/src/wordpress/wp-content/themes/MEH
COPY ./theme /usr/src/wordpress/wp-content/themes/MEH
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content/themes/MEH
