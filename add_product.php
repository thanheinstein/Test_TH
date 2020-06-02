<?php
require_once("Entities/product.class.php");
require_once("Entities/category.php");
    if(isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtcateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];
        $newProduct = new Product ($productName,$cateID,$price,$quantity,$description,$picture);
        if(empty($productName && $cateID ))
        {
            header("Location: addProduct.php?failure");
        }
        else
        {
            $newProduct->save();
            header("Location: addProduct.php?inserted");
        }
    }
?>
<!------------------------------------------------------------------>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="HUTECH">
        <link href="site.css" rel="stylesheet"/>
        <link href="Demo_Form.css" rel="stylesheet"/>
        <link href="Form_Dang_Nhap.css" rel="stylesheet"/>
        <title>Project training - Xây dựng Website bán hàng</title>
    </head>
    <body>

    <div class="container">
        <div class="main-title">Thêm Sản Phẩm Mới</div>
            <?php
            if (isset($_GET["failure"]))
            {
                echo "<div class='message failed'>Hãy điền đầy đủ thông tin !</div>";
            }

            if (isset($_GET["inserted"]))
            {
                echo "<div class='message success'>Thêm sản phẩm thành công!</div>";
            }
            ?>
        <form class="demoform" enctype="multipart/form-data" method="post">
            <div class="form-row">
                <div class="label-wrapper" style="color:red">Tên sản phẩm :</div>
                <div class="element-wrapper">
                    <input class="form-text" type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : "" ; ?>" />
                </div>
            </div>
            <div class="label-wrapper" style="color:red">Loại sản phẩm :</div>
            <div class="element-wrapper">
                <select class="form-change" type="change" name="txtcateID">
                    <option value="" selected>----Chọn Loại Thiết Bị----</option>
                    <?php
                    $loai = category::DanhSachLoaiSanPham();
                    foreach($loai as $item)
                    {
                        echo "<option value= ".$item["CateID"].">".$item["CategoryName"]."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-row">
                <div class="label-wrapper">Giá sản phẩm :</div>
                <div class="element-wrapper">
                    <input class="form-number" type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ; ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="label-wrapper">Số lượng sản phẩm :</div>
                <div class="element-wrapper">
                    <input class="form-number" type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ; ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="label-wrapper">Mô Tả Thiết Bị:</div>
                <div class="element-wrapper">
                    <textarea class="form-textarea" type="text" name="txtdesc" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ; ?>"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="label-wrapper">Ảnh Thiết Bị:</div>
                <div class="element-wrapper">
                    <input class="form-file" type="file" name="txtpic" accept=".png,.gif,.jpg" />
                </div>
            </div>
            <div class="form-row">
                <div class="label-wrapper">&nbsp;</div>
                <div class="element-wrapper">
                    <input class="form-submit" type="submit" name="btnsubmit" value="Thêm sản phẩm" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>