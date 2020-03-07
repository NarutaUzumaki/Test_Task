<?php
    //require_once 'app/data/Config.php';
    require 'app/autorun.php';

    $controller = new App();
    $controller->run();
    //main index
    //написать маршрутизатор, чтоб он сам все подключал и давал свободный ход по страницам