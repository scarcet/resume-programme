<?php
class Product extends Users{
    public static $dbtable = "products";
    public static $dbtable_field = array('id', 'pro_name',
'pro_price', 'pro_qty', 'pro_size', 'pro_category', 'pro_subcategory', 'pro_datepost', 'pro_img', 'user_id');

    public $id;
    public $pro_name;
    public $pro_price;
    public $pro_qty;
    public $pro_size;
    public $pro_category;
    public $pro_subcategory;
    public $pro_datepost;
    public $pro_img;
    public $user_id;

   

    public static function promo_pro(){
        $promo_item = "Television";
        $sql = "SELECT * FROM " .static::$dbtable . " WHERE pro_subcategory = '{$promo_item}'";
        $result = static::findthisquery($sql);
        return !empty($result)? array_shift($result) : false;
    }

}

?>