#!/bin/bash
shopt -s nocasematch

if [[ $1 = *.php ]]; then
  ls /app/$1
  if [[ -f "/app/$1" ]]; then
    echo "[webrequest] Run sandbox for developer..."
    php -S 0.0.0.0:80 /app/$1
  fi
fi

echo "[webrequest] Run main process..."
docker-php-entrypoint $*
