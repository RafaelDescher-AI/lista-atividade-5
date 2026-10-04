 <?php
function ordenarNomes($nomes){
    $vetor = explode(',', $nomes);
    $vetor = array_map('trim', $vetor);
    $vetor = array_filter($vetor);
    natcasesort($vetor);


return implode('<br> ', $vetor);
}

echo ordenarNomes("rafael,julia,antonio,ribeiro");
?>
