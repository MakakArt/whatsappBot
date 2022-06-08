<?php

require "mainController.php";

class authController extends mainController
{

    protected $classModel = 'authModel';
    protected $model = null;
    protected $location = '';
    protected $view = 'auth';

    public function actionIndex(){
        require './views/'.$this->view.'.php' ;
    }

}

