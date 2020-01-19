<?php
class ModalCreator
{
    public function __construct()
    {
        
    }

    public function createModal($customId,$customHeader,$customMessage,
    $value,$page,$tooltipMessage,$iconName)
    {
        return "<a class='btn tooltipped modal-trigger' 
          href='#$customId' 
          data-position='bottom' data-tooltip='$tooltipMessage' 
          style='height: 36px; width: 0px; padding-left: 10px;'
          class='blue darken-1'><i class='material-icons'>$iconName</i>
        </a>

        <div id='$customId' class='modal'>
            <div class='modal-content cyan lighten-4'>
                <h6>$customHeader</h6> 
                <p>$customMessage</p> 
            </div>

            <form action='$page' method='POST'>
                <div class='modal-footer cyan lighten-3'>
                    <button class='btn modal-action modal-trigger waves-effect waves-cyan' 
                    type='submit' value='$value'
                    name='value' >Sim</button>

                    <a href='#!'
                    class='btn modal-close waves-effect waves-cyan'>
                    Fechar</a>
                </div>
            </form>
        </div>";
    }

    public function createModalWithInputs($customId,$customHeader,$customMessage,
    $page,$tooltipMessage,$iconName,$btnmsg,$inputsForm)
    {
        return "<a class='btn tooltipped modal-trigger' 
          href='#$customId' 
          data-position='bottom' data-tooltip='$tooltipMessage' 
          style='height: 36px; width: 0px; padding-left: 10px;'
          class='blue darken-1'><i class='material-icons'>$iconName</i>
        </a>

        <div id='$customId' class='modal'>
            <form action='$page' method='POST'>

                <div class='modal-content grey lighten-4'>
                    <h6>$customHeader</h6> 
                    $inputsForm
                    <p>$customMessage</p> 
                </div>

                <div class='modal-footer grey lighten-3'>
                    <button class='btn modal-action modal-trigger waves-effect waves-cyan' 
                    type='submit' >$btnmsg</button>

                    <a href='#!'
                    class='btn modal-close waves-effect waves-cyan'>
                    Fechar</a>
                </div>
            </form>
        </div>";
    }
}

?>