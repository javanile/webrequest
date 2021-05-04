<?php

var_dump($_SERVER);
$sources = [
    'github' => '',
];

$_SERVER['REQUEST_URI'];
$file = tempnam(sys_get_temp_dir(), 'FOO.php');
$url = 'https://raw.githubusercontent.com/javanile/webrequest/main/tests/fixtures/script.php';
$script = file_get_contents($url);
file_put_contents($file, $script);

require_once $file;
