<?php


class App{
    private $controller;

    public function __construct(){
        session_start();
    }

    public function run(){
        $controller = 'OperationController';
        $method = 'index';

        $url = $this->parseURL();

        if (!empty($url[1])) {
            $controller = ucfirst($url[1] . 'Controller');
        }
        if (!empty($url[2])) {
            $method = $url[2];
        }


        //контроль аутентификации
        if (!in_array($method, array('login', 'register', 'signoutFromAcc', 'checkUser', 'createUser'))) {
            if(!$_SESSION['user']) {
                $controller = 'UserController';
                $method = 'login';
            }
        }

        if (file_exists('app/controller/'.$controller.'.php')){
            include ('app/controller/'.$controller.'.php');
            $controller = 'Controller\\'.$controller;

            $this->controller = new $controller();

            if (method_exists($this->controller,$method)){
                $this->controller->$method();
            }else{
                die("Method ".$method." not found in ".$controller);
            }
        }else{
            die("Class ".$controller." not found");
        }
    }

    public function parseURL(){
        $parseURL = explode('/', str_replace('?','/', $_SERVER['REQUEST_URI']));
        //echo ($_SERVER['REQUEST_URI']);
        return $parseURL;
    }
}