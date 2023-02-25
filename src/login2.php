<?php 
     include "autentica.php";
?>
<?php
    // Recebe os campos do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Realiza a consulta no banco de dados
    include "conexao.php";
    $sql = "SELECT * FROM administrador WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($res) >= 1){
        $adminnistrador = mysqli_fetch_array($res);
        // testa se a senha está errada 
        if(!password_verify($senha, $adminnistrador['senha'])){
            echo "Senha de adiministrador não encontrada!";
            echo "<p><a href='login.php'>Página de login</a></p>";
        exit;
        }
        else{
            // Abre a sessão e registra as variáveis do login
            session_start();
            $nome = $adminnistrador['nome'];
            $codigo = $adminnistrador['cod_admin'];
            $_SESSION["codigo"] = $codigo;
            $_SESSION["nome"] = $nome;
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            $_SESSION["permissao"] = $adminnistrador['permissao'];
            // direciona para a página inicial
            header("Location: perfil.php");
        }
    }
    else{
        $adm = 0;
    }
    $sql = "SELECT * FROM funcionario WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($res) >= 1){
        $funcionario = mysqli_fetch_array($res);
        // testa se a senha está errada 
        if(!password_verify($senha, $funcionario['senha'])){
            echo "Senha de funcionario não encontrada!";
            echo "<p><a href='login.php'>Página de login</a></p>";
        exit;
        }
        else{
            // Abre a sessão e registra as variáveis do login
            session_start();
            $nome = $funcionario['nome'];
            $codigo = $funcionario['cod_func'];
            $_SESSION["codigo"] = $codigo;
            $_SESSION["apelido"] = $apelido;
            $_SESSION["nome"] = $nome;
            $_SESSION["senha"] = $senha;
            $_SESSION["cpf"] = $cpf;
            $_SESSION["telefone"] = $telefone;
            $_SESSION["email"] = $email;
            $_SESSION["permissao"] = $funcionario['permissao'];
            // direciona para a página inicial
            header("Location: perfil.php");
        }        
    }
    else{
        $adm = 1;
    }
    $sql = "SELECT * FROM cliente WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($res) >= 1){
        $cliente = mysqli_fetch_array($res);
        // testa se a senha está errada 

        if(!password_verify($senha, $cliente['senha']))
        {
            echo "Senha do cliente não encontrada!";
            echo "<p><a href='login.php'>Página de login</a></p>";
        exit;
        }
        else{
            // Abre a sessão e registra as variáveis do login
            session_start();
            $nome = $cliente['usuario'];
            $codigo = $cliente['cod_cliente'];
            $_SESSION["codigo"] = $codigo;
            $_SESSION["nome"] = $nome;
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;
            $_SESSION["permissao"] = $cliente['permissao'];
            // direciona para a página inicial
            header("Location: perfil.php");
        }
    }
    else{
        $adm = 2;
    }
    if ($adm == 2){
        echo "Não encontramos o email digitado :(";
        echo "<p><a href='login.php'>Página de login</a></p>";
    }
?>
