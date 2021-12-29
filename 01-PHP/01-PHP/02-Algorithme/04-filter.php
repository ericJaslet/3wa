<?php

function testWeCanFilter() {
    $nombers = [2, 20, 1, 15, 11];

    function filters(array $arr): array {
        $result = [];
        foreach($arr as $value) {
            // if ($value > 10) {
            //     $result[] = $value;
            // }
            ($value > 10)? $result[] = $value : null;
        }
        return $result;
    }

    $results = filters($nombers);
    assert(is_array($results));
    assert(count($results) === 3);
    assert($results[0] === 20);
    assert($results[1] === 15);
    assert($results[2] === 11);
}

testWeCanFilter();

/*
function testWeCanFilterOther() {
    $nombers = [2, 20, 1, 15, 11];

    function filter2(array $arr): array {
        $result = [];
        foreach($arr as $value) {
            // if ($value < 10) {
            //     $result[] = $value;
            // }
            ($value < 10)? $result[] = $value : null;
        }
        return $result;
    }

    $results = filter2($nombers);

    assert(is_array($results));
    assert(count($results) === 2);
    assert($results[0] === 2);
    assert($results[1] === 1);

}
testWeCanFilterOther();
*/

function testWeCanFilterOther() {
    function filter(array $arr, callable $fn)
    {
        $result = [];
        foreach ($arr as $index => $value) {
            if ($fn($value, $index)) {
                $result[] = $value;
            }
        }
        return $result;
    }
    $numbers = [2, 20, 1, 15, 11];
    $results = filter($numbers, function ($value) {
        return $value > 10;
    });

    assert(is_array($results));
    assert(count($results) === 3);
    assert($results[0] === 20);
    assert($results[1] === 15);
    assert($results[2] === 11);
}
testWeCanFilterOther();