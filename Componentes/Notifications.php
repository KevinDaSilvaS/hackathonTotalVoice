<?php
class Notifications
{
    public function __construct()
    {
        
    }

    public function sucess($header = "Sucesso!!",$message)
    {
        return'
        <script src="JS/modal-ini.js"></script>
        <script> src="js/materialize.js"</script>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
            
            console.log("erro cadastro");
            M.toast({
                html:` <div style="margin:15px;"> <i class="material-icons">notifications</i> '.$header.'<div>'.$message.'</div>`,
                displayLength:3000,
                classes:`green darken-1`
                });
            });
        </script>';
    }

    public function error($header = "Um erro Ocorreu!!",$message)
    {
        return'
        <script src="JS/modal-ini.js"></script>
        <script> src="js/materialize.js"</script>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
            
            console.log("erro cadastro");
            M.toast({
                html:` <div style="margin:15px;"> <i class="material-icons">notifications</i> '.$header.'<div>'.$message.'</div>`,
                displayLength:3000,
                classes:`red darken-3`
                });
            });
        </script>';
    }
}

?>