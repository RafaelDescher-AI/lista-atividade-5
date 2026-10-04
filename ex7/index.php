 <?php
function calcularDesconto($valor){
    if($valor <= 99.99){}
    if($valor <= 499.99){
    $valor = $valor * .90;}
    if ($valor <= 999.99){
    $valor = $valor * .80;}
    if ($valor >= 1000){
    $valor = $valor * .70;}
        
echo $valor;
}
calcularDesconto(2000.00);
?>