<?php

function my_plit_array(array $numbers, int $pos):void {
    $tab_l = count($numbers);
    if ($pos <= 0 || $pos >= $tab_l) {
        var_dump( $numbers);
    }
    $tab_one = [];
    $tab_two = [];
    for ($i=0; $i<$tab_l; $i++) {
        if ($i <= $pos) {
            $tab_one[] = $numbers[$i];
        }else{
            $tab_two[] = $numbers[$i];
        }
    }
    var_dump([$tab_one, $tab_two]);
}

my_plit_array(numbers: [1,2,3,7], pos : 2);
// [1,2, 3] [7]