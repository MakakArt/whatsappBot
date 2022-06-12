<?php


class mainModel 
{
    protected $apiUrl = 'https://api.green-api.com';

    protected function GetUrl($method){
        $adress = $this->apiUrl;
        $instance = $this->GetApiInstance();
        $token = $this->GetApiTokenInstance();
        $separator = '/';
        $method = $method;
        return ($adress.$separator.'waInstance'.$instance.$separator.$method.$separator.$token);
    }


    public function GetApiInstance(){
        $idInstance = $_COOKIE['idInstance'];
        return $idInstance;
    }

    public function GetApiTokenInstance(){
        $apiTokenInstance = $_COOKIE['apiTokenInstance'];
        return $apiTokenInstance;
    }

    protected function validateNumber($number, $bool){
        $number = preg_replace('/[^0-9.]/','', $number);
        $number = str_split($number);
        if (($number[0] = 8) || ($number[0] = "8")){
            $number[0] = 7;
        }
        $number = implode("", $number);
        if ($bool){
            return $number.'@c.us';
        }
        return $number;
    }



    protected function sendRequest($array, $method){
        $array = json_encode($array);
        $headers = ['Content-Type: application/json'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $array);
        curl_setopt($curl, CURLOPT_URL, $this->GetUrl($method));
        curl_setopt($curl, CURLOPT_POST, true);
        $result = curl_exec($curl);
        if (json_decode($result,true)){
            return json_decode($result,true);
        }
        return $result;
    }

    protected function GetRequest($method)
    {
        $url = $this->GetUrl($method);
        $json_array = file_get_contents($url);
        return $json_array;
    }


}

