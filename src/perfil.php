<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "autentica.php";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/indexx.css">
    <title>Perfil</title>
    <style>
        body{
            background-color: white;
            background-image: none;
            color:black;
        }
    </style>
</head>
<body>
<?php include "header.php";
    echo '<br><br><br><center><h1>cliente</h1>';
    echo '<h3>Usuario: '.$_SESSION["nome"].'</h3><br>';
    echo '<a href="altera.php" class="btm">Editar dados</a>';
    echo '  <a class="btm" href="logout.php?cod_cliente='.$_SESSION["codigo"].'">sair</a></center>';
if ($_SESSION['permissao'] == 1) {
    echo '<center><br><br><a class="btm" href="lista.php">Listar usuarios</a></center>';
}
    ?>
</body>
</html>