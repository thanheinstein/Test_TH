<?php
require_once("config/db.class.php");
class Product
{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $decscription;
    public $picture;


    public function __construct($product_Name, $cate_ID, $price, $quantity, $decscription, $picture)
    {
        $this->productName = $product_Name;
        $this->cateID = $cate_ID;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->decscription = $decscription;
        $this->picture = $picture;
    }
    public static function DanhSachSanPham()
    {
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public function save()
    {
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this->picture['name'];
        $filepath = "Content/img/".$user_file;
        if (move_uploaded_file($file_temp,$filepath) == false)
        {
            return false;
        }
        $db = new Db();
        $sql = "INSERT INTO Product ( ProductName, CateID, Price, Quantity, Description, Picture) 
        VALUES ('$this->productName','$this->cateID','$this->price','$this->quantity','$this->decscription','$filepath')";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>
