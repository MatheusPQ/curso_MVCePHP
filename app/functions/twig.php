<?php

//userTeste seria o valor que vai ser recuperado lá na view.
// $user = new \Twig_SimpleFunction('userTeste', function($index){
// $user = new \Twig_SimpleFunction('user', function($index){
//     return 'dados user';
// });

// $teste = new \Twig_SimpleFunction('teste', function($index){
//     return 'dados teste';
// });

// $this->twig()->addFunction($user);
// $this->twig()->addFunction($teste);

//É feito um require deste arquivo no Twig.php, por isso consegue acessar functions[], functionsToView aqui 
$this->functions[] = $this->functionsToView('user', function(){
    return 'dados user';
});

$this->functions[] = $this->functionsToView('teste', function(){
    return 'dados teste';
});