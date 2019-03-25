<?php
try {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once('lib/conn.php');

    $dateInclusao = $_POST['dateInclusao'];
    $cemig = $_POST['cemig'];
    $copasa = $_POST['copasa'];
    $tarifa = $_POST['tarifa'];
    $limpeza = $_POST['limpeza'];
    $outros = $_POST['outros'];
    $qtdMoradores = $_POST['qtdMoradores'];

    $pdo = conexaoBanco();

    $prep = $pdo->prepare('INSERT INTO `condominio`(`dateInclusao`, `cemig`, `copasa`, `tarifa`, `limpeza`, `outros`, `qtdMoradores`) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $prep->bindParam(1, $dateInclusao);
    $prep->bindParam(2, $cemig);
    $prep->bindParam(3, $copasa);
    $prep->bindParam(4, $tarifa);
    $prep->bindParam(5, $limpeza);
    $prep->bindParam(6, $outros);
    $prep->bindParam(7, $qtdMoradores);

    $prep->execute();

    echo $prep->rowCount() > 0 ? true : false;

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage(); 
}
// Includes


