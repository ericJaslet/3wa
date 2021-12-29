<?php

/*
    suite de Fibonacci
    u v u + v

*/

function fiboTwo($n) {
    static $u = 0;
    static $v = 1;
    static $first = true;

    if ( $n <= 0 ) {
        return;
    }
    echo PHP_EOL . $u;

    if ( ($n === 0 || $n === 1) && $first) {
        // echo PHP_EOL . 0;
        return;
    } else {
        $first = false;
        //echo PHP_EOL . $v;
        $u = $v;
        $v = $u + $v;
        fiboTwo($n - 1 );
    }
}
echo "here : " . PHP_EOL;
fiboTwo(5);



function fibonacci($old, $new, $end, $init=true){

    static $start = 1;
    $start = $init ? 1 : $start;
    if($start>$end){
        return;
    }
    $start++;

    echo $old." ";
    $_temp = $old + $new;
    $old = $new;
    $new = $_temp;

    fibonacci($old, $new, $end, false);
}
fibonacci(0,1,1);
echo PHP_EOL;
fibonacci(0,1,20);