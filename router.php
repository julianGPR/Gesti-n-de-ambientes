<?php
<<<<<<< HEAD
require_once 'config.php';
=======
<<<<<<< HEAD
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
=======
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

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
<<<<<<< HEAD
            header("HTTP/1.0 404 Not Found");
            echo "Controlador $controllerName no encontrado.";
=======
            echo "Método no encontrado.";
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
        }
    }
}
?>
