<?php
session_start();

session_start();
isset($_SESSION['IDLOGIN']) ? $idlogin = $_SESSION['IDLOGIN'] :
header('logout.php');

require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');
require_once ('Componentes'.DIRECTORY_SEPARATOR.'Redirect.php');

$redirecionar = new Redirecionar();
//POST VARIABLES 
$latitude = mysqli_real_escape_string($mysqli_connection, $_POST['latitude']);

$longitude = mysqli_real_escape_string($mysqli_connection, $_POST['longitude']);

$nomeLocal = mysqli_real_escape_string($mysqli_connection, $_POST['nome']);

$distancia = mysqli_real_escape_string($mysqli_connection, $_POST['distancia']);

$fields = "nome_local,latitude,longitude,idlogin,distancia";
$values = "'$nomeLocal','$latitude','$longitude','$idlogin','$distancia'";

$handler = new HandlerDataBase();

$resposta = $handler->insertFields("locais",$fields,$values);

if ($resposta == 1) {
    $_SESSION['sucessoLocal'];
    $redirecionar->redirect('ListaLocais.php');
}else {
    echo $resposta;
}

?>