<?php

namespace core;

class Twig {
    
    private $twig;
    private $functions = [];

    public function loadTwig(){
        $this->twig = new \Twig_Environment($this->loadViews(), [
            'debug' => true,
            // 'cache' => '/cache',
            'auto_reload' => true
        ]);

        return $this->twig;
    }

    private function loadViews(){
        return new \Twig_Loader_Filesystem('../app/views');//Caminho das views
        //O resto do caminho vem da função show que chamou a trait.
    }

    public function loadExtensions(){ //Carrega extensões do Twig
        //Métodos do próprio Twig
        return $this->twig->addExtension(new \Twig_Extensions_Extension_Text());
    }

    private function functionsToView($name, \Closure $callback){
        return new \Twig_Function($name, $callback);
    }

    public function loadFunctions(){
        require '../app/functions/twig.php';

        foreach ($this->functions as $key => $value) {
            $this->twig->addFunction($this->functions[$key]);
        }
    }
}

?>