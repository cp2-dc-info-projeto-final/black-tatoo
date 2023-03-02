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
            color:black;
        }
        .container{
            background-color: rgb(225, 225, 225, 0.9);
            width: 100%;
            height: 50%;
            border-radius: 15px;
            margin-top:5px;
            border:1px solid #000;
        }
    </style>
</head>
<body>
<?php include "header.php";
include "conexao.php";
?>
<div class="container">
    <div class="item">
<?php $cod = $_SESSION['codigo'];
    echo '<br><br><br><center><h1>Olá, Usuario</h1>';
    echo '<h3>Usuario: '.$_SESSION["nome"].'</h3><br>';
    echo '<a href="editar.php" class="btm">Editar dados</a>';
    echo '  <a class="btm" href="logout.php?cod_cliente='.$_SESSION["codigo"].'">sair</a></center>';
if ($_SESSION['permissao'] == 1) {
    echo '<center><br><br><a class="btm" href="lista.php">Listar usuarios</a></center>';
}
if ($_SESSION['permissao'] == 2) {
    echo '<center><br><br><a class="btm" href="addtatto.php">Adicionar tatuagens</a></center>';
}
    ?>
    </div>
    <div class="item">
        <?php
            $sql ="SELECT * FROM agendamento WHERE cod_cliente LIKE '$cod';";
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);
            if($linhas < 1 ){
                echo "<br><br>
                <center><h3>Nenhuma tatuagem agendada</h3></center>";
                exit;
            } else {
            echo "<br><br>
                <center></center>";
            for ($i = 0; $i < $linhas; $i++) {
                $usuario = mysqli_fetch_array($res);
                echo 'Dia: '.$usuario["data_agenda"].'<br>';
                echo 'Tipo: ' .$usuario["estilo_valor"].'<br>';
                if($_SESSION['permissao'] != 0){
                    echo 'Cliente: ' . $usuario['nome_cliente'].'<br>';
                }
                else{
                    echo 'Autor: ' . $usuario['autor'].'<br>';
                }
             }  
            }    
               
        ?>
    </div>
</div>
</body>
</html>
