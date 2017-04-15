FROM wordpress

MAINTAINER email@matturban.com

# Install theme folder. Copied to /var/www/html/wp-content/
# as part of WP's installation process
RUN mkdir /usr/src/wordpress/wp-content/themes/MEH
COPY ./theme /usr/src/wordpress/wp-content/themes/MEH
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content/themes/MEH
