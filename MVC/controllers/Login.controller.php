<?php
class Login extends Controller {
    function Login() {
        $this->View("Layout", ["Login" => "Login"]);
    }
}
?>