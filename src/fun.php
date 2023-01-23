<!DOCTYPE html>
<html lang="en">
<head>
    <?php
include "conexao.php";
$email = $_SESSION['email'];
$sql = "SELECT * FROM funcionario WHERE email = '$email'";
$res = mysqli_query($mysqli, $sql);
$funcionario = mysqli_fetch_array($res);
$cod = $funcionario['cod_cliente'];
    $user = $funcionario['nome'];
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Document</title>
</head>
<body>
<?php include "header.php";
    echo '<h1>cliente</h1>';
    echo '<h3>Usuario:'.$user.'</h3>';
    echo '<a href="altera.php">Editar dados</a>';
    echo '<a href="logout.php?cod_cliente='.$cod.'">sair</a>';
    ?>
</body>
</html>