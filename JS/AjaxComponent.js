function startAJAX(dadosajax, pageurl) {

    /* var dadosajax = {
        'valorAporte' :valorAporte.value,
        'valorDolar' :valorDolar.value,
        'idAporte' :idAporte
    }; */

    //pageurl = 'salvarvalores.php';

    $.ajax({
        url: pageurl,

        data: dadosajax,

        type: 'POST',

        cache: false,

        error: function() {
            // alert('Erro: efetuar Solicitação!!');
            return 0;
        },

        success: function(result) {
            /*  if($.trim(result) == '1')
             { */
            return result;

            /*  }else
             {
                 alert(result);
                 console.log(result);
                 valorAporte.classList.add("red","lighten-4");
                 valorDolar.classList.add("red","lighten-4");
             } */
        }
    });
}