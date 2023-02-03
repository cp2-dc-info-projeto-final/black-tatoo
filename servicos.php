<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>lista de serviços</h1>
    <?php
    include 'conexao.php';
    $sql = "SELECT * FROM servicos;"; 
    $res = mysqli_query($mysqli,$sql);
    $linhas = mysqli_num_rows($res);
    for($i = 0; $i < $linhas; $i++){
        $servico = mysqli_fetch_array($res);
        echo "Nome: ".$servico["nome"]."<br>";
        echo "Preco: ".$servico["preco"]."<br>";
    }
    ?>
</body>
</html>