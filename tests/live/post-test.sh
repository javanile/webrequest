#!/usr/bin/env bash
set -e

curl https://webrequest.cc/php-nocode/kit/debug -d value1=value1 > tests/tmp/live-post.txt

diff tests/tmp/live-post.txt tests/fixtures/live/post.txt


