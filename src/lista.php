<?php 
     include "autentica.php";
?>
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
    ?> 
    <div class="tm">
        <?php
            include "conexao.php";
            $id = 1;
            $sql ="SELECT * FROM cliente;";
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);
            echo "<table><th colspan='2'>clientes</th>";
            for ($i = 0; $i < $linhas; $i++) {
                $usuario = mysqli_fetch_array($res);

                echo "<tr><th>Username: </th><td>" . $usuario["usuario"] . "</td></tr>";
                echo "<tr><th>Nome: </th><td>" . $usuario["nome"] . "</td></tr>";
                echo "<tr><th>Idade: </th><td>" . $usuario["data_nasc"] . "</td></tr>";
                echo "<tr><th>Email: </th><td>" . $usuario["email"] . "</td></tr>";
                echo "<tr><th>Permissão: </th><td> 0</td></tr>";
                echo "<tr><th> </th></tr>";
                echo "<tr><th><a href='editar.php?id=".$usuario["cod_cliente"]."&permiss=".$usuario["permissao"]."'>editar</a></th></tr>";
                }
                $sql ="SELECT * FROM funcionario;";
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                echo "----------------------------------";
                echo "<table><th colspan='2'>Funcionarios</th><tr></tr>";
                echo "";
                for ($i = 0; $i < $linhas; $i++) {
                    $usuario = mysqli_fetch_array($res);
                    echo "<tr><th>Nome: </th><td>" . $usuario["nome"] . "</td></tr>";
                    echo "<tr><th>Idade: </th><td>" . $usuario["data_nasc"] . "</td></tr>";
                    echo "<tr><th>Email: </th><td>" . $usuario["email"] . "</td></tr>";
                    echo "<tr><th>Permissão: </th><td> 2</td></tr>";
                    echo "<tr><th> </th></tr>";
                    echo "<tr><th><a href='editar.php?id=".$usuario["cod_func"]."&permiss=".$usuario["permissao"]."'>editar</a></th></tr>";
                }
                $sql ="SELECT * FROM administrador;";
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                echo "----------------------------------";
                echo "<table><th colspan='2'>administradores</th><tr></tr>";
                echo "----------------------------------";
                echo "";
                for ($i = 0; $i < $linhas; $i++) {
                    $usuario = mysqli_fetch_array($res);
                    echo "<tr><th>Nome: </th><td>" . $usuario["nome"] . "</td></tr>";
                    echo "<tr><th>Idade: </th><td>" . $usuario["data_nasc"] . "</td></tr>";
                    echo "<tr><th>Email: </th><td>" . $usuario["email"] . "</td></tr>";
                    echo "<tr><th>Permissão: </th><td> 1</td></tr>";
                    echo "<tr><th> </th></tr>";
                    echo "<tr><th><a href='editar.php?id=".$usuario["cod_admin"]."&permiss=".$usuario["permissao"]."'>editar</a></th></tr>";
                }
        ?>
    </div>

</body>
</html>
