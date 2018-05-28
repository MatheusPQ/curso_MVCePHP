<?php

namespace app\controllers\portal;

use app\controllers\ContainerController;

class CursoController extends ContainerController {
    public function index(){

    }

    public function show($request){
        // dd($request->next); 
        // dd($request->next->next); 
        // dd($request->parameter); 

        // $cursos = new app\models\portal\Cursos;
        // $cursoEncontrado = $cursos->find('slug', $request->parameter);
        $this->view([
            'title' => 'Curso',
            'curso' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ullam! Ex atque laborum porro saepe doloremque quia animi. Accusantium ab esse nemo sunt consequatur sint deserunt maiores autem sed eos?',
            // 'curso' => $cursoEncontrado,
        ], 'portal.curso');
        //Manda pra trait View, método view.
    }
}