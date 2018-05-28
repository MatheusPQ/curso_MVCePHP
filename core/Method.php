<?php

namespace core;

use app\classes\Uri;
use app\exceptions\MethodNotExistException;

//https://devclass.com.br/curso
//Nesse caso, vai pegar o método index.

class Method {
    private $uri;

    public function __construct(){
        $this->uri = Uri::uri();
    }

    public function load($controller){ //Já vai vir instanciado o controller
        $method = $this->getMethod();

        //Verifica se um método existe na classe. Recebe uma instância da classe e o método em si.
        if(!method_exists($controller, $method)) {
            throw new MethodNotExistException("Esse método não existe: {$method}");
            
        } 
        return $method;
    }

    private function getMethod(){

        if(\substr_count($this->uri, '/') > 1){
            // list($controller, $method) = explode('/', $this->uri);
            
            list($controller, $method) = array_values(array_filter(explode('/', $this->uri)));
            return $method;
        } //Se tiver mais de uma barra, é pq tem o método na uri. https://devclass.com.br/curso/MÉTODO

        return 'index';

    }
}