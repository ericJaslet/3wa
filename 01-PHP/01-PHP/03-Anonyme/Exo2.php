<?php
namespace solution_01 {
    $products = [
        [10, 7, 9, 8, 6],
        [15, 17, 4, 18, 3],
        [2, 20, 101, 81, 62],
        [32, 17, 25, 97, 16],
        [5, 17, 10, 5, 10],
     ];
    
     function totalOdd($products) : float {
        $total = 0.00;
        $tax = .2;
        $callback = function($price) use ($tax, &$total) {
            if ($price % 2 === 0){
                $total += $price * ($tax + 1.0);
            }
        };
        foreach ($products as $tab_price) {
            array_map($callback, $tab_price);
            echo $total . PHP_EOL;
        }
    
        return $total;
     }
    echo totalOdd($products);
}

namespace solution_02 {
    $products = [
        [10, 7, 9, 8, 6],
        [15, 17, 4, 18, 3],
        [2, 20, 101, 81, 62],
        [32, 17, 25, 97, 16],
        [5, 17, 10, 5, 10],
     ];
    function totalTTC(array $products, float $tax = .2): float
    {
        $total = 0.00;

        $callback =
            function ($price) use ($tax, &$total) {
                    $total += $price  * ($tax + 1.0);
            };

        array_map($callback, $products);

        return round($total, 2);
    }

    $total = 0;
    foreach($products as $line){
        $p = [];
        foreach($line as $product) { 
            if($product % 2 != 0) continue; 
            $p[] = $product; 
        }

        $total += totalTTC(products: $p);
    }

    echo $total .PHP_EOL ;
}