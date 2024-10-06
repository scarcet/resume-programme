<?php

class Session{
    public $signedin = false;
    public $id;

    public function __construct(){
        session_start();
        $this->check_seslogin();
        
    }

    public function check_seslogin(){
        if(isset($_SESSION['id'])){
            $this->id = $_SESSION['id'];
            $this->signedin = true;
        }
        else{
            unset($this->id);
            $this->signedin = false;
        }
    }

    public function checksignin(){
        return $this->signedin;
    }

    public function login($user){
        if($user){
            $this->id = $_SESSION['id'] = $user->id;
            $this->signedin = true;
        }

    }

}
$session = new Session()
?>