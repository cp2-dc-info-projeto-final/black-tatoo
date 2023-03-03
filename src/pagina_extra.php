<?php 
        include "conexao.php";
?>
<html>
    <head>
        <title>Dados Cadastrados</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <style>
        .background{
            background-color: rgb(225, 225, 225, 0.9);
            width: 100%;
            height: 50%;
            border-radius: 15px;
            margin-top:5px;
            border:1px solid #000;
            display: flex;
            flex-direction: column;
            color:#000;
            justify-content:center;
            align-items:center;
        }
        .background a:hover{
            color:#fff;
        }
        .background ::after{
            color:#fff;
        }
        </style>
    </head>
    <body>

    <?php include "header.php" ?>
<div class="background">
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
            echo "<a href='editar.php?cod_cliente=".$cliente["cod_cliente"]."'>
            Editar cliente</a><br>";
            echo "<a href='pagina_extra.php?cod_cliente=".$cliente["cod_cliente"]."'>
            Excluir cliente</a><br>";
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
        
        $sql = "INSERT INTO tatuagem (autor,estilo,preco,link,cod_func) ";
        $sql .= "VALUES ('$nome','$estilo','$preco','$link','$codfun');";
        mysqli_query($mysqli,$sql);
        echo "Tatuagem registrada!";
        echo "<a href='perfil.php'>Voltar</a>";
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
            echo "<a href='agendamento.php'>Voltar</a>";
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
    echo "<h3> Agendamento Marcado com Sucesso!<br>";
    echo "<cemter><a href='perfil.php'>Voltar</a></center>";
    }
    else if ($operacao == "editar") {
        if(!(isset($_POST['permissao']))){
            $origem = $_POST["permissA"];
            $permiss = $origem;
        }
        else{
            $permiss = $_POST["permissao"];
            $origem = $_POST["permissA"];
            if(empty($permiss)){
                $permiss = $origem;
            }
        }
        $senha_cript = $_POST['senhaa'];
        if ($permiss > 2) {
            echo "Por favor, preencha uma permissao valida.<br>";
            $erro = 1;
            exit;
        }
        if ($origem == 0) {

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
            if ($permiss > 2) {
                echo "Por favor, preencha uma permissao valida.<br>";
                $erro = 1;
            }

            if ($erro == 0) {
                if($origem == $permiss){
                    $sql = "UPDATE cliente SET  usuario = '$apelido', nome = '$nome', email = '$email', data_nasc = '$data_nasc', permissao = $permiss";
                    $sql .= " WHERE cod_cliente = '$cod_cliente';";
                    mysqli_query($mysqli, $sql);

                    echo "Cliente atualizado com sucesso!<br>";
                    echo "<a href='perfil.php'>Voltar ao perfil</a>";
                }
                else{
                    $sql = "DELETE FROM cliente WHERE cod_cliente LIKE '%$cod_cliente%';";
                    mysqli_query($mysqli, $sql);
                    if($permiss == 1){
                        $sql = "INSERT INTO administrador (nome,email,senha,data_nasc,permissao)";
                        $sql .= "VALUES ('$nome','$email','$senha_cript','$data_nasc','$permiss');";
                        mysqli_query($mysqli, $sql);
                    }
                    elseif($permiss == 2){
                        $sql = "INSERT INTO funcionario (apelido,nome,email,senha,data_nasc,permissao)";
                        $sql .= "VALUES ('$apelido','$nome','$email','$senha_cript','$data_nasc','$permiss');";
                        mysqli_query($mysqli, $sql);
                        $sql ="SELECT * FROM agendamento WHERE cod_cliente LIKE '%$cod_cliente%';";
                        $res = mysqli_query($mysqli,$sql);
                        if(mysqli_num_rows($res) != 0){
                            $sql = "DELETE FROM agendamento WHERE cod_cliente LIKE '%$cod_cliente%';";
                            mysqli_query($mysqli, $sql);
                        }
                    }
                    session_start();
                    $_SESSION = array();
                    session_destroy();
                    header("Location: index.php"); 
                }
            }
        }
        elseif($origem == 1){
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
                if($origem == $permiss){
                    $sql = "UPDATE administrador SET  nome = '$nome', email = '$email', data_nasc = '$data_nasc', permissao = $permiss";
                    $sql .= " WHERE `cod_admin` = '$cod_adm';";
                    mysqli_query($mysqli, $sql);

                    echo "Administrador atualizado com sucesso!<br>";
                    echo "<a href='perfil.php'>Voltar ao perfil</a>";
                }
                else{
                    $sql = "DELETE FROM administrador WHERE cod_admin LIKE '%$cod_adm%';";
                    mysqli_query($mysqli, $sql);
                    if($permiss == 0){
                        $sql = "INSERT INTO cliente (usuario,nome,email,senha,data_nasc,permissao)";
                        $sql .= "VALUES ('$nome','$nome','$email','$senha_cript','$data_nasc','$permiss');";
                        mysqli_query($mysqli, $sql);
                    }
                    elseif($permiss == 2){
                        $sql = "INSERT INTO funcionario (apelido,nome,email,senha,data_nasc,permissao)";
                        $sql .= "VALUES ('$nome','$nome','$email','$senha_cript','$data_nasc','$permiss');";
                        mysqli_query($mysqli, $sql);
                        $sql ="SELECT * FROM agendamento WHERE cod_cliente LIKE '%$cod_adm%';";
                        $res = mysqli_query($mysqli,$sql);
                        if(mysqli_num_rows($res) != 0){
                            $sql = "DELETE FROM agendamento WHERE cod_cliente LIKE '%$cod_adm%';";
                            mysqli_query($mysqli, $sql);
                        }
                    }
                    session_start();
                    $_SESSION = array();
                    session_destroy();
                    header("Location: index.php"); 
                }
            }
        }
        elseif($origem == 2){
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
                if($origem == $permiss){
                    $sql = "UPDATE funcionario SET apelido = '$apelido', nome = '$nome', cpf = '$cpf', tel = '$tel', email = '$email', data_nasc = '$data_nasc', permissao = '$permiss'";
                    $sql .= " WHERE `cod_func` = '$cod_fun';";
                    mysqli_query($mysqli, $sql);

                    echo "Funcionario atualizado com sucesso!<br>";
                    echo "<a href='perfil.php'>Voltar ao perfil</a>";
                }
                else{
                    $sql = "DELETE FROM funcionario WHERE cod_func LIKE '%$cod_fun%';";
                    mysqli_query($mysqli, $sql);
                    if($permiss == 0){
                        $sql = "INSERT INTO cliente (usuario,nome,email,senha,data_nasc,permissao)";
                        $sql .= "VALUES ('$apelido','$nome','$email','$senha_cript','$data_nasc','$permiss');";
                        mysqli_query($mysqli, $sql);
                    }
                    elseif($permiss == 1){
                        $sql = "INSERT INTO administrador (nome,email,senha,data_nasc,permissao)";
                        $sql .= "VALUES ('$nome','$email','$senha_cript','$data_nasc','$permiss');";
                        mysqli_query($mysqli, $sql);
                    }
                    $sql ="SELECT * FROM tatuagem WHERE cod_func LIKE '%$cod_fun%';";
                    $res = mysqli_query($mysqli,$sql);
                    if(mysqli_num_rows($res) != 0){
                        $sql = "DELETE FROM tatuagem WHERE cod_func LIKE '%$cod_fun%';";
                        mysqli_query($mysqli,$sql);
                    }
                    $sql ="SELECT * FROM agendamento WHERE cod_fun LIKE '%$cod_fun%';";
                    $res = mysqli_query($mysqli,$sql);
                    if(mysqli_num_rows($res) != 0){
                        $sql = "DELETE FROM agendamento WHERE cod_fun LIKE '%$cod_fun%';";
                        mysqli_query($mysqli,$sql);
                    }
                    session_start();
                    $_SESSION = array();
                    session_destroy();
                    header("Location: index.php"); 
                }
            }
        }
    }
    else if($operacao == "excluir"){
        $id = $_SESSION["codigo"];
        $permiss = $_SESSION['permissao'];
        if ($permiss == 0){
        
       
            $sql = "DELETE FROM cliente WHERE cod_cliente LIKE '%$id%';";
            mysqli_query($mysqli, $sql);
            $sql ="SELECT * FROM agendamento WHERE cod_cliente LIKE '%$id%';";
            $res = mysqli_query($mysqli,$sql);
            if(mysqli_num_rows($res) != 0){
                $sql = "DELETE FROM agendamento WHERE cod_cliente LIKE '%$id%';";
                mysqli_query($mysqli, $sql);
            }
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php"); 
        }
        if ($permiss == 1){
        
       
            $sql = "DELETE FROM administrador WHERE cod_admin LIKE '%$id%';";
            mysqli_query($mysqli, $sql);
            $sql ="SELECT * FROM agendamento WHERE cod_cliente LIKE '%$id%';";
            $res = mysqli_query($mysqli,$sql);
            if(mysqli_num_rows($res) != 0){
                $sql = "DELETE FROM agendamento WHERE cod_cliente LIKE '%$id%';";
                mysqli_query($mysqli, $sql);
            }
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php"); 
        }
        if ($permiss == 2){
        
            $sql = "DELETE FROM funcionario WHERE cod_func LIKE '%$id%';";
            mysqli_query($mysqli,$sql);
            $sql ="SELECT * FROM tatuagem WHERE cod_func LIKE '%$id%';";
            $res = mysqli_query($mysqli,$sql);
            if(mysqli_num_rows($res) != 0){
                $sql = "DELETE FROM tatuagem WHERE cod_func LIKE '%$id%';";
                mysqli_query($mysqli,$sql);
            }
            $sql ="SELECT * FROM agendamento WHERE cod_fun LIKE '%$id%';";
            $res = mysqli_query($mysqli,$sql);
            if(mysqli_num_rows($res) != 0){
                $sql = "DELETE FROM agendamento WHERE cod_fun LIKE '%$id%';";
                mysqli_query($mysqli,$sql);
            }
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php"); 
        }
   
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
                echo "Por favor, preencha o nome completo e com espaços.<br>";
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
                $sql .= " VALUES ('$apelid','$nome','$senha_cript', '$cpf', '$telefone', '$email', '$data_nasc','$permissao');";

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
</div>
    </body>
</html>
<?php mysqli_close($mysqli); 
?>
