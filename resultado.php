<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resultado da inserção</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php 
        $resultado = null;
        if (isset($_GET['resultado'])) {
            echo $_GET['resultado'];
            $resultado = $_GET['resultado'] == '1' ? true : false;
        }
    ?>

    <h3>Produto <?php echo $resultado == true 
    ? 'foi cadastrado com sucesso' 
    : 'não pôde ser cadastrado' ?></h3>

    <a href="http://localhost/Projeto-Web-PHP/index.php">Voltar</a>
    <?php
    if ($resultado) {
        echo '<a href="http://localhost/Projeto-Web-PHP/listagem.php">Histórico de dados</a>';
    }
    ?>
</body>
</html>