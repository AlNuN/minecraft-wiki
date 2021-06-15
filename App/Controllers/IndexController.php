<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

    public function index() {
        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
        $this->render('index');
    }

    public function inscreverse() {
        $this->view->usuario = array(
            'email' => '',
            'senha' => ''
        );

        $this->view->erroCadastro = false;
        $this->render('inscreverse');

    }

    public function registrar(){

        $usuario =  Container::getModel('Usuario');
    
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);
    
        if($usuario->validarCadastro()){
            if(count($usuario->getUsuarioPorEmail()) > 0) {
    
                $this->view->usuario = array (
                    'email' => $_POST['email'].' (email já cadastrado)',
                    'senha' => $_POST['senha']
                );
                $this->view->erroCadastro = 2;
                $this->render('inscreverse');
    
            } else {
                $usuario->__set('senha', md5($_POST['senha']));
                $usuario->salvar();
                $this->render('index');
            }
    
        } else {
            $this->view->usuario = array(
                'email' => $_POST['email'],
                'senha' => $_POST['senha']
            );
            $this->view->erroCadastro = 1;
            $this->render('inscreverse');
        }
    }
}


?>