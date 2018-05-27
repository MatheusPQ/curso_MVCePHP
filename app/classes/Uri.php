<?php

//Classe para trabalhar com Uri (uri da url)

//https://devclass.com.br/curso/show/12/23
//https://devclass.com.br/curso/show/?page=12
//No caso acima, o PHP_URL_PATH vai ignorar o parâmetro de pág

namespace app\classes;

class Uri {

    public static function uri(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Função do próprio PHP
        //Segundo parâmetro é uma constante.
        //parse_url divide a url em componentes
    }
}

?>