
<?php
    include("../../include/common.php");

    $id = $_GET["id"] ?? -1;
    if(is_method_get()){
        //lấy dữ liệu
        $sql = "select * from danhmuc where id = ?";
        $data = db_select($sql, [$id]);
        if(empty($data)){
            //quay về trang chủ ko có dữ liệu
            redirect_to("/index3.php");
        }
        $data = $data[0];
    }else if(is_method_post()){
        //cập nhật dữ liệu
        $name = $_POST["Ten_DanhMuc"];
        $sql = "update danhmuc set Ten_DanhMuc = ? where id = ?";
        db_execute($sql, [$name, $id]);
        redirect_to("/index3.php");
    }

    $_title = "Cập nhật danh sách";
    include("../_header.php");
?>

    <form method="post">
        <label for="">Cập nhật danh sách sản phẩm</label> <br>
        <input type="text" name="Ten_DanhMuc" required value="<?php echo $data["Ten_DanhMuc"]?>"> <!--required để hiện cái thông báo chưa nhập vào thêm valua để cho nó hiện dữ liệu lên-->

        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
