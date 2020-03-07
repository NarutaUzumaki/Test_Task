<?php
namespace controller;

use model\Data;
use view\View;

class ControllerBase{
    protected $model;
    protected $view;

    public function __construct(){
        session_start();
        $this->model = new Data();
        $this->view = new View();
    }
}