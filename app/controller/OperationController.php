<?php
namespace controller;

use DateTime;
use model\Operation;


class OperationController extends ControllerBase{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $operations = $this->model->getOperationsForUser($_SESSION['user']->getId());
        $this->view->makeView('main', $operations);
    }

    public function create(){
        $this->view->makeView('create');
    }

    public function edit(){
        $operation = $this->model->getOperationById($_GET['id']);
        //написать метод для получени конкретной операции через ее id
        //getOperationsForUser не подходит
        $this->view->makeView('edit', $operation);
    }

    public function store(){
        $dateTime = new DateTime($_POST['date']. ' ' .$_POST['time']);

        $operation = new Operation();
        $operation->setTitle($_POST['title']);
        $operation->setDescription($_POST['description']);
        $operation->setAmount($_POST['amount']);
        $operation->setDate($dateTime);
        $operation->setUserId($_SESSION['user']->getId());
        //die($operation->getUserId());
        $this->model->insertOperation($operation);

        header('Location: /operation/index');
    }

    public function updateOperation(){
        $operation = new Operation();
        $dateTime = new DateTime($_POST['date'].''.$_POST['time']);

        $operation->setId($_GET['id']);
        $operation->setTitle($_POST['title']);
        $operation->setDescription($_POST['description']);
        $operation->setAmount($_POST['amount']);
        $operation->setDate($dateTime);
        $this->model->updateOperation($operation);

        header('Location: /operation/index');
    }

    public function delete(){
        $id = $_GET['id'];
        $this->model->deleteOperation($id);
        header('Location: /operation/index');
    }
}