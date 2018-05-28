<?php

namespace core;

use app\classes\Uri;
use app\exceptions\ControllerNotExistException;

class Controller {

    private $uri;
    private $controller;
    private $namespace;
    private $folders = [
        'app\controllers\portal',
        'app\controllers\admin'
    ];
    
    public function __construct(){
        $this->uri = Uri::uri();
    }

    public function load(){
        if($this->isHome()){ //Se for a pág inicial
            return $this->controllerHome();
        }  
        return $this->controllerNotHome();
    }

    private function controllerHome(){
        if(!$this->controllerExist('HomeController')){
            throw new ControllerNotExistException("Esse controller não existe.");
        }

        return $this->instantiateController();
    }

    private function controllerNotHome(){
        $controller = $this->getControllerNotHome();

        if(!$this->controllerExist($controller)){
            throw new ControllerNotExistException("Esse controller não existe.");            
        }

        return $this->instantiateController();
        
    }

    private function getControllerNotHome(){
        if( substr_count($this->uri, '/') > 1){ //Se tiver mais que uma barra
            // list($controller) = explode('/', $this->uri);

            //explode vai separar os elementos da uri de acordo com as barras, e transformar em array
            //Logo, item antes da barra é 0, item depois da barra é 1, depois da segunda barra é 2, etc..
            //Array filter vai remover índices cujo valores são vazios. Nesse caso, antes da primeira barra na URI não tem nada.. logo índice 0 será removido
            //Mas ai o array vai começar do 1 (pois o 0 foi removido). Para isso serve o array_values, para resetar os índices
            // dd(array_values(array_filter(explode('/', $this->uri))));
            
            list($controller) = array_values(array_filter(explode('/', $this->uri)));
            return ucfirst($controller).'Controller';
        }

        return ucfirst(ltrim($this->uri, '/')).'Controller';

        //https://devclass.com.br/produto
        //iria aparecer /produto
        // dd(ucfirst(ltrim($this->uri, '/')).'Controller');
        //Vai tirar a barra, deixar a primeira letra maiuscula, e adicionar Controller no final!

    }

    //Verificar se está ou ñ na pagina inicial
    private function isHome(){
        return ($this->uri == '/');
    }

    private function controllerExist($controller){
        $controllerExist = false;

        foreach($this->folders as $folder){
            if(class_exists($folder.'\\'.$controller)){
                $controllerExist = true;
                $this->namespace = $folder;
                $this->controller = $controller;
            }
        }

        return $controllerExist;
    }

    private function instantiateController(){
        $controller = $this->namespace.'\\'.$this->controller; //namespace é a pasta ($folder)
        return new $controller; //Instanciando o controller
        
    }

}