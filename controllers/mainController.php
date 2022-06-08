<?php

class mainController
{

    protected $classModel = 'mainModel';
    protected $model = null;
    protected $location = '';
    protected $view = 'index';

    public function  __construct()
    {
        require './models/'.$this->classModel.'.php';
        $this->model = new $this->classModel;
    }

    public function actionIndex(){
        if ($_COOKIE['idInstance'] && $_COOKIE['apiTokenInstance']){
            if (method_exists($this->model, 'madeGetRequest')){
                $array = $this->model->madeGetRequest();
            }
            require './views/'.$this->view.'.php';
        }
        else header('Location: /auth');
    }

    public function actionPost(){
        $this->model->madeRequest($_POST);
        header('Location: /'.$this->location);
    }


}

