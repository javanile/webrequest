<?php

test('laravel', function () {
    $_GET['value1'] = 1;
    $_GET['value2'] = 2;
    $_GET['value3'] = 3;
    require_once __DIR__.'/fixtures/laravel.php';
    $this->expectOutputString('6');
    expect(true)->toBeTrue();
});
