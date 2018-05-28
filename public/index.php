<?php
use core\Controller;
use core\Method;
use core\Parameters;
require '../bootstrap.php'; //Configurações iniciais

//https://devclass.com.br/curso/show/12/23

try {
    
    $controller = new Controller;
    $controller = $controller->load(); //Verifica se o controlador existe, e retorna uma instância dele

    $method = new Method;
    $method = $method->load($controller); //show

    $parameters = new Parameters;
    $parameters = $parameters->load();

    $controller->$method($parameters); //Deve ser desse jeito, pois é o método da variavel acima
    //Por exemplo: 
    // $controller = CursoController
    // $method = show
    // $parameters = (object) [
        //     'parameter' => 'curso-de-php',
        //     'next' => 'algum-outro-parametro-seguinte'
        // ];
    //Logo, CursoController->show($parameters);
    // dd($controller);
} catch(\Exception $e){
    dd($e->getMessage());
}