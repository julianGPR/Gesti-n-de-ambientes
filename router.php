<?php
require_once 'config.php';

class Router {
    public function run() {
        $url = isset($_GET['url']) ? $_GET['url'] : 'login/home';
        $urlSegments = explode('/', $url);

        $controllerName = ucfirst($urlSegments[0]) . 'Controller';
        $methodName = isset($urlSegments[1]) ? $urlSegments[1] : 'home';

        $controllerFile = __DIR__ . '/controllers/' . $controllerName . '.php';

       

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();

            if (method_exists($controller, $methodName)) {
            
                $params = array_slice($urlSegments, 2);
                call_user_func_array([$controller, $methodName], $params);
            } else {
                header("HTTP/1.0 404 Not Found");
                echo "Método $methodName no encontrado en el controlador $controllerName.";
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "Controlador $controllerName no encontrado.";
        }
    }
}

?>
