<?php
session_start();
isset($_SESSION['IDLOGIN']) ? $idlogin = $_SESSION['IDLOGIN'] :
header('Location:logout.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Dashboard</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/advance-ui-media.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <style>
  input[type=range]{
    height: 40px !important; 
    border: 1px solid #00000000;
  }
  </style>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">
  <?php 
        require_once ('Componentes'.DIRECTORY_SEPARATOR.'renderHeader.php');
        require_once ('Componentes'.DIRECTORY_SEPARATOR.'renderMenu.php');
        require_once ('Componentes'.DIRECTORY_SEPARATOR.'renderFooter.php');
        require_once ('Componentes'.DIRECTORY_SEPARATOR.'Notifications.php');
        require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');

        $db = new HandlerDataBase();

        $message = new Notifications();
        if (isset($_SESSION['sucess'])) { 
          echo $message->sucess('Sucesso!!','Cadastro realizado com sucesso.');
          unset($_SESSION['sucess']);
        }

        if (isset($_SESSION['usuarioexiste'])) { 
          echo $message->error('Atenção!!','Verifique os dados o email cadastrado ja existe.');
          unset($_SESSION['usuarioexiste']);
        }

        $renderHeader = new RenderHeader();
        echo $renderHeader->renderHeader();

        $renderMenu = new RenderMenu();
        echo $renderMenu->renderMenu();

    ?>
    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        
        <div class="col s12">
          <div class="container">
            <div class="section">

  <!--Material Box-->
  <div class="row">
    <div class="col s12">
      <div id="material-box" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l6">
                <h4 class="card-title">Mapa Atual</h4>
              </div>
              <div class="col s12 m6 l6">
                
              </div>
            </div>
          </div>
          <div id="view-material-box">
            <div class="row">
              <div class="col s12">
              </div>
              <div class="col s12">
                <img class="materialboxed mt-2" src="mapa.JPG" alt="sample">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card grey lighten-2 black-text">
    <div class="card-content">
    <div class="col s12 m12 l12">
        <h4 class="card-title">Cadastrar Local</h4>
        <form class="col s12" action="insereLocal.php" method="POST">
            <div class="row">
                <div class="input-field col m4 s12">
                    <input id="nome" name="nome" type="text" >
                    <label for="nome">Nome do Local</label>
                </div>

                <div class="input-field col m4 s12">
                    <input id="latitude" name="latitude" type="text" required>
                    <label for="latitude">Latitude</label>
                </div>
                <div class="input-field col m4 s12">
                    <input id="longitude" name="longitude" type="text" required>
                    <label for="longitude">Longitude</label>
                </div>

                <div class="input-field col m12 s12">
                    <input name="distancia" id="distancia" type="range" min="1" max="10000" value="0" class="slider">
                    <label for="distancia">Distancia Minima Para Disparar SMS ao Se Afastar (METROS)</label>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>

</div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->

    <?php
        $renderFooter = new RenderFooter();
        echo $renderFooter->renderFooter();
    ?>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../../../app-assets/js/plugins.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/custom/custom-script.js" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/advance-ui-media.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>