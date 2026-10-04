<?php

function analisarTexto($texto) {
    $resultado =[
    'palavras' => str_word_count($texto),
    'caracteres' =>strlen($texto),
    'vogais' => preg_match_all('/[aeiou]/i', $texto),
    'consoantes' => preg_match_all('/[bcdfghjklmnpqrstvwxyz]/i', $texto)
    ];
    echo "Palavras: " . $resultado['palavras'] . "<br>";
    echo "Caracteres: " . $resultado['caracteres'] . "<br>";
    echo "Vogais: " . $resultado['vogais'] . "<br>";
    echo "Consoantes: " . $resultado['consoantes'] . "<br>";

}

analisarTexto("Ney Arroganthi");
?>