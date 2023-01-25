<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black-Tatoo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <?php include "header.php";
    include "conexao.php";
    $sql ="SELECT * FROM cliente;";
    $res = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($res);
    echo "<table><th>clientes</th>";
    for ($i = 0; $i < $linhas; $i++) {
        $usuario = mysqli_fetch_array($res);

        echo "<Username: " . $usuario["usuario"] . "<br>";
        echo "Nome: " . $usuario["nome"] . "<br>";
        echo "Idade: " . $usuario["data_nasc"] . "<br>";
        echo "Email: " . $usuario["email"] . "<br>";
        echo "---------------------------------<br>";
    }
    ?>
</body>
</html>