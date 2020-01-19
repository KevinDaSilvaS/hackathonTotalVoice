<?php
class Redirecionar
{
    public function __construct()
    {
        
    }

    public function redirect($pageName)
    {
        return header('Location:'.$pageName);
    }
}

?>