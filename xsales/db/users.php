<?php

class Users{

    public static $dbtable = "user";
    public static $dbtable_field = array('id', 'user_name', 'user_email', 'user_adrs', 'password', 'role');
    public $id;
    public $user_name;
    public $user_email;
    public $user_adrs;
    public $password;
    public $role;

    private static function called_class(){
        $new_class = get_called_class();
        $called_class = new $new_class;
        return $called_class;
    }

    //CREATE METHODS

    public function properties(){
        $property = array();
          
        foreach(static::$dbtable_field as $db_field){
            if(property_exists($this, $db_field)){
                $property[$db_field] = $this->$db_field;

            }

        }
        return $property;

    }

    public function clean_properties(){
        global $dbcon;
        $cleaned = array();
        foreach($this->properties() as $keys => $values){
            $cleaned[$keys] = $dbcon->escape_string($values);
        }
        return $cleaned;
    }

    public function create(){
        global $dbcon;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$dbtable . "(" . implode(",", array_keys($properties)). ")";
        $sql.= "VALUES ('". implode("','", array_values($properties)). "')";
        if($dbcon->query($sql)){
            $this->id = $dbcon->the_last_id();
            return true;
        }
        else{
            return false;
        }
    }

    
// READ METHODS

public static function findall(){
    $sql = "SELECT * FROM " .static::$dbtable ." ";
    $result = static::findthisquery($sql); 
    return $result;
}

public static function findid($id){
    $sql = "SELECT * FROM " .static::$dbtable . " WHERE id=" . $id. " ";
    $result = static::findthisquery($sql);
    return !empty($result) ? array_shift($result) : false;

}
    public static function verifyuser($eml, $pass){
        global $dbcon;
        $email = $dbcon->escape_string($eml);
        $password = $dbcon->escape_string($pass);
        $sql = "SELECT * FROM ".static::$dbtable . " WHERE user_email ='{$email}' AND password ='{$password}'";
        $result = static::findthisquery($sql);
        return !empty($result)? array_shift($result) : false;
    }

    public static function findthisquery($sql){
        global $dbcon;
        $resultarr = $dbcon->query($sql);
        $obj_var_arr = array();
        
        while($row = $resultarr->fetch_assoc()){
            $obj_var_arr[] = static::instation_assign($row);
        }
        return $obj_var_arr;
    }

    public static function instation_assign($theresult){       
        
        $called_obj = static::called_class();
        
        foreach($theresult as $the_property => $value){
            $obj_var = get_object_vars($called_obj);
        if(array_key_exists($the_property, $obj_var)){
            $called_obj->$the_property = $value;
        }
    
     }
        return $called_obj;
    }

    public static function count_all(){
        global $dbcon;
        $sql = "SELECT COUNT(*) FROM ". static::$dbtable;
        $result_set = $dbcon->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }
}
?>

