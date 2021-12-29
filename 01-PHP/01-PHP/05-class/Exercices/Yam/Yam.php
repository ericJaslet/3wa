<?php

class Yam
{
    const DE = [1, 2, 3, 4, 5, 6];
    private int $brelan = 0;
    private int $carre = 0;
    private bool $oneDouble = false;
    private int $doubleP = 0;
    private int $yam = 0;
    private int $countThrow = 1;

    private array $result = [
        'one' => 0,
        'two' => 0,
        'three' => 0,
        'four' => 0,
        'five' => 0,
        'six' => 0,
    ];

    public function __construct(
    ){}

    /**
     * @param integer $nbrThrow
     * @return void
     */
    public function play(int $nbrThrow):void{
        for ($i=0; $i<$nbrThrow; $i++) {
            $this->throwOf();
            $this->countThrow++;
        }
        $this->displayResult();
    }

    /**
     * @return integer
     */
    private function throwOfOne():int{
        return array_rand(self::DE, 1);
    }

    /**
     * @return void
     */
    private function isDouble():void {
        if ($this->oneDouble){
            $this->doubleP++;
        }
        $this->oneDouble = true;
    }

    /**
     * @return void
     */
    private function searchMatch():void {
        foreach ($this->result as $nbrCheck) {
            match($nbrCheck) {
                2 => $this->isDouble(),
                3 => $this->brelan++,
                4 => $this->carre++,
                5 => $this->yam++,
                default => null,
            };
        }
        $this->oneDouble = false;
    }

    /**
     * @return void
     */
    private function init():void {
        $this->result = [
            'one' => 0,
            'two' => 0,
            'three' => 0,
            'four' => 0,
            'five' => 0,
            'six' => 0,
        ];
    }

    /**
     * @return void
     */
    private function throwOf():void {
        for ($i=0;$i<5;$i++) {
            match ($this->throwOfOne() ){
                1 => $this->result['one']++,
                2 => $this->result['two']++,
                3 => $this->result['three']++,
                4 => $this->result['four']++,
                5 => $this->result['five']++,
                default => $this->result['six']++
            };
        }
        $this->resultByThrowOf();
        $this->searchMatch();
        $this->init();
    }

    /**
     * @return void
     */
    private function resultByThrowOf():void {
        echo "{$this->countThrow} => one : {$this->result['one']}";
        echo " | two : {$this->result['two']}";
        echo " | three : {$this->result['three']}";
        echo " | four : {$this->result['four']}";
        echo " | five : {$this->result['five']}";
        echo " | six : {$this->result['six']}";
        echo PHP_EOL;
    }

    /**
     * @return void
     */
    public function displayResult(): void{
        echo "brelan : {$this->brelan} (trois dés identiques)";
        echo PHP_EOL;
        echo "carré : {$this->carre} (4 dés indentiques)";
        echo PHP_EOL;
        echo "double paire : {$this->doubleP} (deux dés identiques X 2 les paires sont des dés différents )";
        echo PHP_EOL;
        echo "yam : {$this->yam} (5 dés identiques)";
        echo PHP_EOL;
    }

}

