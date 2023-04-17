
<?php
 include("../../include/common.php");

 if(is_method_post()){
    $TenSanPham =  $_POST["TenSanPham"] ?? "";
    $Gia =  $_POST["Gia"] ?? "";
    $NgayBan =  $_POST["NgayBan"] ?? "";
    $filename = upload_and_return_filename("img_path");
    $Id_DanhMuc =  $_POST["Id_DanhMuc"] ?? "";
    $ThongTin =  $_POST["ThongTin"] ?? "";
    $sql = "insert into sanpham(TenSanPham, Gia, NgayBan, img_path, Id_DanhMuc, ThongTin)
        values(?,?,?,?,?,?)";

    $params = [$TenSanPham, $Gia, $NgayBan , $filename,  $Id_DanhMuc, $ThongTin];
    db_execute($sql, $params);
    
    js_alert("thêm mới thành công");
    redirect_to("./index4.php");
}

$_title = "Cập nhật Sản Phẩm";
include("../_header.php");
?>

<div class="grid">
        <!-- PHẦN ĐĂNG KÍ -->
        <div id="Sigin__tab" class="siginTab">
            <div class="container__SL">
                <div class="trangchu">
                    <div class="left">
                        <span >Trang chủ</span>
                        <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        <span style="cursor: pointer;" >Thêm dữ liệu</span>
                    </div>
                    <a href="https://www.facebook.com/" class="right">
                        <i class="fa-brands fa-facebook"></i>
                        Share 62k
                    </a>
                </div>
            </div>
            <div class="Login">
                <h1><b>THÊM DỮ LIỆU</b></h1>
            </div>
        
             <div class="grid__row">
                <div class="grid__colum-5">
                    <div class="card">
                        <img src="upload/card.png" alt="Danh thiép">
                    </div>
                    <div class="name__card">
                        <span>MEGA +</span>
                    </div>
                
                    <div class="dieukhoang">
                        <h1>ĐIỀU KIỆN ÁP DỤNG</h1>
                        <ul class="list__dieukhoang">
                            <li class="list__dieukhoang-item"> Xuất trình thẻ trước khi mua vé tại các quầy của Mega GS Cinemas.</li>
                            <li class="list__dieukhoang-item"> Thẻ thành viên Mega+ là tài sản của Mega GS Cinemas và không được chuyển nhượng.</li>
                            <li class="list__dieukhoang-item"> Mega GS Cinemas có quyền thay đổi các chương trình điểm thưởng mà không thông báo trước.</li>
                            <li class="list__dieukhoang-item"> Đăng ký làm thành viên tại website www.</li>Megagscinemas.</li>vn hoặc tại hệ thống cụm Rạp Mega GS.</li>
                            <li class="list__dieukhoang-item"> Nhận thẻ thành viên tại hệ thống Rạp Mega GS để có thể tích lũy/ đổi điểm khi giao dịch tại hệ thống Rạp Mega GS.</li>
                            <li class="list__dieukhoang-item"> Điểm tích lũy không có giá trị quy đổi thành tiền mặt.</li>
                            <li class="list__dieukhoang-item"> Các quyền lợi chỉ áp dụng cho chủ thẻ, Mega GS có thể yêu cầu thành viên xuất trình CMND/Thẻ căn cước hoặc các giấy tờ cần thiết để chứng minh chủ thẻ khi áp dụng các chính sách ưu đãi.</li>
                            <li class="list__dieukhoang-item"> Không áp dụng đổi điểm vào các ngày các ngày Lễ Tết.</li>
                        </ul>
                    </div>
                </div>
            
                <div class="grid__colum-5">
                
                    <div class="person__info">
                        <h1>THÔNG TIN</h1>
                        <div class="person__write">
                    <form method="post" enctype="multipart/form-data">
                        <label for="">Thêm tên</label>
                        <input type="text" name="TenSanPham" required> <br>
                        <label for="">Gía</label><br>
                        <input type="text" name="Gia" required> <br>

                        <br>
                        <label for="">ngày bán</label>
                        <input type="date" name="NgayBan" required> <br>
                        <label for="">chọn ảnh</label>
                        <input type="file" name="img_path" accept=".png, .ipg, .jpeg"> <br>

                        <label for="">id danh mục</label><br>
                        <select name="Id_DanhMuc" id="">
                            <option value=""> -- chọn một lớp --</option>
                            <?php
                                gen_option_ele("danhmuc", "id","Ten_DanhMuc");
                            ?>
                        </select> <br>

                        <label for="">Thông Tin</label><br>
                        <input type="text" name="ThongTin" required> <br>
                            <br>
                         <div class="btn_dn">  
                            <input type="submit" value="NHẬP" name="nhap">
                        </div>
                    </form>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


    <?php include("../_footer.php");?>


  