<?php
namespace controller;

use model\Data;
use view\View;
//перевроверить в работе
class Controller{
    protected $model;
    protected $view;

    public function __construct(){
        session_start();
        $this->model = new Data();
        $this->view = new View();
    }
}