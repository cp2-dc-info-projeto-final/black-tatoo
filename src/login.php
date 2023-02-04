<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Tela de login</title>

</head>
<body>
    <a href="index.php"class="btm">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="login2.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            <a href="recuperasenha.php">Esqueceu a senha?</a>
        </form>
    </div>
</body>
</html>