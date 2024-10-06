<?php

class Cookies{

    public $cookie_nme     = "visitor";
    public $visitor_status = true;
    public $time           = 86400 * 60;

    public function set_cookie(){
        setcookie($this->cookie_nme, '1', time() + $this->time);
    }

    public function check_cookie(){
        if(isset($_COOKIE[$this->cookie_nme])){
            $this->visitor_status = false;
        }
        else{
            $this->set_cookie();
            $this->visitor_status = true;
        }
    }

    public function check_visitstatus(){
        $msg = $this->visitor_status ? "Welcoming you newly to Xecommerce website" : "Welcome back to Xecommerce website";
        return $msg;
    }
}

?>