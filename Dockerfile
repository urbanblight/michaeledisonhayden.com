FROM wordpress

MAINTAINER email@matturban.com

RUN mkdir wp-content/themes/MEH
ADD theme/* wp-content/themes/MEH/
