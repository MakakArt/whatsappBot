<?php 

namespace Core;

class Router
{
    public static function init()
    {
        $request = parse_url("example.com".$_SERVER['REQUEST_URI']);
        $controller = self::getController($request['path']);
        $action = self::getAction($request['path']);
        return self::doAction($controller, $action);
    }

    private static function doAction($controller,  $action)
    {
        $controller_path = "Controllers/$controller.php";
        if (file_exists($controller_path)){
            require (__DIR__.'/../'.$controller_path);
            $controller = new $controller();
            if (is_array($action)){
                if (method_exists($controller, $action["action"])){
                    $action_id = $action["id"];
                    $action_name = $action["action"];
                    return ($controller->$action_name($action_id));
                }
            }
            else {
                if (method_exists($controller, $action)){
                    return ($controller->$action());
                }
            }
        }
        return self::notFound(404, "Страница не найдена");

    }


    private static function getController( $path)
    {
        $path = explode("/", $path);
        $controller = $path[1];
        if(!empty($controller)){
            $controller = ucfirst(strtolower($controller)). "Controller";
            return $controller;
        }
        return 'mainController';
    }




    private static 
    function getAction($path) {
        $path = explode("/", $path);
        if (count($path)>2){
            $action = $path[2];
            return 'action'.ucfirst($action);
        }
        return "actionIndex";
    }

    public static 
    function notFound($code, $message)
    {
        http_response_code($code);
        return ["code" => $code, "error" => $message];
    }
}