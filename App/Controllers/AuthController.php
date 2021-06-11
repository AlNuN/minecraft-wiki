<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

  public function autenticar() {

    $usuario = Container::getModel('Usuario');

    $usuario->__set('email', $_POST['email']);
    $usuario->__set('senha', $_POST['senha']);

    $usuario->autenticar();

    if($usuario->__get('id') != '') {

      session_start();

      $_SESSION['id'] = $usuario->__get('id');

      header('Location: /menu');

    } else {
      header('Location: /?login=erro');
    }
  }

    public function sair(){
        session_start();
        session_destroy();
        header('Location: /');
    }

    public static function validaAutenticacao() {
        session_start();
    
        if(!isset($_SESSION['id']) || $_SESSION['id'] == ''){
            header('Location: /?login=erro');
        }
    }


}

?>