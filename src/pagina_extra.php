<?php 
        include "conexao.php";
?>
<html>
    <head>
        <title>Dados Cadastrados</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/indexx.css">

    </head>
    <body>

    <?php include "header.php" ?>

        <h1>Dados Cadastrados</h1>
<?php
    $operacao = $_REQUEST["operacao"];

    if($operacao == "inserir"){
        $usuario = $_POST["usuario"]; 
        $nome = $_POST["nome"]; 
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $senha_rep = $_POST["senha_rep"];
        $data_nasc = $_POST["data_nascimento"];
        $permissao = $_POST["permissao"]; 
        $erro = 0;

        

        if(empty($nome) or strstr($nome, ' ') == false){
            echo "Por favor, preencha o nome completo.<br>";
            $erro = 1;
        }

        if(strlen($email) < 10 or strstr($email, '@') == false){
            echo "Por favor, preencha o e-mail corretamente.<br>";
            $erro = 1;
        }

        $sql = "SELECT * FROM cliente WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);

        //testa se já existe o e-mail cadastrado
        if(mysqli_num_rows($res) == 1){
            echo "E-mail já cadastrado. Por favor, digite outro e-mail.<br>";
            $erro = 1;
        }

        if(strlen($senha) < 5 or strlen($senha) > 10){
            echo "Por favor, digite a senha entre 5 e 10 caracteres.<br>";
            $erro = 1;
        }

        if($senha != $senha_rep){
            echo "Por favor, repita a senha corretamente.<br>";
            $erro = 1;
        }

        if(empty($data_nasc)){
            echo "Por favor, preencha a data.<br>";
            $erro = 1;
        }

        
        if($erro == 0){
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO cliente (Usuario,nome,email,senha,data_nasc,permissao)";
            $sql .= "VALUES ('$usuario','$nome','$email','$senha_cript','$data_nasc','$permissao');";

          if (!  mysqli_query($mysqli,$sql) ){
            echo mysqli_error($mysqli);
          }

            echo "Nome: $nome <br>";
            echo "E-mail: $email <br>";
            echo "Data de nascimento: $data_nasc <br>";
            include "envia_email.php";
            envia_email($email, "Criação de Usuário","Bem vindo a BLACK TATOO STUDIO, $nome");            
        }
    }
    else if($operacao == "exibir"){
        $sql = "SELECT * FROM cliente;"; 
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i = 0; $i < $linhas; $i++){
            $cliente = mysqli_fetch_array($res);
            echo "Nome: ".$cliente["nome"]."<br>";
            echo "E-mail: ".$cliente["email"]."<br>";
            echo "Data de nascimento: ".$cliente["data_nasc"]."<br>";
            echo "<a href='altera.php?cod_cliente=".$cliente["cod_cliente"]."'>
            Editar cliente</a><br>";
            echo "<a href='pagina_extra.php?operacao=excluir&cod_cliente=".$cliente["cod_cliente"]."'>
            Excluir cliente</a><br>";
            echo "---------------------<br>";
        }
    }
    else if($operacao == "buscar"){
        $nome = $_POST["nome"];
        $sql = "SELECT * FROM cliente WHERE nome like '%$nome%';"; 
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i = 0; $i < $linhas; $i++){
            $cliente = mysqli_fetch_array($res);
            echo "Nome: ".$cliente["nome"]."<br>";
            echo "E-mail: ".$cliente["email"]."<br>";
            echo "Data de nascimento: ".$cliente["data_nasc"]."<br>";
            echo "---------------------<br>";
        }
    }
    else if($operacao == "editar"){
        $cod_cliente = $_POST["cod_cliente"]; 
        $nome = $_POST["nome"]; 
        $email = $_POST["email"];
        $data_nasc = $_POST["data_nasc"];
       

        $erro = 0;

        if(empty($nome) or strstr($nome, ' ') == false){
            echo "Por favor, preencha o nome completo.<br>";
            $erro = 1;
        }

        if(strlen($email) < 10 or strstr($email, '@') == false){
            echo "Por favor, preencha o e-mail corretamente.<br>";
            $erro = 1;
        }

        if(empty($data_nasc)){
            echo "Por favor, preencha a data.<br>";
            $erro = 1;
        }

        if($erro == 0){
            $sql = "UPDATE cliente SET nome = '$nome', email = '$email', 
            data_nasc = '$data_nasc'";
            $sql .= "WHERE cod_cliente = $cod_cliente;";  
            mysqli_query($mysqli,$sql);

            echo "Cliente atualizado com sucesso!<br>";
            echo "<a href='form_extra.html'>Voltar para o início</a>"; 
        }
    }
    else if($operacao == "excluir"){
        $cod_cliente = $_GET["cod_cliente"];
        $sql = "DELETE FROM cliente WHERE cod_cliente = $cod_cliente;"; 
        mysqli_query($mysqli,$sql);
        echo "Cliente excluído com sucesso!<br>";
        echo "<a href='form_extra.html'>Voltar para o início</a>";
    }
    else if($operacao == "servicos"){
        $nome = $_POST["nome"]; 
        $preco = $_POST["preco"];
        
        $sql = "INSERT INTO servicos (nome,preco) VALUES ('$nome','$preco');";  
        mysqli_query($mysqli,$sql);

            echo '<script type ="text/JavaScript">';  
            echo 'alert("Serviço cadastrado com sucesso")';  
            echo '</script>';
        } else if ($operacao == "inserir_funcionario") {
    $apelido = $_POST["apelido"];
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $senha_rep = $_POST["senha_rep"];
    $cpf = $_POST["CPF"];
    $telefone = $_POST["Telefone"];
    $permissao = $_POST["permissao"];
    $email = $_POST["email"];
    $data_nasc = $_POST["data_nascimento"];
    $erro = 0; {

        if (empty($nome) or strstr($nome, ' ') == false) {
            echo "Por favor, preencha o nome completo.<br>";
            $erro = 1;
        }

        if (strlen($email) < 10 or strstr($email, '@') == false) {
            echo "Por favor, preencha o e-mail corretamente.<br>";
            $erro = 1;
        }

        $sql = "SELECT * FROM funcionario WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);

        //testa se já existe o e-mail cadastrado
        if (mysqli_num_rows($res) == 1) {
            echo "E-mail já cadastrado. Por favor, digite outro e-mail.<br>";
            $erro = 1;
        }

        if (strlen($senha) < 5 or strlen($senha) > 10) {
            echo "Por favor, digite a senha entre 5 e 10 caracteres.<br>";
            $erro = 1;
        }

        if ($senha != $senha_rep) {
            echo "Por favor, repita a senha corretamente.<br>";
            $erro = 1;
        }


        if (strlen($cpf) < 11) {
            echo "Por favor, digite o cpf corretamente.<br>";
            $erro = 1;
        }

        if (empty($data_nasc)) {
            echo "Por favor, preencha a data.<br>";
            $erro = 1;
        }

        if ($erro == 0) {
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO funcionario (apelido,nome,senha, cpf, telefone, email, data_nasc,permissao)";
            $sql .= "VALUES ('$apelido','$nome','$senha_cript', '$cpf', '$telefone', '$email' '$data_nasc','$permissao');";

            if (!mysqli_query($mysqli, $sql)) {
                echo mysqli_error($mysqli);
            }

            echo "Nome: $nome <br>";
            echo "E-mail: $email <br>";
            echo "Data de nascimento: $data_nasc <br>";
            echo "Telefone: $telefone <br>";
            include "envia_email.php";
            envia_email($email, "Criação de Usuário", "Bem vindo a BLACK TATOO STUDIO, $nome");
        }

    }


    if (empty($nome) or strstr($nome, ' ') == false) {
        echo "Por favor, preencha o nome completo.<br>";
        $erro = 1;
    }

    if (strlen($email) < 10 or strstr($email, '@') == false) {
        echo "Por favor, preencha o e-mail corretamente.<br>";
        $erro = 1;
    }

    $sql = "SELECT * FROM funcionario WHERE email = '$email';";
    $res = mysqli_query($mysqli, $sql);

    //testa se já existe o e-mail cadastrado
    if (mysqli_num_rows($res) == 1) {
        echo "E-mail já cadastrado. Por favor, digite outro e-mail.<br>";
        $erro = 1;
    }

    if (strlen($senha) < 5 or strlen($senha) > 10) {
        echo "Por favor, digite a senha entre 5 e 10 caracteres.<br>";
        $erro = 1;
    }

    if ($senha != $senha_rep) {
        echo "Por favor, repita a senha corretamente.<br>";
        $erro = 1;
    }


    if (strlen($cpf) < 11) {
        echo "Por favor, digite o cpf corretamente.<br>";
        $erro = 1;
    }

    if (empty($data_nasc)) {
        echo "Por favor, preencha a data.<br>";
        $erro = 1;
    }


    if ($erro == 0) {
        $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO funcionario (apelido,nome,senha, senha_cript, cpf, telefone, email, data_nasc,permissao)";
        $sql .= "VALUES ('$apelido','$nome','$senha','$senha_cript', '$cpf', '$telefone', '$email' '$data_nasc','$permissao');";

        if (!mysqli_query($mysqli, $sql)) {
            echo mysqli_error($mysqli);
        }

        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Data de nascimento: $data_nasc <br>";
        echo "Telefone: $telefone <br>";
     
    }
}
?>
    </body>
</html>
<?php mysqli_close($mysqli); 
?>