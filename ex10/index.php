<?php
function analisarNumero($notas, $quantidade){


    $maiorNota = $notas[0];
    for( $i = 0;$i < $quantidade; $i++){
        if ($notas[$i] > $maiorNota){
            $maiorNota = $notas[$i];
        }
    }
    $menorNota = $notas[0];
    for( $i = 0;$i < $quantidade; $i++){
        if ($notas[$i] < $menorNota){
            $menorNota = $notas[$i];
        }
    }
$soma = 0;
$media = 0;
    for( $i = 0;$i < $quantidade; $i++){
        $soma += $notas[$i];
    }
    $media = $soma / $quantidade;

if ($media < 6){
  echo "A situação do aluno é: Reprovado";    
}

if ($media <= 7){
  echo "A situação do aluno é: Recuperação";    
}
if ($media > 7){
  echo "A situação do aluno é: Aprovado";    
}
  echo "<br>A maior nota é: " . $maiorNota;
  echo "<br>A menor nota é: " . $menorNota;
  echo "<br>A média é: " . $media;

  }
  $aluno =[8.5, 7.5, 6.5];
    analisarNumero($aluno, 3);


?>