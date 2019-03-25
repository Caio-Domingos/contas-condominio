<?php
try {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once('lib/funcoes.php');

    $data = listarValores();

    echo json_encode($data);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage(); 
}
// Includes


