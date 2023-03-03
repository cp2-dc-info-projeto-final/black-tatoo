<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Black-Tatoo</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <?php
            include "autentica.php";
            include "header.php";
            include "conexao.php";
        ?> 
            <div class="for">
            <h1>
            <?php 
            if (isset($_GET["id"])){
                $id = $_GET["id"];
                $permiss = $_GET["permiss"];

                if ($permiss == 0) {
                    $sql = "SELECT * FROM cliente WHERE cod_cliente LIKE '%$id%';";
                    $res = mysqli_query($mysqli, $sql);
                    $linhas = mysqli_num_rows($res);
                    for ($i = 0; $i < $linhas; $i++) {
                        $usuario = mysqli_fetch_array($res);
                        $a = $usuario["usuario"];
                        $b = $usuario["nome"];
                        $c = $usuario["email"];
                        $d = $usuario["data_nasc"];
                        $e = $usuario["cod_cliente"];
                        $x = $usuario["permissao"];
                        $senhaa = $usuario["senha"];

                    }
                    echo "<form action='pagina_extra.php' method='POST'> 
                    <input type='hidden' name='operacao' value='editar'>
                    <input type='hidden' name='cod_cliente' value='".$e."'>
                    <input type='hidden' name='permissA' value='".$x."'>
                    <input type='hidden' name='senhaa' value='".$senhaa."'>
                    <p>Permissao: <input type='text' name='permissao' value='".$x."'>
                    <p>Apelido: <input type='text' name='apelido' value='".$a."'></p>
                    <p>Nome: <input type='text' name='nome' value='".$b."'></p>
                    <p>E-mail: <input type='text' name='email' value='".$c."'></p>
                    <p>Data de Nascimento: <input type='date' name='data_nasc' value='".$d."'></p>         
                    <p><input type='submit' value='Enviar'>
                    </form>
                    <a href='perfil.php'><input type='submit' value='voltar'></a></p> 
                    </h1>";
                }
                if ($permiss == 1) {
                    $sql = "SELECT * FROM administrador WHERE cod_admin LIKE '%$id%';";
                    $res = mysqli_query($mysqli, $sql);
                    $linhas = mysqli_num_rows($res);
                    for ($i = 0; $i < $linhas; $i++) {
                        $usuario = mysqli_fetch_array($res);
                        $a = $usuario["cod_admin"];
                        $b = $usuario["nome"];
                        $c = $usuario["email"];
                        $d = $usuario["data_nasc"];
                        $x = $usuario["permissao"];
                        $senhaa = $usuario["senha"];

                    }
                    echo "
                    <form action='pagina_extra.php' method='POST'> 
                    <input type='hidden' name='operacao' value='editar'>
                    <input type='hidden' name='cod_admin' value='".$a."'>
                    <input type='hidden' name='permissA' value='".$x."'>
                    <input type='hidden' name='senhaa' value='".$senhaa."'>
                    <p>Permissao: <input type='text' name='permissao' value='".$x."'>
                    <p>Nome: <input type='text' name='nome' value='".$b."'></p>
                    <p>E-mail: <input type='text' name='email' value='".$c."'></p>
                    <p>Data de Nascimento: <input type='date' name='data_nasc' value='".$d."'></p>         
                    <p><input type='submit' value='Enviar'>
                </form>
                <a href='perfil.php'><input type='submit' value='voltar'></a></p> 
                </h1>";
                }
                if ($permiss == 2) {
                    $sql = "SELECT * FROM funcionario WHERE cod_func LIKE '%$id%';";
                    $res = mysqli_query($mysqli, $sql);
                    $linhas = mysqli_num_rows($res);
                    for ($i = 0; $i < $linhas; $i++) {
                        $usuario = mysqli_fetch_array($res);
                        $a = $usuario["apelido"];
                        $b = $usuario["nome"];
                        $c = $usuario["email"];
                        $d = $usuario["data_nasc"];
                        $e = $usuario["cpf"];
                        $f = $usuario["tel"];
                        $g = $usuario["cod_func"];
                        $x = $usuario["permissao"];
                        $senhaa = $usuario["senha"];

                    }
                    echo "
                    <form action='pagina_extra.php' method='POST'> 
                    <input type='hidden' name='operacao' value='editar'>
                    <input type='hidden' name='cod_func' value='".$g."'>
                    <input type='hidden' name='permissA' value='".$x."'>
                    <input type='hidden' name='senhaa' value='".$senhaa."'>
                    <p>Permissao: <input type='text' name='permissao' value='".$x."'>
                    <p>Apelido: <input type='text' name='apelido' value='".$a."'></p>
                    <p>Nome: <input type='text' name='nome' value='".$b."'></p>
                    <p>CPF: <input type='text' name='cpf' value='".$e."'></p>
                    <p>tel: <input type='text' name='numero' value='".$f."'></p>
                    <p>E-mail: <input type='text' name='email' value='".$c."'></p>
                    <p>Data de Nascimento: <input type='date' name='data_nasc' value='".$d."'></p>         
                    <p><input type='submit' value='Enviar'>
                </form>
                <a href='perfil.php'><input type='submit' value='voltar'></a> 
                </h1>";
                }
            }
            else{
                $permiss = $_SESSION['permissao'];
                $id = $_SESSION["codigo"];
                if ($permiss == 0) {
                    $sql = "SELECT * FROM cliente WHERE cod_cliente LIKE '%$id%';";
                    $res = mysqli_query($mysqli, $sql);
                    $linhas = mysqli_num_rows($res);
                    for ($i = 0; $i < $linhas; $i++) {
                        $usuario = mysqli_fetch_array($res);
                        $a = $usuario["usuario"];
                        $b = $usuario["nome"];
                        $c = $usuario["email"];
                        $d = $usuario["data_nasc"];
                        $e = $usuario["cod_cliente"];
                        $x = $usuario["permissao"];
                        $senhaa = $usuario["senha"];

                    }
                    
                    echo "<form action='pagina_extra.php' method='POST'> 
                    <input type='hidden' name='operacao' value='editar'>
                    <input type='hidden' name='cod_cliente' value='".$e."'>
                    <input type='hidden' name='permissA' value='".$x."'>
                    <input type='hidden' name='senhaa' value='".$senhaa."'>
                    <p>Usuario: <input type='text' name='apelido' value='".$a."'></p>
                    <p>Nome: <input type='text' name='nome' value='".$b."'></p>
                    <p>E-mail: <input type='text' name='email' value='".$c."'></p>
                    <p>Data de Nascimento: <input type='date' name='data_nasc' value='".$d."'></p>         
                    <p><input type='submit' value='Enviar'>
                    </form>
                    <a href='perfil.php'><input type='submit' value='voltar'></a></p> 
                    </h1>";

                    echo "<form action='pagina_extra.php'  method='POST'> 
                    <input type='hidden' name='operacao' value='excluir'>
                    <input type='hidden' name='cod_cliente' value='".$e."'>
                    </form>";

                    }

                if ($permiss == 1) {
                    $sql = "SELECT * FROM administrador WHERE cod_admin LIKE '%$id%';";
                    $res = mysqli_query($mysqli, $sql);
                    $linhas = mysqli_num_rows($res);
                    for ($i = 0; $i < $linhas; $i++) {
                        $usuario = mysqli_fetch_array($res);
                        $a = $usuario["cod_admin"];
                        $b = $usuario["nome"];
                        $c = $usuario["email"];
                        $d = $usuario["data_nasc"];
                        $x = $usuario["permissao"];
                        $senhaa = $usuario["senha"];


                    }
                    echo "
                    <form action='pagina_extra.php' method='POST'> 
                    <input type='hidden' name='operacao' value='editar'>
                    <input type='hidden' name='cod_admin' value='".$a."'>
                    <input type='hidden' name='permissA' value='".$x."'>
                    <input type='hidden' name='senhaa' value='".$senhaa."'>
                    <p>Permissao: <input type='text' name='permissao' value='".$x."'>
                    <p>Nome: <input type='text' name='nome' value='".$b."'></p>
                    <p>E-mail: <input type='text' name='email' value='".$c."'></p>
                    <p>Data de Nascimento: <input type='date' name='data_nasc' value='".$d."'></p>         
                    <p><input type='submit' value='Enviar'>
                </form>
                <a href='perfil.php'><input type='submit' value='voltar'></a></p> 
                </h1>";
                }
                if ($permiss == 2) {
                    $sql = "SELECT * FROM funcionario WHERE cod_func LIKE '%$id%';";
                    $res = mysqli_query($mysqli, $sql);
                    $linhas = mysqli_num_rows($res);
                    for ($i = 0; $i < $linhas; $i++) {
                        $usuario = mysqli_fetch_array($res);
                        $a = $usuario["apelido"];
                        $b = $usuario["nome"];
                        $c = $usuario["email"];
                        $d = $usuario["data_nasc"];
                        $e = $usuario["cpf"];
                        $f = $usuario["tel"];
                        $g = $usuario["cod_func"];
                        $x = $usuario["permissao"];
                        $senhaa = $usuario["senha"];

                    }
                    echo "
                    <form action='pagina_extra.php' method='POST'> 
                    <input type='hidden' name='operacao' value='editar'>
                    <input type='hidden' name='cod_func' value='".$g."'>
                    <input type='hidden' name='permissA' value='".$x."'>
                    <input type='hidden' name='senhaa' value='".$senhaa."'>
                    <p>Apelido: <input type='text' name='apelido' value='".$a."'></p>
                    <p>Nome: <input type='text' name='nome' value='".$b."'></p>
                    <p>CPF: <input type='text' name='cpf' value='".$e."'></p>
                    <p>tel: <input type='text' name='numero' value='".$f."'></p>
                    <p>E-mail: <input type='text' name='email' value='".$c."'></p>
                    <p>Data de Nascimento: <input type='date' name='data_nasc' value='".$d."'></p>         
                    <p><input type='submit' value='Enviar'>
                </form>
                <a href='perfil.php'><input type='submit' value='voltar'></a></p> 
                </h1>";

               
                
                
                
               
            }
            ?>

            <form action='pagina_extra.php' onSubmit="if(!confirm('Deseja mesmo excluir o perfil?')){return false;}" method='POST'> 
                <input type='hidden' name='operacao' value='excluir'>
                <input type='hidden' name='cod' value="<?php echo $id?>">
                <input type='hidden' name='permiss' value="<?php echo $permiss?>">
                <input type='submit' value='Excluir'> 
                </form> 
                <?php
                 
            } ?>
            </h1>
        </div>
    </body>
</html>
