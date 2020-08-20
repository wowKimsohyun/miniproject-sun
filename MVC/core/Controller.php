<?php
class Controller {

    public function Model($model) {
        require_once "./MVC/models/".$model.".model.php";
        return new $model;
    }

    public function View($view, $data = []) {
        require_once "./MVC/views/".$view.".view.php";
    }
}
?>