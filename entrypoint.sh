#!/bin/bash
shopt -s nocasematch

if [[ $1 = *.php ]]; then
  ls /app/$1
  if [[ -f "/app/$1" ]]; then
    echo "Run sandbox for developer... (press [Ctrl] + [C] to stop)"
    server=$(mktemp /tmp/dev-server-XXXXXX.php)
    echo "<?php" > $server
    echo "require_once '/var/www/html/vendor/autoload.php';" >> $server
    echo "require_once '/app/$1';" >> $server
    trap "echo heers^" INT
    php -S 0.0.0.0:80 $server 2> /dev/null
    exit
  fi
fi

echo "[webrequest] Run main process..."
docker-php-entrypoint $*

