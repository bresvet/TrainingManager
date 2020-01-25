<?php

require_once 'Controllers\SecurityController.php';
require_once 'Controllers\HomeController.php';
require_once 'Controllers\TrainingController.php';
require_once 'Controllers\AdminController.php';


class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'registration' => [
                'controller' => 'SecurityController',
                'action' => 'registration'
            ],
            'home' => [
                'controller' => 'HomeController',
                'action' => 'home'
            ],
            'activities' => [
                'controller' => 'TrainingController',
                'action' => 'training'
            ],
            'signedup' => [
                'controller' => 'TrainingController',
                'action' => 'signedup'
            ],
            'trainings' => [
                'controller' => 'TrainingController',
                'action' => 'yourtrainings'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'admin'
            ],
            'userdeleted' => [
                'controller' => 'AdminController',
                'action' => 'userdeleted'
            ]


        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}