<?php

function limparEspacos($texto) {
    return trim(preg_replace('/\s+/', ' ', $texto));
}

function contarFrases($texto) {
    return count(preg_split('/[.!?]+/', $texto, -1));
}

function pegarPalavras($texto) {
    $limpo = preg_replace('/[^\w\s]/u', '', strtolower($texto));
    return explode(' ', limparEspacos($limpo));
}

function buscarMaiorEMenor($palavras) {
    $maior = $palavras[0];
    $menor = $palavras[0];
    for ($i = 0; $i < count($palavras); $i++) {
        if (strlen($palavras[$i]) > strlen($maior)) {
            $maior = $palavras[$i];
        }
        if (strlen($palavras[$i]) < strlen($menor) && strlen($palavras[$i]) > 0) {
            $menor = $palavras[$i];
        }
    }
    return [$maior, $menor];
}

function contarRepetidas($frequencias) {
    $qtd = 0;
    $valores = array_values($frequencias);
    for ($i = 0; $i < count($valores); $i++) {
        if ($valores[$i] > 1) {
            $qtd++;
        }
    }
    return $qtd;
}

function pegarTop5($frequencias) {
    arsort($frequencias);
    $chaves = array_keys($frequencias);
    $valores = array_values($frequencias);
    $top = "";
    $limite = min(5, count($chaves));
    for ($i = 0; $i < $limite; $i++) {
        $top .= $chaves[$i] . " (" . $valores[$i] . "x), ";
    }
    return rtrim($top, ", ");
}

function formatarTexto($texto) {
    return ucwords(strtolower($texto));
}

function processarTexto($texto) {
    $textoSemEspacos = limparEspacos($texto);
    $qtdCaracteres   = strlen($textoSemEspacos);
    $qtdFrases       = contarFrases($texto);
    
    $palavras        = pegarPalavras($texto);
    $qtdPalavras     = count($palavras);
    
    $maiorEMenor     = buscarMaiorEMenor($palavras);
    $maiorPalavra    = $maiorEMenor[0];
    $menorPalavra    = $maiorEMenor[1];
    
    $freq            = array_count_values($palavras);
    $qtdRepetidas    = contarRepetidas($freq);
    $top5            = pegarTop5($freq);
    
    $textoFormatado  = formatarTexto($textoSemEspacos);

    echo "Quantidade de caracteres: " . $qtdCaracteres . "<br>";
    echo "Quantidade de palavras: " . $qtdPalavras . "<br>";
    echo "Quantidade de frases: " . $qtdFrases . "<br>";
    echo "Palavra mais longa: " . $maiorPalavra . "<br>";
    echo "Palavra mais curta: " . $menorPalavra . "<br>";
    echo "Quantidade de palavras repetidas: " . $qtdRepetidas . "<br>";
    echo "5 palavras mais frequentes: " . $top5 . "<br>";
    echo "Texto sem espaços duplicados: " . $textoSemEspacos . "<br>";
    echo "Texto formatado: " . $textoFormatado . "<br>";
}
processarTexto(" aaah, é de mais de 8mil! Mais de 8 mil?! isso deve ser um engano esse aparelho deve estar quebrado! . ");

?>