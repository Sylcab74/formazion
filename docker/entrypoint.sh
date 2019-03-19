#! /bin/sh

set -e

service ssh start

eval "/usr/local/bin/docker-php-entrypoint $@"
