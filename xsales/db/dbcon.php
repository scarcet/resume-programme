<?php
require_once('new_config.php');

class Dbcon{
    public $conn;

    public function __construct(){
        $this->opendb();
        
    }

    public function opendb(){
        $this->conn = new mysqli(host, user, pass, dbn);
        if($this->conn->connect_error){
            die('Connection Failed'. $this->conn->connect_error);
        }
    }

    public function query($sql){
        $result = $this->conn->query($sql);
        return $result;
    }

    public function escape_string($input){
        $escaped_string = $this->conn->real_escape_string($input);
        return $escaped_string;

    }

    public function the_last_id(){
        return $this->conn->insert_id;
    }
    
}
$dbcon = new Dbcon
?>