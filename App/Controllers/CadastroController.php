<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Controllers\AuthController;

class CadastroController extends Action {
    public function bloco () {
        AuthController::validaAutenticacao();
        echo $_SESSION['id'];
        $this->render('cadastro_bloco');
    }

    public function novoBloco () {
        AuthController::validaAutenticacao();

        $bloco = Container::getModel('Bloco');

        $bloco->__set('id_usuario', $_SESSION['id']);
        $bloco->__set('nome_bloco', $_POST['nome_bloco']);
        $bloco->__set('transparencia', $_POST['transparencia']);
        $bloco->__set('ferramenta', $_POST['ferramenta']);
        $bloco->__set('empilhavel', $_POST['empilhavel']);
        $bloco->__set('experiencia', floatval($_POST['experiencia']));
        $bloco->__set('explosao', (int) $_POST['explosao']);

        $bloco->salvar();

        header('Location: /menu?cadastro=sucesso');
    }
}

?>