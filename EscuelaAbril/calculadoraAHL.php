<?php

$peso = $_POST["peso"];
$altura = $_POST["altura"];

// Fórmula del IMC
$imc = $peso / ($altura * $altura);

echo "<h1>Resultado del IMC</h1>";

echo "Peso: " . $peso . " kg<br>";
echo "Altura: " . $altura . " metros<br>";
echo "IMC: " . number_format($imc, 2) . "<br><br>";

if ($imc < 18.5) {
    echo "Diagnóstico: Bajo peso";
} elseif ($imc < 25) {
    echo "Diagnóstico: Peso normal";
} elseif ($imc < 30) {
    echo "Diagnóstico: Sobrepeso";
} else {
    echo "Diagnóstico: Obesidad";
}

?>