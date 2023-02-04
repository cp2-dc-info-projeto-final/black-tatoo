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
    <link rel="stylesheet" type="text/css" href="css/index.css">
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
    echo '<h1>Ben vindo, usuario</h1>';
    echo '<h3>Usuario: '.$_SESSION["nome"].'</h3>';
    echo '<a href="editar.php">Editar dados</a>';
    echo '<a href="logout.php?cod_cliente='.$_SESSION["codigo"].'">sair</a>';
if ($_SESSION['permissao'] == 1) {
    echo '<center><br><br><a class="btm" href="lista.php">Listar usuarios</a></center>';
}
    ?>
</body>
</html>