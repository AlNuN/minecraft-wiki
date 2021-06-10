<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Controllers\AuthController;

class CadastroController extends Action {
    public function bloco () {
        AuthController::validaAutenticacao();
        $this->render('cadastro_bloco');
    }

    public function novoBloco () {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }
}

?>