<?php

namespace app\traits;

use core\Twig;

trait View {

    private function twig(){
        $twig = new Twig;
        $loadTwig = $twig->loadTwig(); //Instância do Twig está aqui!

        $twig->loadExtensions();
        $twig->loadFunctions();
        return $loadTwig;
    }


    public function view($data, $viewPath){
        //o load abaixo é do próprio twig
        $template = $this->twig()->load(str_replace('.', '/', $viewPath). '.html');

        return $template->display($data);
    }
}