<?php

class Order extends Cart{

    public static $dbtable = "orders";
    public static $dbtable_field = array('id', 'name', 'email', 'address', 'pro_id', 'pro_name', 'order_date');

    public $id;
    public $name;
    public $email;
    public $address;
    public $pro_id;
    public $pro_name;
    public $order_date;

    public function setpro_id(){
        $ids = array();
        $results = $this->findall_cart();
        foreach($results as $result){
            $ids[] = $result->id;
        }
        $this->pro_id = implode(" | ", $ids);
    }

    public function setpro_name(){
        $names = array();
        $results = $this->findall_cart();
        foreach($results as $result){
            $names[] = $result->pro_name;
        }
        $this->pro_name = implode(" | ", $names);
    }

    public function take_order(){
        $this->setpro_id();
        $this->setpro_name();
        $this->create();
    }

    
}

?>