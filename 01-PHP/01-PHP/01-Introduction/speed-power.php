<?php
/*
3^11

*/


function speed_power($nbr, $power) {
    
    if ($power === 1 ) { // condition terminale
        return $nbr;
    }
    if ($power % 2 === 0) { // Logique pour arriver à la condition terminale
        $z = speed_power($nbr, $power / 2);
        return $z * $z;
    } else {
        $z = speed_power($nbr, ($power - 1) / 2);
        return $z * $z * $nbr;
    }
}
echo speed_power(3, 11);
/*
    3 11
    speed_power(3, 5) (11 - 1 / 2)
    speed_power(3, 2) (5 - 1 / 2)
    speed_power(3, 1)
*/
