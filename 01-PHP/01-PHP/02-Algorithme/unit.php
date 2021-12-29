<?php

if ($argc < 2  || $argc > 3) {
    die('usage:  ./unit.php [filename]');
}

$file_name = $argv[1];
// get_define_functions()['user];
// array_filter & str_starts_with;
// $e->getFile() $e->getLine()
$functions = array();
if ( file_exists ( $file_name ) ) {
    $contenu_fichier = file_get_contents("$file_name");
    preg_match_all("#function test_([\w-]*) ?\(.*\)#i", $contenu_fichier, $functions);
    $functions = $functions[1];
    // var_dump($functions);

    require_once($file_name);

    foreach($functions as $function) {
        $function = "test_" . $function;
        try {
            $function();
            echo "$function => ça marche" . PHP_EOL;
        }
        catch (AssertionError $e) {
            echo "$function => ça marche pas :";
            echo PHP_EOL . "\t|-> ";
            echo $e->getMessage();
        }
    }
}else{
    echo "Le fichier $file_name n'existe pas.";
}
echo PHP_EOL;