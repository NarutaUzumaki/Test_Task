<?php
namespace view;

class View{
    public function makeView($view, $DBData = null){
        include __DIR__.'/views/'.$view.'-view.php';
    }
}