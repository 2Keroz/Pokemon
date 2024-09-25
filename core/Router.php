<?php

class Router
{
    public function start()
    {
        try {
            $url = $_SERVER["REQUEST_URI"];
            if ($url !== "/") {
                $controller = ucfirst(explode("/", $url)[1]) . "Controller";
                if (class_exists($controller)) {
                    $controllerObject = new $controller();
                    if (method_exists($controllerObject, "index")) {
                        $controllerObject->index();
                    } else {
                        throw new Exception("pas de méthode index dans ce controller", 1);
                    }
                } else {
                    throw new Exception("ce controller n'existe pas", 1);
                }
            } else {
                $controllerObject = new MainController();
                $controllerObject->index();
            }
        } catch (Exception $e) {
           require_once(__DIR__."/../views/Error404.php");
        }
    }
}
