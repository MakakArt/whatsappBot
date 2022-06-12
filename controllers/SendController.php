<?php

require "mainController.php";

class sendController extends mainController
{

    protected $classModel = "SendMessageModel";
    protected $model = null;
    protected $location = 'send';
    protected $view = 'send';

    public function actionViewlog(){
        $array = file_get_contents('./db/database.json');
        $array = json_decode($array, true);
        require './views/logs.php';
    }

    public function actionClearlog(){
        file_put_contents('./db/database.json', '');
        header('Location: /send/viewlog');
    }

    public function actionDeletelog(){
        $post = $_POST;
        if ($post['action'] == 'delete'){
            unset($post['action']);
            $this->model->deleteLogs($post, false);
        }
        if ($post['action'] == 'deletemany'){
            unset($post['action']);
            $this->model->deleteLogs($post, true);
        }
        header('Location: /send/viewlog');
    }


}
