<?php

require "mainModel.php";


class checkModel extends mainModel
{
    protected $methodUrl = 'CheckWhatsapp';

    public function madeRequest($post){
        $result = [];
        $numbers = explode("\n", $post['numbers']);
        foreach ($numbers as $number){
            $res = '';
            $number = $this->validateNumber($number, false);
            $data = ['phoneNumber' => $number];
            $res = $this->sendRequest($data, $this->methodUrl);
            $result[] = ['phoneNumber' => $number, 'existsWhatsapp' => (int)$res['existsWhatsapp']];
            
        }
        return $result;
    }
}