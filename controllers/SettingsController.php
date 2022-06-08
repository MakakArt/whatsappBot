<?php

require "mainController.php";

class settingsController extends mainController
{
    protected $classModel = "SetSettingsModel";
    protected $model = null;
    protected $location = 'settings';
    protected $view = 'setsettings';

}
