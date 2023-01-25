<?php
    session_start();
    if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    }
    if(isset($_SESSION["senha"])){
    $senha = $_SESSION["senha"];
    }
    if(empty($email) or empty($senha)){
    echo"você não fez login!";
    echo "<p><a href='login.php'>Pagina de login</a>";
    exit;
    }

    else{
        include "conexao.php";

            if ($_SESSION["permissao"] == 1) {

                $sql = "SELECT * FROM administrador WHERE email = '$email';";
                $res = mysqli_query($mysqli, $sql);

                //testa se não encontrou o e-mail
                if (mysqli_num_rows($res) != 1) {
                    unset($_SESSION["email"]);
                    unset($_SESSION["senha"]);
                    echo "voce não fez login";
                    echo "<p><a href='login.html'>Página de login</a></p>";
                }
            } 
            elseif ($_SESSION["permissao"] == 2) {
                $sql = "SELECT * FROM funcionario WHERE email = '$email';";
                $res = mysqli_query($mysqli, $sql);

                //testa se não encontrou o e-mail
                if (mysqli_num_rows($res) != 1) {
                    unset($_SESSION["email"]);
                    unset($_SESSION["senha"]);
                    echo "voce não fez login";
                    echo "<p><a href='login.html'>Página de login</a></p>";
                }
            }
            elseif ($_SESSION["permissao"] == 0) {
                $sql = "SELECT * FROM cliente WHERE email = '$email';";
                $res = mysqli_query($mysqli, $sql);
                
                //testa se não encontrou o e-mail
                if(mysqli_num_rows($res) != 1){
                    unset($_SESSION["email"]);
                    unset($_SESSION["senha"]);
                    echo "E-mail inválido!";
                    echo "<p><a href='login.html'>Página de login</a></p>";
                } 
            }
    mysqli_close($mysqli);
    }
?>