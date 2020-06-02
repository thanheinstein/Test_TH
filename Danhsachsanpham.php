<?php require_once("Entities/product.class.php"); ?>

<?php
    include_once("header.php");
    $danhsachsanpham = Product:: Danhsachsanpham();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="author" content="HUTECH">
    <link href="/LAB3/Content/css/Body.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Chi_Tiet_San_Pham.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Danh_Sach_Thiet_Bi.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Demo_Form.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Form_Dang_Ky.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Form_Dang_Nhap.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Gio_Hang.css" rel="stylesheet"/>
    <link href="/LAB3/Content/css/Hang_San_Xuat.css" rel="stylesheet"/>
    <link href="/LAB3Content/css/Slide_Down_Box_Menu.css" rel="stylesheet"/>
    <title>Cửa Hàng Di Động</title>
</head>
<body>
<div class="wrapper-product">
    <?php
        foreach ($danhsachsanpham as $item)
        {
          ?>
            <div class="product">
            <img class="product-img" src="<?php echo "/LAB3/".$item["Picture"];?>">
            <marquee class="product-name" onmouseover="this.stop();" onmouseout="this.start();" direction="left" scrollamount=5>
                              <?php echo $item["ProductName"]; ?>
            </marquee>
            <div class="product-price"><?php echo number_format($item["Price"]); ?><span>đ</span></div>
            </div>
          <?php
        }
        ?>
</div>
    <script src="/LAB3/Content/js/Slide_Down_Box_Menu/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="/LAB3/Content/js/Slide_Down_Box_Menu/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="/LAB3/Content/js/Slide_Down_Box_Menu/Slide_Down_Box_Menu.js" type="text/javascript"></script>
</body>
</html>