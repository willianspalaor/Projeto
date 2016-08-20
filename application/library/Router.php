<?php

class Router {

    public static function run(Request $request) {

        $controller = $request->getController();
        $action     = $request->getAction();
        $args       = (array) $request->getArgs();

        $controller = ucfirst($controller) . 'Controller'; 
        $src        = BASE_PATH . 'controllers/' . $controller . '.php';

        if(file_exists($src)){

            include_once $src;
            $controller = new $controller();

            if(is_callable(array($controller, $action))) {
                call_user_func(array($controller, $action), $args); 
            }
              
        }
    }
}

