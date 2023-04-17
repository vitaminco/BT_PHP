<?php
    include("include/common.php");

    if(is_method_post()){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cf_password = $_POST["cf_password"];
        
        if($password != $cf_password){
            js_alert("MẬT KHẨU KHÔNG KHỚP!!!!!!!");
            js_redirect_to("register.php");
            die;
        }

        if(isUsernameExists($username)){
            js_alert("Tài khoảng đã tồn tại!!!!!!!");
            js_redirect_to("register.php");
            die;
        }
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users values(default, ?, ?)";
        $params = [$username, $password_hash];
        db_execute($sql, $params);
        js_redirect_to("indexSanPham.php");
    }

    function isUsernameExists(string $username):bool{
        $sql = "select * from users where username = ?";
        $data = db_select($sql, [$username]);
        return !empty($data);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King movie &#8211; Vui giải trí</title>
    <link rel="icon" href="./asset/images/logo.png" type="images/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--làm mất magine cho về =0-->

    <link rel="stylesheet" href="<?php asset("./CSS/Main.css");?>"/>

    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link href = "https: //fonts.googleapis.com/css2? family = Roboto: wght @ 300; 400; 500; 700 & display = swap "rel =" stylesheet ">
    <link rel="stylesheet" href="./asset/Fonts/fontawesome-free-6.2.1-web/css/all.min.css"><!--icon-->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./asset/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script language="JavaScript" src="asset/mainAll.js"></script>
    <style>
      /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>

</head>
<body>
    <div class="grid">
        <!-- PHẦN ĐĂNG KÍ -->
        <div id="Sigin__tab" class="siginTab">
            <div class="container__SL">
                <div class="trangchu">
                    <div class="left">
                        <span >ĐĂNG KÍ</span>
                        <i class="fa-sharp fa-solid fa-chevron-right"></i>
                        <span style="cursor: pointer;" onclick="hienthiDN();">ĐĂNG NHẬP</span>
                    </div>
                    <a href="https://www.facebook.com/" class="right">
                        <i class="fa-brands fa-facebook"></i>
                        Share 62k
                    </a>
                </div>
            </div>
            <div class="Login">
                <h1><b>ĐĂNG KÍ</b></h1>
            </div>
        
             <div class="grid__row">
                <div class="grid__colum-5">
                    <div class="card">
                        <img src="./AssetSL/IMGSL/card.png" alt="Danh thiép">
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
                        <h1>THÔNG TIN CÁ NHÂN</h1>
                        <div class="person__write">
                        <form method="post" class="KHUNG">
                            <div class="THE">
                                <label for="">Tên đăng nhập</label>
                                <input type="text" name="username" minlength="4" required>
                            </div>
                            <div class="THE">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="password" minlength="4" required>
                            </div>
                            <div class="THE">
                                <label for="">Nhập lại mật khẩu</label>
                                <input type="password" name="cf_password" minlength="4" required>
                            </div>
                            <div class="dk btn_dn">
                                <hr>
                                <input type="submit" value="ĐĂNG KÝ">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

