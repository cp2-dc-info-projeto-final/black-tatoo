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
    <?php
    include "autentica.php";
    include "header.php";
    if ($_SESSION["permissao"] <= 0){
        echo "permissao negada";
        echo "<a href='perfil.php'>Voltar ao perfil";
        exit;
    }
    ?> 
    <div class="container">
        <div class="box">
            <fieldset><legend>Registrar tatuagem</legend>
            <form action="pagina_extra.php" method="post">
            <input type="hidden" name="operacao" value="adicionar_tatto">
            <input type="hidden" name="nome" value="<?php $_SESSION['nome']?>">
            <input type="hidden" name="codfun" value="<?php $_SESSION['codigo']?>">
                <br>
                <div class="inputBox">
                <select name="tatuagem" class="form-control"> 
          <option value="" selected=>Selecione um estilo de tatuagem</option> 
          <option>PONTILHISMO</option> 
          <option>OLD SCHOOL</option>  
          <option>GEOMÉTRICO</option>  
          <option>MINIMALISTA</option>  
          <option>BLACKWORK</option>  
          <option>SINGLE LINE</option>  
          <option>GLITCH</option> 
          <option>TINTA BRANCA</option>
          <option>Estilo proprio</option>   
        </select><br><br>
        <div class="inputBox">
                    <input type="text" name="estilo" id="estilo" class="inputUser">
                    <label for="estilo" class="labelInput">nome do estilo</label>
                </div>
                <br>
        <div class="inputBox">
                    <input type="text" name="preco" id="preco" class="inputUser" required>
                    <label for="preco" class="labelInput">Preço</label>
                </div>
                <br>
        <div class="inputBox">
            <input type="text" name="link" id="link" class="inputUser" required>
            <label for="link" class="labelInput">Link da imagem de referencia</label>
        </div>
        <br><br>
                <input type="submit" name="submit" id="submit">
            </div>
            </form>
            </fieldset>
        </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/add.js"></script>
</html>