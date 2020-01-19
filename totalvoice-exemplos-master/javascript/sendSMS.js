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