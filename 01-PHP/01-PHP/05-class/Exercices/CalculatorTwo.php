<?php

class CalculatorTwo
{
  public function __construct(
    private $precision = 2,
    )
  {}

  public function result(array $values):string {

    $nbr1 = ($values[0][0])?? 0;
    $nbr2 = ($values[0][1])?? 0;

    return match ($values[1][0]){
      ('+') => $this->addition($nbr1, $nbr2),
      ('/') => $this->division($nbr1, $nbr2),
      ('*') => $this->multiplication($nbr1, $nbr2),
      ('S') => $this->somme( $values[0] ),
      default => throw new Exception("Opération inconue."),
    };
  }

  private function addition(float $nbrOne, float $nbrTwo): float{
    return round($nbrOne + $nbrTwo, $this->precision);
  }
  private function multiplication(float $nbrOne, float $nbrTwo): float{
    return round($nbrOne * $nbrTwo, $this->precision);
  }
  private function division(float $nbrOne, float $nbrTwo): float{
    if ($nbrTwo === 0.0) throw new DivisionByZeroError("Division par 0 n'est pas autorisé");
    return round($nbrOne / $nbrTwo, $this->precision);
  }
  private function somme(array $args): float{
    $result = 0;
    foreach($args as $arg) {
      $result =+ $this->addition($result, $arg);
    }
    return $result;
  }
}