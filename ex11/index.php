<?php
function formatarTexto($texto){
    $maiusculas = strtoupper($texto);
    $minusculas = strtolower($texto);
    $capitalizado = ucwords($texto);
    $totalCaracteres = strlen($texto);

    echo "Texto original: ", $texto .  
        "<br>Maiúsculas: $maiusculas <br>" .
        "Minúsculas: $minusculas <br>" .
        "Primeira letra maiúscula: $capitalizado <br>" .
        "Total de caracteres: $totalCaracteres";
}

echo formatarTexto("Tinha o pet e o repete, o pet morreu, quem sobrou?");
?>
