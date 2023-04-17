
<?php
 include("../../include/common.php");

 if(is_method_post()){
    $TenSanPham =  $_POST["TenSanPham"] ?? "";
    $Gia =  $_POST["Gia"] ?? "";
    $NgayBan =  $_POST["NgayBan"] ?? "";
    $Hinh = upload_and_return_filename("Hinh");
    $Id_DanhMuc =  $_POST["Id_DanhMuc"] ?? "";
    $ThongTin =  $_POST["ThongTin"] ?? "";
    $sql = "insert into sanpham(TenSanPham, Gia, NgayBan, Hinh, Id_DanhMuc, ThongTin) values('$Id_DanhMuc
        values(?,?,?,?,?,?)";

    $params = [$TenSanPham, $Gia, $NgayBan , $Hinh,  $Id_DanhMuc, $ThongTin];
    db_execute($sql, $params);
    
    js_alert("thêm mới thành công");
    redirect_to("/indexSanPham.php");
}

$_title = "Cập nhật Sản Phẩm";
include("../_header.php");
?>

    <form method="post" enctype="multipart/form-data">
            <label for="">Thêm tên</label>
            <input type="text" name="TenSanPham" required> <br>
            <label for="">Gía</label>
            <input type="text" name="Gia" required> <br>
            
            <br>
            <label for="">ngày bán</label>
            <input type="date" name="NgayBan" required> <br>
            <label for="">chọn ảnh</label>
            <input type="file" name="Hinh" accept=".png, .ipg, .jpeg"> <br>

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
    <?php include("../_footer.php");?>