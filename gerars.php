<?php
function gerar_senha($tamanho, $minuscula, $numeros, $simbolos){

$mini = "abcdefghijklmnopqrstuvwxyz";
$nmr = "1234567890";
$sim = "!@#$%*";

$senha = 0;

if ($minuscula){
    $senha .= str_shuffle($mini);
}
if ($numeros){
    $senha .=str_shuffle($nmr);
}
if ($simbolos){
    $senha .=str_shuffle($sim);
}
$senha_cript = password_hash($senha, PASSWORD_DEFAULT);
return substr(str_shuffle($senha_cript), 0, $tamanho);

}

?>