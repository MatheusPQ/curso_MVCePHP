<?php

namespace core;

use app\classes\Uri;

class Parameters {

    private $uri;

    public function __construct(){
        $this->uri = Uri::uri();
    }


    public function load(){
        return $this->getParameter();
    }

    private function getParameter(){
        if(substr_count($this->uri, '/') > 2) {
            $parameter = array_values(array_filter(explode('/', $this->uri)));

            return (object) [
                'parameter' => filter_var($parameter[2], FILTER_SANITIZE_STRING), //Filtra os valores da url (de códigos maliciosos)
                'next' => filter_var($this->getNextParameter(2), FILTER_SANITIZE_STRING), 
            ];
        } //Se tiver mais de duas barras, é pq tem parâmetro na uri. https://devclass.com.br/curso/MÉTODO/PARÂMETRO

        // dd($parameter); //Indice 2 é o parâmetro
    }

    private function getNextParameter($actual){
        $parameter = array_values(array_filter(explode('/', $this->uri)));

        //Precisa pegar o índice desse parâmetro + 1 pra pegar o next
        return $parameter[$actual + 1] ?? $parameter[$actual];
        //retorna um.. se for nulo (??) retorna o outro
    }
}

?>