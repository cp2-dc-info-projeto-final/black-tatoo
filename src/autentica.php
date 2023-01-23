<?php
     session_start();
     if(isset($_SESSION["email"])){
     $email = $_SESSION["email"];
}
     session_start();
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
    $sql = "SELECT * FROM administrador WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

     //testa se não encontrou o e-mail
     if(mysqli_num_rows($res) != 1){
        echo "voce não fez login";
        echo "<p><a href='login.html'>Página de login</a></p>";
    }
    else{
        $adminnistrador = mysqli_fetch_array($res);
        // testa se a senha está errada 

        if($senha != $adminnistrador["senha"]){
            echo "voce não fez login";
            echo "<p><a href='login.php'>Página de login</a></p>";
        }
        else{
            // Abre a sessão e registra as variáveis do login
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            // direciona para a página inicial
            header("Location: form_extra.php");
        }
    }
    $sql = "SELECT * FROM funcionario WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

     //testa se não encontrou o e-mail
     if(mysqli_num_rows($res) != 1){
        echo "voce não fez login";
        echo "<p><a href='login.html'>Página de login</a></p>";
    }
    else{
        $funcionario = mysqli_fetch_array($res);
        // testa se a senha está errada 

        if($senha != $funcionario["senha"]){
            echo "voce não fez login";
            echo "<p><a href='login.php'>Página de login</a></p>";
        }
        else{
            // Abre a sessão e registra as variáveis do login
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            // direciona para a página inicial
            header("Location: funcionario.php");
        }
    }


    
    $sql = "SELECT * FROM cliente WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);
    

    //testa se não encontrou o e-mail
    if(mysqli_num_rows($res) != 1){
        echo "E-mail inválido!";
        echo "<p><a href='login.html'>Página de login</a></p>";
    }
    else{
        $cliente = mysqli_fetch_array($res);
        // testa se a senha está errada 

        if($senha != $cliente["senha"]){
            echo "Senha inválida!";
            echo "<p><a href='login.php'>Página de login</a></p>";
        }
        else{
            // Abre a sessão e registra as variáveis do login
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            // direciona para a página inicial
            header ("location: perfil.php");
        }
        mysqli_close($mysqli);
    }
}
    
?>