<?php
function analisarNumero($numero){
    $par = ($numero % 2 == 0);

    $primo = true;
    if ($numero <= 1) {
        $primo = false;
    } else {
        for ($d = 2; $d < $numero; $d++) {
            if ($numero % $d == 0) {
                $primo = false;
                break;
            }
        }
    }

    $somaDivisores = 0;
    for ($i = 1; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $somaDivisores += $i;
        }
    }
    $perfeito = ($somaDivisores == $numero && $numero > 1);

    if ($par) {
        echo "O número é par.<br>";
    } else {
        echo "O número é ímpar.<br>";
    }

    if ($primo) {
        echo "O número é primo.<br>";
    } else {
        echo "O número NÃO é primo.<br>";
    }

    if ($perfeito) {
        echo "O número é perfeito.<br>";
    } else {
        echo "O número NÃO é perfeito.<br>";
    }
}

analisarNumero(6);
?>