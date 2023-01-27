<?php 
  session_start();
        
 ?>
 <!DOCTYPE html> 
 <html lang="pt-br"> 
   <head> 
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/indexx.css">
    <body><?php include "header.php"; ?></body>
    <title>Agendamento</title> 
   <body> 
      <h1 class="text-center">Agendamento</h1><br>  
    </div><br> 
    <div class="col-sm-3 col-sm-offset-3">          
             <label>Nome</label> 
             <input class="form-control" type="text" name="nome" placeholder="Digite seu nome" required>  
         </div> 
         <div class="col-sm-3">  
           <label>Telefone</label>          
           <input class="form-control" type="text" name="telefone" placeholder="Digite seu telefone" required> 
         </div> 
         <div class="col-sm-6 col-sm-offset-3">         
                             <label>Tatuagens</label> 
                               <select name="Tatuagens" class="form-control"> 
                 <option value="" selected=>Selecione um estilo de tatuagem</option> 
                 <option>PONTILHISMO - R$200,00</option> 
                 <option>OLD SCHOOL - R$250,00</option>  
                 <option>GEOMÉTRICO - R$100,00</option>  
                 <option>MINIMALISTA - R$50,00</option>  
                 <option>BLACKWORK - R$200,00</option>  
                 <option>SINGLE LINE - R$ 100,00</option>  
                 <option>GLITCH - R$150,00</option> 
                 <option>TINTA BRANCA - R$150,00</option>   
                 <option>AQUARELA - Sob consulta</option>      
             </select>                           
                             <div class="col-sm-offset-3 col-sm-6"><br> 
<a href="" class="btm">Agendar</a> 
<a href="index.php" class="btm">Voltar</a> 
                                       
              
              
    </div>                        
   </form> 
    </div> 
  </body> 
 </html>
