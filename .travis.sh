#!/bin/sh
set -ex
hhvm --version
curl https://getcomposer.org/installer | hhvm -d hhvm.jit=0 --php -- /dev/stdin --install-dir=/usr/local/bin --filename=composer

cd /var/source
hhvm -d hhvm.php7.all=1 /usr/local/bin/composer install

hh_client

hhvm -d hhvm.php7.all=0 vendor/bin/phpunit tests/
hhvm -d hhvm.php7.all=1 vendor/bin/phpunit tests/

hhvm -d hhvm.php7.all=0 bin/hhast-lint --perf
hhvm -d hhvm.php7.all=1 bin/hhast-lint --perf
