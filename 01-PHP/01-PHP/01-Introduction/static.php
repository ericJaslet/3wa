<?php
function increment_static() {
    static $a = 0;
    $a++;
    echo $a;
}

increment_static();
echo PHP_EOL;
increment_static();
echo PHP_EOL;
increment_static();