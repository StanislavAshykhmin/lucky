FROM mysql:8.0.3

MAINTAINER Stanislav Ashykhmin <ashykhminstanislav@gmail.com>

ARG HOST_UID=1000

VOLUME ["/var/lib/mysql"]

RUN usermod -u ${HOST_UID} mysql

EXPOSE 3306
