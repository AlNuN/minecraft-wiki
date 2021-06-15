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

        $routes['listar_bloco'] = array(
            'route' => '/listar_bloco',
            'controller' => 'CadastroController',
            'action' => 'listarBloco'
        );

        $routes['cadastro_receita'] = array(
            'route' => '/cadastro_receita',
            'controller' => 'CadastroController',
            'action' => 'receita'
        );

        $routes['nova_receita'] = array(
            'route' => '/nova_receita',
            'controller' => 'CadastroController',
            'action' => 'novaReceita'
        );

        $routes['listar_receita'] = array(
            'route' => '/listar_receita',
            'controller' => 'CadastroController',
            'action' => 'listarReceita'
        );

        $routes['consulta_dados'] = array(
            'route' => '/consulta_dados',
            'controller' => 'CadastroController',
            'action' => 'consultaDados'
        );

        $this->setRoutes($routes);
    }

}

?>