<?php
class ConversorMoeda
{
    public function __construct()
    {
        
    }

    public function converterMoedaToFloat($valor)
    {
        $str = preg_replace('/[^,-,0-9]/', '',  $valor);

        $replaceCommas = preg_replace('/[^0-9]/', '.',  $str);

        $valor = $replaceCommas;

        return $valor;
    }
}

?>