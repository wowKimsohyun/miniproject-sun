<?php

class App {

    // http://localhost/mini-project/home/sayHi/1/2/3
    private $controller = "Home";
    private $action = "sayHi";
    private $param = [];

    function __construct() {
        // Array ( [0] => home [1] => sayHi [2] => 1 [3] => 2 [4] => 3 )
        $arrUrl = $this->UrlProcess();
        echo print_r($arrUrl);

        // Process Controller
        if(file_exists("./MVC/controllers/".$arrUrl[0].".controller.php")) {
            $this->controller = $arrUrl[0];
            unset($arrUrl[0]);
        }
        require_once "./MVC/controllers/".$this->controller.".controller.php";
        $this->controller = new $this->controller;

        // Process Action
        if(isset($arrUrl[1])) {
            if(method_exists($this->controller, $arrUrl[1])){
                $this->action = $arrUrl[1];
            }
            unset($arrUrl[1]);
        }

        // Process param
        $this->param = $arrUrl ? array_values($arrUrl) : [];

        call_user_func_array([$this->controller, $this->action], $this->param);
    }

    function UrlProcess() {
        if( isset($_GET["url"])) {
            return explode("/", trim($_GET["url"],"/"));
        }
    }

}
?>