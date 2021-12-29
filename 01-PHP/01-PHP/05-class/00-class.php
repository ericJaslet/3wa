<?php

class LevelOne {
    public function __construct(
        private int $force = 1,
        protected string $name = "name",
    )
    {
        
    }

    public function getForce () {
        return $this->force;
    }
}

class LevelTwo extends LevelOne {

}

$toto = new LevelTwo();

echo $toto->getForce();

function gen2(){
    for ($i = 0; $i <= 2; $i++) {
        yield "toto";
    }
}



function gen(){
    for ($i = 0; $i <= 10; $i++) {
        if ($i === 5 ){
            yield from gen2();
        }else{
            yield $i;
        }
    }
}



function genOdd($generator) {
    foreach($generator as $value) {
        echo $value . PHP_EOL;
    }
}
$generator = gen();
genOdd($generator);


// persistance est une responsabilité
// 