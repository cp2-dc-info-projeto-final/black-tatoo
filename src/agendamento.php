<?php 
     include "autentica.php";
?>
<!DOCTYPE html> 
<html lang="pt-br"> 
  <head> 
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Agendamento</title>
    <style>
      .form-control{background: gray; color:white;}
      .form-control:focus{border-color: black;  box-shadow: black; -webkit-box-shadow: none;} 
      .has-error .form-control:focus{box-shadow: none; -webkit-box-shadow: none;}
      body{
        background-color: white;
            background-image: none;
            color:black;
        }
  </style>
  </head>
  <body> 
    <?php 
    include "autentica.php";
    include "header.php";
    include "conexao.php";
    ?>
      <h1 class="text-center">Agendamento</h1>
      <br>  
      <br>
      <center>
        <form action="pagina_extra.php" method="post">
        <input type="hidden" name="operacao" value="agendar">
        <input type="hidden" name="codigo" value="<?php $_SESSION['codigo']?>">          
      <div class="col-sm-3">  
        <label for="data_tatto"><b>Data para tatuar:</b></label>
      <input type="date" name="data_tatto" id="data_tatto" required>
        </div>   
    <div class="col-sm-3 col-sm-offset-3">          
      <label>Insira o nome do artista</label> 
      <input class="form-control" type="text" name="nome" required>  
    </div>
    <div class="col-sm-3">  
      <label>telefone para contato</label>          
      <input class="form-control" type="text" name="telefone" placeholder="123456789" required> 
    </div> 
    <div class="col-sm-3 col-sm-offset-3">         
      <label>Tatuagens</label> 
        <select name="tatuagens" class="form-control">
          <option value="" selected=>Selecione um estilo de tatuagem</option>
          <?php    
      $sql = "SELECT * FROM tatuagem;"; 
      $res = mysqli_query($mysqli,$sql);
      $linhas = mysqli_num_rows($res); 
      for ($i = 0; $i < $linhas; $i++) {
      $style = mysqli_fetch_array($res);
      $a = '<option>';
      $a .= $style['estilo'];
      $a .= ' - R$';
      $a .= $style['preco'];
      $a .= '</option>';
      echo $a;
    }?>
        </select>
      <div class="col-sm-offset-3 col-sm-6"><br> 
        <input class='btm' type='submit' value='Agendar!  '> 
        <a href="perfil.php" class="btm">Voltar</a> 
    </div>                        
   </form> 
    </div>
    </center>
  </body> 
 </html>
