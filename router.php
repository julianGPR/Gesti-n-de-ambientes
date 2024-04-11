<?php
require_once 'config.php'; // Incluir el archivo de configuración donde se define la constante URL

class Router{
    private $controller;
    private $method;

    public function __construct(){
        $this->matchRoute();
    }

    public function matchRoute(){
        $url = explode('/', URL);

        $this->controller = $url[1]; // Obtener el nombre del controlador desde la URL
        $this->method = isset($url[2]) ? $url[2] : 'index'; // Si se especifica un método en la URL, usarlo, de lo contrario, usar 'index'

        $this->controller = $this->controller . 'Controller';

        require_once(__DIR__ .  '/controllers/' . $this->controller . '.php');
    }

    public function run(){
        $controller = new $this->controller();
        $method = $this->method;
        $controller->$method();
    }
}
?>
