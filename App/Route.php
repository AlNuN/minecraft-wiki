<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

    protected function initRoutes() {

        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller' => 'AuthController',
            'action' => 'autenticar'
        );

        $routes['menu'] = array(
            'route' => '/menu',
            'controller' => 'MenuController',
            'action' => 'menu'
        );

        $routes['cadastro_bloco'] = array(
            'route' => '/cadastro_bloco',
            'controller' => 'CadastroController',
            'action' => 'bloco'
        );

        $routes['novo_bloco'] = array(
            'route' => '/novo_bloco',
            'controller' => 'CadastroController',
            'action' => 'novoBloco'
        );

        $this->setRoutes($routes);
    }

}

?>