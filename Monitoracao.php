<?php
session_start();
isset($_SESSION['IDLOGIN']) ? $idlogin = $_SESSION['IDLOGIN'] :
header('Location:logout.php');

$IDFILHOS = $_SESSION['IDFILHOS'];

require_once ('Componentes'.DIRECTORY_SEPARATOR.'HandlerDataBase.php');
$db = new HandlerDataBase();

$dadosPesquisa = $db->selectWhere("*",
"locais","idlogin = '$idlogin' ORDER BY idlogin DESC"); 

$telefone = $db->selectWhere("telefone",
"login","idlogin = '$idlogin' ORDER BY idlogin DESC"); 

if (is_array($telefone)) {
    foreach ($telefone as $key => $value) {
        $numeroTelefone = $value['telefone'];
        $numeroTelefone = preg_replace("/[()-]/", "", $numeroTelefone);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoração</title>
</head>
<body>
<input type="text" id="telefone" value="<?php echo $numeroTelefone;?>" style="display:none;">
<input type="text" id="id" value="<?php echo $IDFILHOS;?>" style="display:none;">
<input type="text" id="currlatitude" value="" style="display:none;">
<input type="text" id="currlongitude" value="" style="display:none;">
<?php
    if (is_array($dadosPesquisa)) {
        foreach ($dadosPesquisa as $key => $value) { ?>
            <input type="text" class="distancia" id="distancia" value="<?php echo $value['distancia'];?>" style="display:none;">
            <input type="text" class="latitude" id="latitude" value="<?php echo $value['latitude'];?>" style="display:none;">
            <input type="text" class="longitude" id="longitude" value="<?php echo $value['longitude'];?>" style="display:none;">
<?php    }
    }
    ?>
</body>
<footer>
<script src="GPS-distance-master/javascript/distance.js"></script>   
<script>
    let latitude = document.getElementsByClassName("latitude");
    let longitude = document.getElementsByClassName("longitude");
    let currlatitude = document.getElementById("currlatitude").value;
    let currlongitude = document.getElementById("currlongitude").value;
    let distancia = document.getElementsByClassName("distancia");
    let telefone = document.getElementById("telefone").value;
    let id = document.getElementById("id").value;
    function checkSMS() {
        for (let index = 0; index < distancia.length; index++) {
            let localLat = latitude[index].value;
            let localLon = longitude[index].value;
            let localDist = distancia[index].value;
            let myDistance = getDistance(parseFloat(currlatitude), parseFloat(currlongitude), parseFloat(localLat), parseFloat(localLon))
            //alert(localDist);
            if (myDistance > localDist) {
                postSMS(telefone, "Seu filho com o id de monitoração " + id + " se afastou da distancia maxima permitida de um dos seus locais.");
                alert("DISPARANDO SMS");
            }
        }
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {

        }
    }

    function showPosition(position) {
    /* alert( "Latitude: " + position.coords.latitude +
    "<br>Longitude: " + position.coords.longitude); */
    currlatitude = position.coords.latitude;
    currlongitude = position.coords.longitude;
    //alert(currlatitude);
    checkSMS();
    }

    
</script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="http://ajax.cdnjs.com/ajax/libs/json2/20110223/json2.js"></script>
<script>
        var rootURL = 'https://api.totalvoice.com.br';
        var accessToken = 'ff84426e89a609dc4e82a2d399a8d822'; //coloque seu access_token aqui


        $.ajaxSetup({
            headers: {
                'Access-Token': accessToken
            }
        });



        function getSMS(id) {
            $.ajax({
                type: 'GET',
                url: rootURL + '/sms/' + id,
                dataType: "json",
                success: function(data) {
                    renderDetails(data);
                }
            });
        }

        function postSMS(numero_destino, mensagem) {
            console.log('postSMS');
            var resposta_usuario = true;
            $.ajax({
                type: 'POST',
                dataType: "json",
                data: formToJSON(numero_destino, mensagem, resposta_usuario),
                url: rootURL + '/sms',
                success: function(data, textStatus, jqXHR) {
                    renderDetails(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('error: ' + textStatus);
                }
            });
        }


        function formToJSON(numero_destino, mensagem, resposta_usuario) {
            return JSON.stringify({
                "numero_destino": numero_destino,
                "mensagem": mensagem,
                "resposta_usuario": resposta_usuario
            });
        }

        function renderDetails(chamada) {
            $('#status').text(chamada.status);
            $('#sucesso').text(chamada.sucesso);
            $('#motivo').text(chamada.motivo);
            $('#mensagem_r').text(chamada.mensagem);
            $('#dadosid').text(chamada.dados.id);
        }




        //relatorio de sms enviado
        function getSMSRelatorio(data_inicio, data_fim) {
            $.ajax({
                type: 'GET',
                url: rootURL + '/sms/relatorio/',
                dataType: "json",
                data: {
                    data_inicio: data_inicio,
                    data_fim: data_fim

                },

                success: function(data, textStatus, jqXHR) {
                    console.log(JSON.stringify(data));
                    alert(JSON.stringify(data));
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('error: ' + textStatus);
                }
            });
        }




        //mostra saldo
        function getSaldo() {
            $.ajax({
                type: 'GET',
                url: rootURL + '/saldo/',
                dataType: "json",
                success: function(data) {
                    renderSaldo(data.dados);
                }
            });
        }

        function renderSaldo(dados) {
            $('#saldo').text(dados.saldo);
        }

        getSaldo();
</script>

<script>
setInterval(function(){ getLocation(); }, 5000);
//getLocation();
</script>

</footer>
</html>