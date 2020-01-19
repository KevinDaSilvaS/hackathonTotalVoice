<?php
session_start();

session_start();
isset($_SESSION['IDLOGIN']) ? $idlogin = $_SESSION['IDLOGIN'] :
header('logout.php');

require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');
require_once ('Componentes'.DIRECTORY_SEPARATOR.'Redirect.php');

$redirecionar = new Redirecionar();
//POST VARIABLES 

$nomeFilho = mysqli_real_escape_string($mysqli_connection, $_POST['Filho']);

$fields = "nome_filho,idlogin";
$values = "'$nomeFilho','$idlogin'";

$handler = new HandlerDataBase();

$resposta = $handler->insertFields("filhos",$fields,$values);

if ($resposta == 1) {
    $_SESSION['sucessoFilhos'];
    $redirecionar->redirect('ListaFilhos.php');
}else {
    echo $resposta;
}

?>