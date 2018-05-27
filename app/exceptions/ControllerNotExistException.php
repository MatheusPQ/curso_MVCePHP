<?php

namespace app\exceptions;

//Só isso é suficiente
class ControllerNotExistException extends \Exception {}
    //Contrabarra \ para pegar o namespace global.. 

//Da documentação do PHP
// function fopen() { 
//     /* <código aqui...> */
//     $f = \fopen(...); // call global fopen
//     return $f;
// } 