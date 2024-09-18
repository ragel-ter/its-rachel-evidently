#!/bin/sh
set -e

./vendor/bin/phinx migrate -e production

php-fpm