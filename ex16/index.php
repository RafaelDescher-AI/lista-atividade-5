<?php

function contarMaiusculas($senha) {
    return preg_match_all('/[A-Z]/', $senha);
}
function contarMinusculas($senha) {
    return preg_match_all('/[a-z]/', $senha);
}
function contarNumeros($senha) {
    return preg_match_all('/[0-9]/', $senha);
}
function contarEspeciais($senha) {
    return preg_match_all('/[^a-zA-Z0-9]/', $senha);
}
    function classificarSeguranca($tamanho, $maiusculas, $minusculas, $numeros, $especiais) {
    if ($tamanho < 8) {
        return "Fraca";
        }

    $criterios = 0;
    if ($maiusculas > 0) $criterios++;
    if ($minusculas > 0) $criterios++;
    if ($numeros > 0)    $criterios++;
    if ($especiais > 0)  $criterios++;

    switch ($criterios) {
        case 4:
            return "Desista hacker😎";
        case 3:
            return "Forte";
        case 2:
            return "Média";
        default:
            return "Fraca";
            }
    }

   function analisarSenha($senha) {
    $totalMaiusculas = contarMaiusculas($senha);
    $totalMinusculas = contarMinusculas($senha);
    $totalNumeros    = contarNumeros($senha);
    $totalEspeciais  = contarEspeciais($senha);
    $tamanhoSenha    = strlen($senha);

    $nivelSeguranca  = classificarSeguranca($tamanhoSenha, $totalMaiusculas, $totalMinusculas, $totalNumeros, $totalEspeciais);
    
    echo "Relatório da Senha: " . $senha . "<br>";
    echo "Tamanho da senha: " . $tamanhoSenha . " caracteres<br>";
    echo "Quantidade de letras maiúsculas: " . $totalMaiusculas . "<br>";
    echo "Quantidade de letras minúsculas: " . $totalMinusculas . "<br>";
    echo "Quantidade de numeros: " . $totalNumeros . "<br>";
    echo "Quantidade de caracteres especiais: " . $totalEspeciais . "<br>";
    echo "Nivel de Segurança: " . $nivelSeguranca . "<br>";
   }
    analisarSenha("Senha@123");

    ?>