<?php
function analisarNumero($numeros){
$soma = 0;
$maiorNumero = $numeros[0];
$menorNumero = $numeros[0];
$soma = 0;
$media = 0;
$contadoraImpar = 0;
$contadoraPar = 0;
$quantidade = count($numeros);
$meio = (int)($quantidade / 2);
    

for ($i = 0; $i < $quantidade; $i++){
    $soma = $soma + $numeros[$i];
    $media = $soma / $quantidade;
    if($numeros[$i] > $maiorNumero){
        $maiorNumero = $numeros[$i];
    }
    if($numeros[$i] < $menorNumero){
        $menorNumero = $numeros[$i];
    }
}
    for ($i = 0; $i < $quantidade; $i++){
        if($numeros[$i] % 2 == 0){
            $contadoraPar += 1;
        }else{
            $contadoraImpar += 1;
        }
    }
$mediana = 0;
    if ($quantidade % 2 != 0) {
         $mediana = $numeros[$meio];
    }else{
        $mediana = ($numeros[$meio - 1] + $numeros[$meio]) / 2;
    }


echo "a soma total é " . $soma;
echo "<br>o maior número é " . $maiorNumero;
echo "<br>o menor número é " . $menorNumero;
echo "<br>a média é " . $media;
echo "<br>a mediana é " . $mediana;
echo "<br>a quantidade de impares é " . $contadoraImpar;
echo "<br>a quantidade de impares é " . $contadoraPar;


}
$vetor = [10,15,20,25,30];

analisarNumero($vetor)
?>