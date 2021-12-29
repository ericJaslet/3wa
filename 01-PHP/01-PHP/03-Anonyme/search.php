<?php
$content = [2,1,4,2, 6, 1, 2, 3, 7];
$seq = [1,2,3]; // mot recherche


function search_pos_word($content, $seq) {
    $patlen = count($seq);
    $contentlen = count($content);
    $table = makeCharTable($seq);

    for ($i=$patlen-1; $i < $contentlen;) { 
        $t = $i;
        for ($j=$patlen-1; $seq[$j]==$content[$i]; $j--,$i--) { 
            if($j == 0) return $i;
        }
        $i = $t;
        if(array_key_exists($content[$i], $table))
            $i = $i + max($table[$content[$i]], 1);
        else
            $i += $patlen;
    }
    return -1;
}

function makeCharTable($string) {
    $len = count($string);
    $table = array();
    for ($i=0; $i < $len; $i++) { 
        $table[$string[$i]] = $len - $i - 1; 
    }
    return $table;
}

// echo search_pos_word($content, $seq);

echo PHP_EOL;

function search_pos_seq_all (array $array_words, $content) {
    $result = [];
    foreach( $array_words as $word) {

        $pos = search_pos_word($content, $word);

        $result[] = new class(seq : $word, pos :$pos)
                {
                    public function __construct(
                        public array $seq,
                        public int $pos
                    ) {
                    }
                };
        echo search_pos_word($content, $word);
        echo PHP_EOL;
    }
    return $result;
}
$array_words = [ [1,2,3], [2,6] ];

var_dump( search_pos_seq_all($array_words, $content) );