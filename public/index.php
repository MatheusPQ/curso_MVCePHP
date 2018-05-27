<?php
use core\Controller;
require '../bootstrap.php'; //Configurações iniciais

//https://devclass.com.br/curso/show/12/23


try {
    
    $controller = new Controller;
    $controller = $controller->load();
    dd($controller);
} catch(\Exception $e){
    dd($e->getMessage());
}

// $method = new Method;
// $method = $method->getMethod();

// $parameters = new Parameters;
// $parameters = $parameters->getParameters();

// $controller->method($parameters);

