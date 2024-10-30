<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
// db.php

class Database {
    public static function connect() {
        $db = new mysqli("localhost", "root", "", "reportesambientes");
        $db->query("SET NAMES 'utf8'");
        return $db;
<<<<<<< HEAD
    }
}
?>
=======
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
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
