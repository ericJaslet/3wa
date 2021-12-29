<?php

class Calculator {

    private float $resultat;
    private array $nbrs;

    public function __construct(
    ){}

    public function result($operation) {
        $this->nbrs = $operation[0];
        $ope = $operation[1][0];

        match ($ope) {
            ('+') => $this->addition(),
            ('-') => $this->soustraction(),
            ('*') => $this->multiplication(),
            ('/') => $this->division(),
            default => 0
        };
        echo $this->resultat;
    }

    private function addition() {
        $this->resultat = $this->nbrs[0];
        $nbrs_l = count($this->nbrs);
        for( $i=1; $i<$nbrs_l; $i++){
            $this->resultat += $this->nbrs[$i];
        }
    }

    private function soustraction() {
        $this->resultat = $this->nbrs[0];
        $nbrs_l = count($this->nbrs);
        for( $i=1; $i<$nbrs_l; $i++){
            $this->resultat -= $this->nbrs[$i];
        }
    }
    private function multiplication() {
        $this->resultat = $this->nbrs[0];
        $nbrs_l = count($this->nbrs);
        for( $i=1; $i<$nbrs_l; $i++){
            $this->resultat *= $this->nbrs[$i];
        }
    }
    private function division() {
        $this->resultat = $this->nbrs[0];
        $nbrs_l = count($this->nbrs);
        for( $i=1; $i<$nbrs_l; $i++){
            $this->resultat /= $this->nbrs[$i];
        }
    }
}

$calculator = new Calculator;
$operation = [ [11, 2], ["+"] ] ;
$calculator->result($operation);
echo PHP_EOL;
$calculator->result([ [11, 2], ["-"] ] );
echo PHP_EOL;
$calculator->result([ [11, 2], ["*"] ] );
echo PHP_EOL;
$calculator->result([ [22, 2], ["/"] ] );
echo PHP_EOL;