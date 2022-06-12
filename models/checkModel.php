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
            if ($res['existsWhatsapp']){
                $result[] = ['phoneNumber' => $number, 'existsWhatsapp' => '1'];
            }
            else {
                $result[] = ['phoneNumber' => $number, 'existsWhatsapp' => '0'];
            }
            
        }
        return $result;
    }
}