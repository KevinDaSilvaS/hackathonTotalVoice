<?php
session_start();

require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');
require_once ('Componentes'.DIRECTORY_SEPARATOR.'Redirect.php');

$redirecionar = new Redirecionar();
//POST VARIABLES 
$email = mysqli_real_escape_string($mysqli_connection, $_POST['email']);

$telefone = mysqli_real_escape_string($mysqli_connection, $_POST['Telefone']);


$fields = "email,telefone";
$values = "'$email','$telefone'";

$handler = new HandlerDataBase();

$resposta = $handler->insertFields("login",$fields,$values);

if ($resposta == 1) {
    $redirecionar->redirect('index.html');
}else {
    echo $resposta;
}

?>