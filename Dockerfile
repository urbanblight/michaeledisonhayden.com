FROM wordpress
MAINTAINER email@matturban.com
RUN mkdir wp-content/themes/MEH
COPY theme/ wp-content/themes/MEH/
