<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black-Tatoo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
        .tm{
            width: 45%;
        }
    </style>
</head>
<body>
    <?php
    include "autentica.php"; 
    include "header.php";
    include "conexao.php";
    ?> 
    <div class="container">
        <div class=tm>
            <legend>Tatuagens</legend>
            <?php 
            $sql = "SELECT * FROM tatuagem;"; 
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);
            for($i = 0; $i < $linhas; $i++){
            $cliente = mysqli_fetch_array($res);
                echo 'Tatuador: ' .$cliente['autor'];
                echo '<br>';
                echo 'Estilo: ' .$cliente['estilo'];
                echo '<br>';
                echo 'Modelo de tatuagem: ' .$cliente['link'];
                echo '<br>';
                echo 'R$'.$cliente['preco'];
                echo '<br>';
                echo '-------- ---- -------- ---';
                echo '<br>';
            }
            ?>
        </div>
    </div>
</body>
</html>
