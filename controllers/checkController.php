<?php

require "mainController.php";

class checkController extends mainController
{
    protected $classModel = "checkModel";
    protected $model = null;
    protected $location = 'check';
    protected $view = 'check';


    public function actionPost(){
        $result = $this->model->madeRequest($_POST);
        require './views/checkresult.php';
    }

}