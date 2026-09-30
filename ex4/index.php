<?php
    function gerarSenha(){
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $senha = rand($caracteres);
        echo $senha;
    }

gerarSenha()
?>

