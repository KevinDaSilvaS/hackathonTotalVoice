<?php
session_start();

require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');
require_once ('Componentes'.DIRECTORY_SEPARATOR.'Redirect.php');

$redirecionar = new Redirecionar();
//POST VARIABLES 

$telefone = mysqli_real_escape_string($mysqli_connection, $_POST['Telefone']);

$handler = new HandlerDataBase();

$dadosPesquisa = $handler->selectWhere("idlogin","login","telefone = '$telefone'");
if (is_array($dadosPesquisa)) {
    foreach ($dadosPesquisa as $key => $value) {
        $idLogin = $value['idlogin'];
    }
}

if ($idLogin >= 1) {
    $_SESSION['IDLOGIN'] = $idLogin;
    $redirecionar->redirect('Dashboard.php');
}else {
    echo $dadosPesquisa;
}

?>