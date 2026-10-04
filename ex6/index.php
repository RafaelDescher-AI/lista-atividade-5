<?php
function converterTemperatura($temp, $escala){
    

    if ($escala == "Graus"){
        $graus = $temp;
        $kelvin = $temp + 273.15;
        $farenheit = $temp * 1.8 + 32;
        echo "Está na escala de graus Celsius, e tem ", $graus;
        echo "<br>Ja nas escalas de fareinheit e kelvin, fica assim <br>", $farenheit, "<br> ", $kelvin;
        }
        if ($escala == "Farenheit"){
            $farenheit = $temp;
            $kelvin = ($temp - 32) * 5 / 9 + 273.15;
            $graus = ($temp - 32) * 5 / 9; 
            echo "Está na escala de Farenheit, e tem ", $farenheit;
            echo "<br>Ja nas escalas de Celcius e Kelvin, fica assim <br>", $graus, "<br> ", $kelvin;
        }
        if ($escala == "Kelvin"){
            $kelvin = $temp;
            $graus = $temp - 273.15;
            $farenheit = ($temp - 273.15) * 9 / 5 + 32; 
            echo "Está na escala de kelvin, e tem ", $kelvin;
            echo "<br>Ja nas escalas de Celcius e Farenheit, fica assim <br>", $graus, "<br> ", $farenheit;
        }
}

converterTemperatura(200, "Kelvin");
?>