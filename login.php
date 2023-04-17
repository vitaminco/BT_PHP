<?php
    include("include/common.php");

    if(is_logged()){
        js_redirect_to("indexSanPham.php");
    }
    if(is_method_post()){
//nhận thông tin từ from post
        $username = $_POST["username"];
        $password = $_POST["password"];
//select từ db dựa vào username
        $sql = "select * from `users` where `username` = ?";
        $user = db_select($sql, [$username]);
//kiểm tra select nếu rông thì => nhập sai
        if(empty($user)){
            js_alert("Nhập sai mật khẩu");
            //quay về trang chủ ko có dữ liệu
            js_redirect_to("login.php");
            die;
        }
         $user = $user[0];
//nếu kết quả select khác rổng thì so sánh password trong db với password ở bước 1
        if(password_verify($password,$user["password"]) == true){
            js_alert("OK GOOD!!!");
            
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $user["id"];
            js_redirect_to("indexSanPham.php");
        }else{
            js_alert("Tên đăng nhập hoặc mật khẩu không đúng");
            js_redirect_to("login.php");
            die;
        }
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
    
  <!-- PHẦN ĐĂNG NHẬP -->
  <div class="grid">
  <div id="Login__tab" class="loginTab">
                    <div class="container__SL">
                        <div class="trangchu">
                            <div class="left">
                                <span>ĐĂNG NHẬP</span>
                                <i class="fa-sharp fa-solid fa-chevron-right"></i>
                                <span style="cursor: pointer;">ĐĂNG KÍ</span>
                            </div>
                            <a href="https://www.facebook.com/" class="right">
                                <i class="fa-brands fa-facebook"></i>
                                Share 62k
                            </a>
                        </div>
                    </div>
    
                    <div class="Login">
                        <h1><b>ĐĂNG NHẬP</b></h1>
                    </div>
                    <div class="grid__row">
                        <div class="grid__colum-5">
                            <div class="card">
                                <img src="./asset/images/card.png" alt="Danh thiép">
                            </div>
                        </div>
    
                        <div class="grid__colum-5">
                            <div class="login__right">
                                <h1>BẠN ĐÃ LÀ THÀNH VIÊN ?</h1>
                                <span>Vui lòng nhập email và mật khẩu của bạn để đăng nhập.</span>
                                <form class="form__login" action="" method="post">
                                <div class="THE">
                                    <label for="">Tên đăng nhập</label>
                                    <input type="text" name="username" minlength="4" required>
                                </div>
                                <div class="THE">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="password" minlength="4" required>
                                </div>
                                <div class="dk btn_dn" >
                                    <hr>
                                    <input type="submit" value="ĐĂNG NHẬP">
                                </div>
                                    <span>Bạn chưa là thành viên? <a class="Link__sigin" href="">Đăng kí thành viên</a></span>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</body>
</html>

