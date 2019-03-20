<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

include_once('conn.php');

// Conexao no banco
$pdo = conexaoBanco();

// Pegando valores do POST
if(isset($_POST['data']))
$data = $_POST['data'];
else
$data = 0;

if(isset($_POST['cemig']))
$cemig = $_POST['cemig'];
else
$cemig = 0;

if(isset($_POST['copasa']))
$copasa = $_POST['copasa'];
else
$copasa = 0;


if(isset($_POST['limpeza']))
$limpeza = $_POST['limpeza'];
else
$limpeza = 0;


if(isset($_POST['tarifa']))
$tarifa = $_POST['tarifa'];
else
$tarifa = 0;

if(isset($_POST['outros']))
$outros = $_POST['outros'];
else
$outros = 0;

if(isset($_POST['quantidadeMoradores']))
$quantidadeMoradores = $_POST['quantidadeMoradores'];
else
$quantidadeMoradores = 0;
// Fim dos valores do post

// Realizando inserção
$prep = $pdo->prepare('INSERT INTO condominio ( dateInclusao, cemig, copasa, tarifa, limpeza, outros, qtdMoradores) 
    VALUES(:dateInclusao, :cemig, :copasa, :tarifa, :limpeza, :outros, :qtdMoradores)');
$prep->execute(array(
    ':dateInclusao' => $data,
    ':cemig' => $cemig,
    ':copasa' => $copasa,
    ':tarifa' => $tarifa,
    ':limpeza' => $limpeza,
    ':outros' => $outros,
    ':qtdMoradores' => $quantidadeMoradores,
));

// Mandando o resultado do banco
$resultado = $prep->rowCount();

header("Location: resultado.php?resultado=".$resultado);
?>