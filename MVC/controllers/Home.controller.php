<?php
class Home extends Controller{
    function SayHi() {
        // Get DB
        $user = $this->Model("User");
        echo $user->GetUser();

        // View
    }

    function Show() {
        $number = 27;
        $this->View("Login", ["number" => $number]);
    }
}