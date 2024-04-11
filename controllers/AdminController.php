<?php

class AdminController {
    public function home() {
        include 'views/administrador/index.php'; // Incluir la vista del index del administrador
    }

    public function ambientes(){
        include 'views/administrador/ambientes/index.php';
    }
    public function usuarios(){

    }
    public function reportes(){

    }
}

?>
