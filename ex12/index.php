<?php
function analisarProdutos($nome, $preco, $quantidade, $busca){

     $maiorPreco = $preco[0];
     $menorPreco = $preco[0];
     $n = 0;
    for( $i = 0;$i < $quantidade; $i++){
        if ($preco[$i] > $maiorPreco){
            $maiorPreco = $preco[$i];
            $n +=1;
        }
    }
    $k= 0;
    for( $i = 0;$i < $quantidade; $i++){
        if ($preco[$i] < $menorPreco){
            $menorPreco = $preco[$i];
            $k +=1;
        }
    }

    $soma = 0;
    $media = 0;
    for( $i = 0;$i < $quantidade; $i++){
        $soma += $preco[$i];
    }
    $media = $soma / $quantidade;




echo "o produto ", $nome[$n], " é o mais barato, e custa: ", $menorPreco;
echo "<br>o produto ", $nome[$k], " é o mais caro, e custa: ", $maiorPreco;
echo "<br>a media dos preços dos produtos é ", $media;
echo "<br>a busca do usuario foi para o produto de numero: ",$busca, ", que é a: ", $nome[$busca], ", e o seu preço é: ", $preco[$busca];
    
}
    $nomeProduto = ["porta", "arvore", "flecha"];
    $precoProduto = [100.00, 1000.00, 1000.00];
    $quantidadeProduto = 3;
    $busca = 2;
analisarProdutos($nomeProduto, $precoProduto, $quantidadeProduto, $busca);

?>