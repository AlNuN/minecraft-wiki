<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Controllers\AuthController;

class MenuController extends Action {
    public function menu () {
        AuthController::validaAutenticacao();
        $this->view->cadastro = isset($_GET['cadastro']) ? $_GET['cadastro'] : '';
        $this->render('menu');
    }
}

?>