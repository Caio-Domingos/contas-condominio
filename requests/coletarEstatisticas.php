<?php

include_once 'lib/funcoes.php';

$copasaMax = pegarMaiorOuMenorValor('max', 'copasa');
$cemigMax = pegarMaiorOuMenorValor('max', 'cemig');
$copasaMin = pegarMaiorOuMenorValor('min', 'copasa');
$cemigMin = pegarMaiorOuMenorValor('min', 'cemig');

$lista = listarValores();

$valorTotal;
$valorPorMorador;

foreach ($lista as &$val) {
    $valorTotal += $val->resultado;
    $valorPorMorador += $val->resultadoPorMoradores;
}

$valorTotal = $valorTotal / count($lista);
$valorPorMorador = $valorPorMorador / count($lista);


$array = [$copasaMax, $copasaMin, $cemigMax, $cemigMin, $valorTotal, $valorPorMorador];

echo json_encode($array);