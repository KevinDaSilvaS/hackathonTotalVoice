<?php
session_start();

require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');
require_once ('Componentes'.DIRECTORY_SEPARATOR.'Redirect.php');

$redirecionar = new Redirecionar();
//POST VARIABLES 

$idMonitoramento = mysqli_real_escape_string($mysqli_connection, $_POST['id']);

$handler = new HandlerDataBase();

$dadosPesquisa = $handler->selectWhere("idfilhos,idlogin","filhos","idfilhos = '$idMonitoramento'");
if (is_array($dadosPesquisa)) {
    foreach ($dadosPesquisa as $key => $value) {
        $idfilhos = $value['idfilhos'];
        $idLogin = $value['idlogin'];
    }
}

if ($idfilhos >= 1) {
    $_SESSION['IDFILHOS'] = $idfilhos;
    $_SESSION['IDLOGIN'] = $idLogin;
    $redirecionar->redirect('Monitoracao.php');
}else {
    echo $dadosPesquisa;
}

?>