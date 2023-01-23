<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "conexao.php";
        session_start();
        $email = $_SESSION["email"];
        $sql = "SELECT * FROM cliente WHERE email = '$email'";
        $res = mysqli_query($mysqli, $sql);
        $cliente = mysqli_fetch_array($res);
        $cod = $cliente['cod_cliente'];
        $user = $cliente['nome'];
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Perfil</title>
</head>
<body>
<?php include "header.php";
    echo '<h1>cliente</h1>';
    echo '<h3>Usuario: '.$user.'</h3>';
    echo '<a href="altera.php">Editar dados</a>';
    echo '<a href="logout.php?cod_cliente='.$cod.'">sair</a>';
if ($_SESSION['permissao'] == 1) {
    echo '<a href="lista.php">Listar usuarios</a>';
}
    ?>
</body>
</html>