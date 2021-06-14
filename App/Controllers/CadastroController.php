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

    public function listarBloco () {
        AuthController::validaAutenticacao();

        $bloco = Container::getModel('Bloco');
        $bloco->__set('id_usuario', $_SESSION['id']);

        $this->view->blocos = $bloco->getAll();

        $this->render('listar_bloco');
    }
}

?>