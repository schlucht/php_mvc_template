<?php

class Controller
{
    function view(string $view, array $data=[])
    {
        if (file_exists("../app/views/" . $view . ".php")) {
            include "../app/views/" . $view . ".php";
        }else{
            include "../app/views/404.php";
        }
    }
    function loadModel(string $model)
    {
        if (file_exists("../app/models/" . $model . ".php")) {
            include "../app/models/" . $model . ".php";
            return $mode = new $model();
        }

        return false;
    }
}