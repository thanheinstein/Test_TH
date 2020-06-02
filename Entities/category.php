<?php
require_once("config/db.class.php");
class category
{
    public $CateID;
    public $CategoryName;
    public $Description;

    public function __construct($Category_Name,$Description)
    {
        $this->CategoryName = $Category_Name;
        $this->Description = $Description;
    }

    public static function DanhSachLoaiSanPham()
    {
        $db = new Db();
        $sql = "SELECT * FROM Category";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>