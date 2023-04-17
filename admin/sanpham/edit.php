
<?php
    include("../../include/common.php");

    $id = $_GET["id"] ?? -1;
    if(is_method_get()){
        //lấy dữ liệu
        $sql = "select * from sanpham where id = ?";
        $data = db_select($sql, [$id]);

        if(empty($data)){
            //quay về trang chủ ko có dữ liệu
            redirect_to("/admin/sanpham");
        }
        $data = $data[0];
        
    }else if(is_method_post()){
        //cập nhật dữ liệu
        $TenSanPham =  $_POST["TenSanPham"];
        $Gia =  $_POST["Gia"];
        $NgayBan =  $_POST["NgayBan"];
        $filename = upload_and_return_filename("img_path","sanpham/img");
        $Id_DanhMuc =  $_POST["Id_DanhMuc"];
        $ThongTin =  $_POST["ThongTin"];
        
        $sql = "update sanpham set TenSanPham = ?, Gia = ?, NgayBan = ? , img_path = ?, Id_DanhMuc = ?, ThongTin = ? where id = ?";

        $params = [$TenSanPham, $Gia, $NgayBan, $filename, $Id_DanhMuc, $ThongTin, $id];
        db_execute($sql, $params);
    
        redirect_to("/index4.php");
    }

    $_title = "Cập nhật sửa";
    include("../_header.php");
?>

<form method="post" enctype="multipart/form-data">
            <label for="">Thêm tên</label>
            <input type="text" name="TenSanPham" required> <br>
            <label for="">Giá</label>
            <input type="text" name="Gia" required> <br>
            
            <br>
            <label for="">ngày bán</label>
            <input type="date" name="NgayBan" required> <br>
            
            <label for="">Cập nhật hình</label>
            <?php if(!empty($data["img_path"])) { ?>
                <img src="<?php upload($data["img_path"]); ?>" width="100"/>
                <br>
            <?php }?>
            <input type="file" name="img_path" accept=".png, .ipg, .jpeg"> <br> <hr>
            
            <label for="">id danh mục</label>
            <select name="Id_DanhMuc" id="">
                <option value=""> -- chọn một lớp --</option>
                <?php
                    gen_option_ele("danhmuc", "id","Ten_DanhMuc");
                ?>
            </select> <br>

            <label for="">Thông Tin</label>
            <input type="text" name="ThongTin" required> <br>

            <input type="submit" value="nhập" name="nhap">
    </form>
