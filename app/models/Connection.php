<?php

namespace app\models;
use PDO;
use app\classes\Bind;

class Connection {
    public static function connect(){

        // $config = require '../../config.php';
        $config = (object)Bind::get('config')->database;

        // $pdo = new PDO("mysql:host=localhost;dbname=curso_mvc;charset=utf8", "root", "root");
        // $pdo->setAttribute("PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION"); 
        // //Erros que forem acontecendo serão mostrados através de um exception

        // // $pdo->setAttribute("PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC");
        // //Retorna um array.. $user['name']

        // $pdo->setAttribute("PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ");
        // //Vai retornar um obj.. $user->name

        $pdo = new PDO("mysql:host=$config->host;dbname=$config->dbname;charset=$config->charset", $config->username, $config->password, $config->options);

        return $pdo;
        
    }
}