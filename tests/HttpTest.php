<?php

test('http', function () {
    $_GET['value1'] = 1;
    $_GET['value2'] = 2;
    $_GET['value3'] = 3;
    require_once __DIR__.'/fixtures/http.php';
    $this->expectOutputString('Tatooine');
    expect(true)->toBeTrue();
});
