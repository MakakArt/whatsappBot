<?php

require "mainModel.php";

class SetSettingsModel extends mainModel
{
    protected $methodUrl = 'SetSettings';
    protected $getmethodUrl = 'GetSettings';

    public function madeRequest($post){
        unset($post['action']);
        $post['delaySendMessagesMilliseconds'] = ($post['delaySendMessagesMilliseconds'] * 1000 * 60);
        $result = $this->sendRequest($post, $this->methodUrl);
        $result = json_decode($result, true);
        return $result;
    }

    public function madeGetRequest(){
        $array = $this->GetRequest($this->getmethodUrl);
        $array = json_decode($array, true);
        return $array;
    }
}
