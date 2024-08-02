<?php
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

require_once 'config.php'; // Incluir el archivo de configuración donde se define la constante URL

class Router{
    private $controller;
    private $method;
    private $params;

    public function __construct(){
        $this->matchRoute();
    }

    public function matchRoute(){
        $url = explode('/', URL);

        // Obtener el nombre del controlador desde la URL, si no se proporciona, usar HomeController
        $this->controller = isset($url[1]) ? ucfirst($url[1]) . 'Controller' : 'HomeController'; 
        
        // Si se especifica un método en la URL, usarlo, de lo contrario, usar 'index'
        $this->method = isset($url[2]) ? $url[2] : 'index'; 
        
        // Si hay un tercer segmento en la URL, serán los parámetros
        $this->params = isset($url[3]) ? array_slice($url, 3) : []; 
        
        require_once(__DIR__ .  '/controllers/' . $this->controller . '.php');
    }

    public function run(){
        $controller = new $this->controller();
        $method = $this->method;

        if(method_exists($controller, $method)) {
            // Llamar al método del controlador con los parámetros si los hay
            call_user_func_array([$controller, $method], $this->params); 
        } else {
            echo "Método no encontrado.";
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
        }
    }
}
?>
