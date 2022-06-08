<?php

require "mainModel.php";


class SendMessageModel extends mainModel
{
    protected $methodUrl = 'SendMessage';


    private function writeLog($array){
        if (!realpath('./db')){
            mkdir('./db', 0777, true);
        }
        if (realpath('./db/database.json')){
            $data = json_decode(file_get_contents('./db/database.json'), true);
        }
        else {
            $data=[];
        }
        $data[] = $array;
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents('./db/database.json', $data);
    }

    private function checkRepeat($number){
        $numbers = [];
        if (realpath('./db/database.json')){
            $data = json_decode(file_get_contents('./db/database.json'), true);
            if($data){
                foreach ($data as $value){
                    $numbers[] = $value['Number'];
                }
                if (in_array($number, $numbers)){
                    return false;
                }
                return true;
            }
            return true;
        }
        return true;
    }
    

    public function madeRequest($post){
        $result = [];
        $json_message = [];
        $numbers = explode("\n", $post['numbers']);
        $message = $post['message'];
        foreach ($numbers as $number){
            $number = $this->validateNumber($number);
            if ($this->checkRepeat($number)){
                $json_message = ["chatId"=>$number, "message"=>$message];
                $res = $this->sendRequest($json_message, $this->methodUrl);
                $res = json_decode($res,true);
                $this->writeLog(["Number"=>$number, "result"=>$res, "message"=>$message]);
                $result[]=$res;
            }
        }
        return $result;
    }
    
}

