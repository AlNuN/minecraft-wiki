<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Controllers\AuthController;

class MenuController extends Action {
    public function menu () {
        AuthController::validaAutenticacao();
        $this->render('menu');
    }
}

?>