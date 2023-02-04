<?php 
    include "conexao.php";
    $cod_cliente = $_GET["cod_cliente"];
    $sql = "SELECT * FROM cliente WHERE cod_cliente = $cod_cliente;"; 
    $res = mysqli_query($mysqli,$sql);
    $cliente = mysqli_fetch_array($res);
?>
<html>
    <head>
        <title>Edição de Cliente</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Edição de Cliente</h1>
        <form action="pagina_extra.php" method="POST"> 
            <input type="hidden" name="operacao" value="editar">
            <input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente?>">
            <p>Nome: <input type="text" name="nome" value="<?php echo $cliente['nome']?>"></p>
            <p>E-mail: <input type="text" name="email" value="<?php echo $cliente['email']?>"></p>
            <p>Data de Nascimento: <input type="date" name="data_nasc" value="<?php echo $cliente['data_nasc']?>"></p>         
            <p><input type="submit" value="Enviar"></p> 
        </form>
    </body>
</html>