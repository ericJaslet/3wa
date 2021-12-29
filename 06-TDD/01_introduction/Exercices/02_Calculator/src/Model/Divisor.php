<?php

namespace App\Model;

class Divisor
{
    public function division(Number $a, Number $b): NumberString
    {

        if ((int) $b->getNumber() == 0) throw new \DivisionByZeroError("Impossible de diviser par zéro.");

        return new NumberString($a->getNumber() / $b->getNumber());
    }
}
