<?php

class Calculator 
{
  public function __construct(
    private $precision = 2,
    )
  {}

  public function addition(float $nbrOne, float $nbrTwo): float{
    return round($nbrOne + $nbrTwo, $this->precision);
  }
  public function multiplication(float $nbrOne, float $nbrTwo): float{
    return round($nbrOne * $nbrTwo, $this->precision);
  }
  public function division(float $nbrOne, float $nbrTwo): float{
    if ((int)$nbrTwo === 0) throw new DivisionByZeroError("Division par 0 n'est pas autorisé");
    return round($nbrOne / $nbrTwo, $this->precision);
  }
  public function somme(): float{
    $args = func_get_args();
    $result = 0;
    foreach($args as $arg) {
      $result =+ $this->addition($result, $arg);
    }
    return $result;
  }
  public function somme2(float ...$nbrs): float{
    $result = 0;
    foreach($nbrs as $nbr) {
      $result =+ $this->addition($result, $nbr);
    }
    return $result;
    }
}