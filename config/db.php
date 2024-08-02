<?php
<<<<<<< HEAD
// db.php

class Database {
    public static function connect() {
        $db = new mysqli("localhost", "root", "", "reportesambientes");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
?>
=======
class Database{
    public static function connect(){
        
    $db = new mysqli("localhost", "root", "","reportesambientes");
    $db->query("SET NAMES 'utf8'");
    return $db;
    }
}
?>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
