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

    public function receita () {
        AuthController::validaAutenticacao();
        $this->render('cadastro_receita');
    }

    public function novaReceita () {
        AuthController::validaAutenticacao();
        $receita = Container::getModel('Receita');

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        $item = 1;
        $order = '';
        for($i=1;$i<=9;++$i) {
            $pi = $_POST[(string)$i."-item"];
            $oi = "item_".(string)$item;

            if ($pi != '') {
                if (!$receita->__isset($oi) && property_exists($receita, $oi)
                    && $pi != $receita->__get('item_1') && $pi != $receita->__get('item_2')){
                    $receita->__set($oi, $pi);
                    ++$item;
                }
                if($pi == $receita->__get('item_1')) {
                    $order .= '1';
                } elseif ($pi == $receita->__get('item_2')) {
                    $order .= '2';
                } elseif ($pi == $receita->__get('item_3')) {
                    $order .= '3';
                } 
            } else {
                $order .= '.';
            }
        }

        $receita->__set('ordem', $order);
        $receita->__set('nome_item', $_POST['nome-item']);

        // echo '<pre>';
        // print_r($receita);
        // echo '</pre>';
        $receita->salvar();

        header('Location: /menu?cadastro=sucesso');

    }
}

?>