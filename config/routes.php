<?php

/**
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->connect('/hello', ['controller' => 'Hello', 'action' => 'hello']);

    $routes->connect('/users', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('users/login', ['controller' => 'Users', 'action' => 'login']);

    $routes->connect(
        '/users/view/{id}',
        ['controller' => 'Users', 'action' => 'view'],
        ['pass' => ['id'], 'id' => '\d+']
    );

    $routes->connect(
        '/users/edit/{id}',
        ['controller' => 'Users', 'action' => 'edit'],
        ['pass' => ['id'], 'id' => '\d+']
    );

    $routes->connect(
        '/users/delete/{id}',
        ['controller' => 'Users', 'action' => 'delete'],
        ['pass' => ['id'], 'id' => '\d+']
    );

    $routes->scope('/', function (RouteBuilder $builder): void {
        $builder->connect('/', ['controller' => 'hello', 'action' => 'hello']);
        $builder->connect('/index', ['controller' => 'hello', 'action' => 'index']);
        $builder->connect('/pages/*', 'Pages::display');
        $builder->fallbacks();
    });

    $routes->prefix('admin', function (RouteBuilder $builder) {
        $builder->connect('/services', ['controller' => 'Services', 'action' => 'index']);
        $builder->connect('/services/add', ['controller' => 'Services', 'action' => 'add']);
        $builder->connect('/services/edit/*', ['controller' => 'Services', 'action' => 'edit']);
        $builder->connect('/services/view/*', ['controller' => 'Services', 'action' => 'view']);
        $builder->connect('/services/delete/*', ['controller' => 'Services', 'action' => 'delete']);
    });
};
