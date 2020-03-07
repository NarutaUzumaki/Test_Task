<?php
namespace controller;

use model\User;
//--

class UserController extends Controller {
    public function __construct(){
        parent::__construct();
    }

    function register(){
        $this->view->makeView('register');
    }

    function login(){
        $this->view->makeView('login');
    }

    function signoutFromAcc(){
        session_start();
        unset($_SESSION['user']);
        header('Location: /user/login');
    }

    function checkUser(){
        if($user = $this->model->getUser($_POST['login'])){
            if ($user->checkUserPasswd($_POST['passwd'])){
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /operation/index');
            }else{
                die("Incorrect password or name, pls try again.");
            }
        }
    }

    function createUser(){
        if ($_POST['passwd'] == $_POST['passwd_repeat']) {
            if (!$user = $this->model->getUser($_POST['login'])){
                $User = new User();
                $User->setName($_POST['login']);
                $User->setEmail($_POST['email']);
                $User->setPasswd($_POST['passwd']);
                $this->model->insertUser($User);
                //die($User->getId());
                //при регистрации не получает id пользователя
                //надо его еще раз считать с бд
                $User = $this->model->getUser($_POST['login']);
                session_start();
                $_SESSION['user'] = $User;
                header('Location: /operation/index');
            }
        }else{
            die("Password are not same!");
        }
    }
}