<?php

function bubble_sort(&$tableau, $asc='')
{
    $taille = count($tableau);
    for($i = 1; $i < $taille; $i++)
    {
        for($j = $taille-1; $j >= $i; $j--)
        {
            if($tableau[$j+1] > $tableau[$j])
            {
                $temp = $tableau[$j+1];
                $tableau[$j+1] = $tableau[$j];
                $tableau[$j] = $temp;
            }
        }
    }
    return $tableau;
}

var_dump( bubble_sort([8,1, 0, 17,15, 2, 7, 12], $asc) );

