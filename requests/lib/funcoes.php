<?php

include 'conn.php';
include __DIR__.'/../models/condominio.php';

function listarValores() {
    $pdo = conexaoBanco();

    $consulta = $pdo->query("SELECT * FROM condominio;");
    
    // Criando um array de objetos
    $array_objetos = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $classe = new Condominio(
            $linha['dateInclusao'],
            $linha['cemig'],
            $linha['copasa'],
            $linha['tarifa'],
            $linha['limpeza'],
            $linha['outros'],
            $linha['qtdMoradores']);

        array_push($array_objetos, $classe);
    }

    return $array_objetos;
}

function pegarMaiorOuMenorValor($param, $prop) {
    $pdo = conexaoBanco();

    $consulta;
    
    if ($param == 'max') {
       $consulta = $pdo->query("SELECT * FROM condominio WHERE $prop = (SELECT MAX($prop) FROM condominio)");
    } else {
        $consulta = $pdo->query("SELECT * FROM condominio WHERE $prop = (SELECT MIN($prop) FROM condominio)");
    }

    $classe;
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $classe = new Condominio(
            $linha['dateInclusao'],
            $linha['cemig'],
            $linha['copasa'],
            $linha['tarifa'],
            $linha['limpeza'],
            $linha['outros'],
            $linha['qtdMoradores']);
    }

    return $classe;
}
