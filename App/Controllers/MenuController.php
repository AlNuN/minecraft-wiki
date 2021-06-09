<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class MenuController extends Action {

    public function validaAutenticacao() {

        session_start();
    
        if(!isset($_SESSION['id']) || $_SESSION['id'] == ''){
            header('Location:/?login=erro');
        }
    }

    public function menu () {
        $this->validaAutenticacao();
        $this->render('menu');
    }

}

?>