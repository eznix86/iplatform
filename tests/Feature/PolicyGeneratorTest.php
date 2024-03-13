<?php

use App\Actions\Policy\PolicyNumberGenerator;

test('check if generator works well', function () {

    $result = (new PolicyNumberGenerator)->handle();

    expect($result)->toBeString();
    expect($result)->toHaveLength(11);
});

test('check if generator generate expect params', function ($segment, $characters, $expected) {

    $result = (new PolicyNumberGenerator)->handle($segment, $characters);

    expect($result)->toBeString();
    expect($result)->toHaveLength($expected);
})->with([

    '3-3' => [3, 3, 11],
    '3-4' => [3, 4, 14],
    '4-5' => [4, 5, 23],
    '5-6' => [5, 6, 34],
]);
