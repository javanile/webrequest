#!/bin/bash
shopt -s nocasematch

if [[ $1 = *.php ]]; then
  if [[ -f "/app/$1" ]]; then
    server=$(mktemp /tmp/dev-server-XXXXXX.php)
    echo "<?php" > $server
    echo "require_once '/var/www/html/vendor/autoload.php';" >> $server
    echo "require_once trim(\$_SERVER['PHP_SELF'], '/') == 'debug' ? '/var/www/html/webrequest-debug.php' : '/app/$1';" >> $server
    echo -n "Run the sandbox at http://localhost:8080/debug ...press [Ctrl]+[C] to stop "
    trap "echo heers^" INT
    php -S 0.0.0.0:80 $server 2> /dev/null
    exit
  fi
fi

echo "[webrequest] Run main process..."
docker-php-entrypoint "$@"
