<?php

namespace Providers;

trait TraitProvider
{
    public function additionEqualProvider():array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 2, 3]
        ];
    }
    public function additionSameProvider():array
    {
        return [
            [0.0, 0.0, 0.0],
            [0.0, 1.0, 1.0],
            [1.0, 0.0, 1.0],
            [1.0, 2.0, 3.0]
        ];
    }

    public function divisorEqualProvider():array
    {
        return [
            [10, 2, 5],
            [1, 2, .5]
        ];
    }
    public function divisorSameProvider():array
    {
        return [
            [10.0, 2.0, 5.0],
            [1.0, 2.0, .5]
        ];
    }
}