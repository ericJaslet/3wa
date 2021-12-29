<?php

function mapped (array $numbers, string $glue, string $symbol):string
{
    $result = '';
    foreach ($numbers as $key => $value) {
        $result .= "$key $symbol $value$glue";
    }
    $glue_l = strlen($glue);
    return substr($result, 0, -$glue_l);
}

echo mapped(numbers: ['x' => 1,'y' => 2,'z' => 3,'t' => 7], glue : ', ', symbol : "=");