<?php 
        include "conexao.php";
?>
<html>
    <head>
        <title>Dados Cadastrados</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">

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
    
        //Testa se já existe o e-mail cadastrado
        if(mysqli_num_rows($res) == 1){
            echo "E-mail já cadastrado. Por favor, digite outro e-mail.<br>";
            $erro = 1;
        }

        $sql = "SELECT * FROM funcionario WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);
        
        //Testa se já existe o e-mail cadastrado
        if(mysqli_num_rows($res) == 1){
            echo "E-mail já cadastrado. Por favor, digite outro e-mail.<br>";
            $erro = 1;
        }
            
        $sql = "SELECT * FROM administrador WHERE email = '$email';";
        $res = mysqli_query($mysqli, $sql);
            
        //Testa se já existe o e-mail cadastrado
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
    elseif($operacao == "adicionar_tatto"){
        $preco = $_POST["preco"];
        $estilo = $_POST["tatuagem"];
        $nome = $_POST["nome"];
        $codfun = $_POST["codfun"];
        $estilop = $_POST["estilo"];
        $link = $_POST["link"];
        if (!empty($estilop)){
            $estilo = $estilop;
        }
        if(empty($nome)){
        $nome = $_SESSION['nome'];
        }
        
        $sql = "INSERT INTO tatuagem (estilo,preco,autor,link,cod_func)";
        $sql .= "VALUES ('$estilo','$preco','$nome','$link','$codfun');";
        mysqli_query($mysqli,$sql);
        echo "Tatuagem registrada!";
        echo "<a href='perfil.php'></a>";
    }
    elseif($operacao == 'agendar'){
        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $data = $_POST["data_tatto"];
        $tel = $_POST["telefone"];
        $estilo = $_POST["tatuagens"];

        if(empty($nome)){
            echo "Autor nao encontrado";
            echo "<a href'agendamento.php'>Voltar</a>";
            exit;
        }
        if(empty($codigo)){
        $codigo = $_SESSION['codigo'];
        }
        $table = $_SESSION['permissao'];
        if($table == 0){
            $sql = "SELECT * FROM cliente WHERE cod_cliente like '$codigo';"; 
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);
            for ($i = 0; $i < $linhas; $i++) {
                $usuario = mysqli_fetch_array($res);
                $nome_cliente = $usuario['nome'];
            }
        }
        elseif($table == 1){
            $sql = "SELECT * FROM administrador WHERE cod_admin like '%$codigo';"; 
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);
            for ($i = 0; $i < $linhas; $i++) {
                $usuario = mysqli_fetch_array($res);
                $nome_cliente = $usuario['nome'];
            }
        }
        elseif($table == 2){
            $sql = "SELECT * FROM funcionario WHERE cod_func like '%$codigo';"; 
            $res = mysqli_query($mysqli,$sql);
            $linhas = mysqli_num_rows($res);
            for ($i = 0; $i < $linhas; $i++) {
                $usuario = mysqli_fetch_array($res);
                $nome_cliente = $usuario['nome'];
            }
        }
        $sql = "SELECT * FROM funcionario WHERE nome like '%$nome';"; 
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        if($linhas < 1){
            echo "Autor da tatuagem nao encontrado :(";
            echo "<a href'agendamento.php'>Voltar</a>";
            exit;
        }
        else{
        for ($i = 0; $i < $linhas; $i++) {
            $usuario = mysqli_fetch_array($res);
            $id = $usuario['cod_func'];
        }
        $sql = "INSERT INTO agendamento (autor,contato,cod_fun,data_agenda,estilo_valor,cod_cliente,nome_cliente)";
        $sql .= "VALUES ('$nome','$tel','$id','$data','$estilo','$codigo','$nome_cliente');";
        mysqli_query($mysqli,$sql);
        }
    echo "<h3> Tatuagens resgistrada.";
    echo "<a href='perfil.php'";
    }
    else if ($operacao == "editar") {

        $permiss = $_POST["permissao"];
        if ($permiss > 2) {
            echo "Por favor, preencha uma permissao valida.<br>";
            $erro = 1;
            exit;
        }
        if ($permiss == 0) {

            $cod_cliente = $_POST["cod_cliente"];
            $nome = $_POST["nome"];
            $apelido = $_POST["apelido"];
            $email = $_POST["email"];
            $data_nasc = $_POST["data_nasc"];


            $erro = 0;

            if (empty($nome) or strstr($nome, ' ') == false) {
                echo "Por favor, preencha o nome completo.<br>";
                $erro = 1;
            }

            if (strlen($email) < 10 or strstr($email, '@') == false) {
                echo "Por favor, preencha o e-mail corretamente.<br>";
                $erro = 1;
            }

            if (empty($data_nasc)) {
                echo "Por favor, preencha a data.<br>";
                $erro = 1;
            }
            if (empty($apelido)) {
                echo "Por favor, preencha o apelido.<br>";
                $erro = 1;
            }
            if (empty($permiss)) {
                echo "Por favor, preencha a permissao.<br>";
                $erro = 1;
            }
            if ($permiss > 2) {
                echo "Por favor, preencha uma permissao valida.<br>";
                $erro = 1;
            }

            if ($erro == 0) {
                $sql = "UPDATE cliente SET  usuario = '$apelido', nome = '$nome', email = '$email', data_nasc = '$data_nasc', permissao = $permiss";
                $sql .= "WHERE `cod_cliente` = '$cod_cliente';";
                mysqli_query($mysqli, $sql);

                echo "Cliente atualizado com sucesso!<br>";
                echo "<a href='perfil.php'>Voltar ao perfil</a>";
            }
        }
        elseif($permiss == 1){
            $cod_adm = $_POST["cod_admin"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $data_nasc = $_POST["data_nasc"];

            $erro = 0;

            if (empty($nome) or strstr($nome, ' ') == false) {
                echo "Por favor, preencha o nome completo.<br>";
                $erro = 1;
            }

            if (strlen($email) < 10 or strstr($email, '@') == false) {
                echo "Por favor, preencha o e-mail corretamente.<br>";
                $erro = 1;
            }

            if (empty($data_nasc)) {
                echo "Por favor, preencha a data.<br>";
                $erro = 1;
            }
            if (empty($permiss)) {
                echo "Por favor, preencha a permissao.<br>";
                $erro = 1;
            }

            if ($erro == 0) {
                $sql = "UPDATE administrador SET  nome = '$nome', email = '$email', data_nasc = '$data_nasc', permissao = $permiss";
                $sql .= " WHERE `cod_admin` = '$cod_adm';";
                mysqli_query($mysqli, $sql);

                echo "Administrador atualizado com sucesso!<br>";
                echo "<a href='perfil.php'>Voltar ao perfil</a>";
            }
        }
        elseif($permiss == 2){
            $cod_fun = $_POST["cod_func"];
            $apelido = $_POST["apelido"];
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $tel = $_POST["numero"];
            $email = $_POST["email"];
            $data_nasc = $_POST["data_nasc"];

            $erro = 0;

            if (empty($nome) or strstr($nome, ' ') == false) {
                echo "Por favor, preencha o nome completo.<br>";
                $erro = 1;
            }

            if (strlen($email) < 10 or strstr($email, '@') == false) {
                echo "Por favor, preencha o e-mail corretamente.<br>";
                $erro = 1;
            }

            if (empty($data_nasc)) {
                echo "Por favor, preencha a data.<br>";
                $erro = 1;
            }
            if (empty($permiss)) {
                echo "Por favor, preencha a permissao.<br>";
                $erro = 1;
            }
            if (empty($cpf)) {
                echo "Por favor, preencha a permissao.<br>";
                $erro = 1;
            }
            if (empty($tel)) {
                echo "Por favor, preencha a permissao.<br>";
                $erro = 1;
            }

            if ($erro == 0) {
                $sql = "UPDATE funcionario SET apelido = '$apelido', nome = '$nome', cpf = '$cpf', tel = '$tel', email = '$email', data_nasc = '$data_nasc', permissao = '$permiss'";
                $sql .= "WHERE `cod_func` = '$cod_fun';";
                mysqli_query($mysqli, $sql);

                echo "Funcionario atualizado com sucesso!<br>";
                echo "<a href='perfil.php'>Voltar ao perfil</a>";
            }
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
    } 
    else if ($operacao == "inserir_funcionario") {
        $apelid = $_POST["apelido"];
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        $senha_rep = $_POST["senha_rep"];
        $cpf = $_POST["CPF"];
        $telefone = $_POST["Telefone"];
        $permissao = $_POST["permissao"];
        $email = $_POST["email"];
        $data_nasc = $_POST["data_nascimento"];
        $erro = 0;

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
                $sql = "INSERT INTO funcionario (apelido,nome,senha,cpf,tel,email,data_nasc,permissao)";
                $sql .= "VALUES ('$apelid','$nome','$senha_cript', '$cpf', '$telefone', '$email', '$data_nasc','$permissao');";

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
?>
    </body>
</html>
<?php mysqli_close($mysqli); 
?>
