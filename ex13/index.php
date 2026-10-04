<?php
function criptografarMensagem($texto){
    echo "Mensagem original: $texto <br>";
    $numeroAvanco = rand(1, 25);
    $mensagemCriptografada = "";

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];
        if ($char >= 'A' && $char <= 'Z') {
            $mensagemCriptografada .= chr((ord($char) - ord('A') + $numeroAvanco) % 26 + ord('A'));
        } elseif ($char >= 'a' && $char <= 'z') {
            $mensagemCriptografada .= chr((ord($char) - ord('a') + $numeroAvanco) % 26 + ord('a'));
        } else {
            $mensagemCriptografada .= $char;
        }
        //basicamente neste for ele transofra a letra em numero, no qual a = 65, b = 66... então ele pega o randi, vê qual é a letra, pega o valor numerico da frase e então soma com o do randi, depois ele pede a diferença de 26 por conta de que se passar ele loopa de volta.
        // comentario pra vc prof:).
        
    }
    echo "Avanço sorteado: $numeroAvanco posições.<br>";
    echo "Mensagem Criptografada: " . $mensagemCriptografada . "<br><br>";

    return [
        'texto' => $mensagemCriptografada,
        'avanco' => $numeroAvanco
    ];
}
function descriptografarMensagem($texto, $numeroAvanco){
    $mensagemDescriptografada = ""; 

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if ($char >= 'A' && $char <= 'Z') {
            $mensagemDescriptografada .= chr((ord($char) - ord('A') - $numeroAvanco + 26) % 26 + ord('A'));
        } elseif ($char >= 'a' && $char <= 'z') {
            $mensagemDescriptografada .= chr((ord($char) - ord('a') - $numeroAvanco + 26) % 26 + ord('a'));
        } else {
            $mensagemDescriptografada .= $char;
        }
    }

    echo "Mensagem Descriptografada: " . $mensagemDescriptografada . "<br>";
}
$frase = "AAAAAaaaAAAA";
$resultado = criptografarMensagem($frase);
descriptografarMensagem($resultado['texto'], $resultado['avanco']);
?>