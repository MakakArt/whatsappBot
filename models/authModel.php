<?php

require "mainModel.php";


class authModel extends mainModel
{
    
    public function madeRequest($array){
        setcookie('idInstance', $array['idInstance'], (time()+60*60*24*2), '/', false, false);
        setcookie('apiTokenInstance', $array['apiTokenInstance'], (time()+60*60*24*2), '/', false, false);
    }
    
    
}