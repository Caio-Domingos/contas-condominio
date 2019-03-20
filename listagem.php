<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listagem</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h3>Listagem de contas</h3>

    <table style="width:100%">
    <tr>
        <th>Data de inclusão</th>
        <th>Cemig</th> 
        <th>Copasa</th>
        <th>Tarifa</th>
        <th>Limpeza</th>
        <th>Outros</th>
        <th>Quant. Moradores</th>
    </tr>
    
    <?php 

        include_once('conn.php');

        $pdo = conexaoBanco();

        $consulta = $pdo->query("SELECT * FROM condominio;");

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td><?= $linha['dateInclusao'] ?></td>
                <td><?= $linha['cemig'] ?></td>
                <td><?= $linha['copasa'] ?></td>
                <td><?= $linha['tarifa'] ?></td>
                <td><?= $linha['limpeza'] ?></td>
                <td><?= $linha['outros'] ?></td>
                <td><?= $linha['qtdMoradores'] ?></td>
            </tr>

        <?php
        }

    ?>
    </table>
    <a href="http://localhost/Projeto-Web-PHP/index.php">Voltar</a>

</body>
</html>