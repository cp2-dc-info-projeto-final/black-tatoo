<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Recupera Senha</title>
</head>
<body>
<div>
        <h1>Recuperar Senha</h1>
        <form action="recuperasenha.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
           
        </form>
    </div>
</body>
</html>
<?php
include "conexao.php";
include "gerars.php";

if(isset($_POST["email"])){

echo"Entrei no if";

$email = $_POST["email"];
$senha = gerar_senha(10, true, true, false);
$hash = password_hash($senha, PASSWORD_DEFAULT);


$sql = "UPDATE cliente SET senha = '$hash' WHERE email = '$email' ";
mysqli_query($mysqli, $sql);
mysqli_close($mysqli);

include "envia_email.php";
envia_email($email, "Recuperação de senha", "EMAIL ENVIADO");

echo "<a href='index.php'>Início</a>";
}
?>