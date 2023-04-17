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
    <!-- HEADER -->
    <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar--lish">
                        <li><a href="./Index.html"><img class="img--logo" src="./Asset/images/logo.png" alt=""></a></li>
                        <li class="header__navbar--item" style="color: var(--primary-color);">RẠP CHIẾU PHIM MEGA</li>
                    </ul>

                    <ul class="header__navbar--lish">
                        <li class="header__navbar--item notifi"> 
                            <i class="fa-solid fa-bell"></i>
                            THÔNG BÁO
                            
                            <div class="notifi__contain">
                                <header class="notifi__header">
                                    <h3>DANH SÁCH THÔNG BÁO MỚI</h3>
                                </header>
                                
                                <a href="#" class="notifi__body">
                                    <img src="./Asset/images/vongnhi.jpg" alt="">
                                    <span>CÔ DÂU 8 TUỔI</span>
                                </a>
                               
                            </div>
                           
                            
                        </li>
                        <li class="header__navbar--item notifi">
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                            GIỎ HÀNG
                            <div class="notifi__contain">
                                <header class="notifi__header">
                                    <h3>GIỎ CÁC BỘ PHIM ĐƯỢC MUA</h3>
                                </header>
                                
                                <a href="#" class="notifi__body">
                                    <img src="./Asset/images/vongnhi.jpg" alt="">
                                    <span>CÔ DÂU 8 TUỔI</span>
                                </a>
                               
                            </div>
                        </li>
                        <?php if(is_logged()) { ?>
                            <i class="fa-solid fa-user" style="color: black;background-color: white;width: 34px;display: block;height: 30px;text-align: center;border-radius: 50px;font-size: 2.5rem;margin: 0 0 0 11px;"></i>
                            <li class="header__navbar--item"><button  class="header__navbar--item--link header__navbar--item--link-login" ><a href="./logout.php" class="btn btn-a">ĐĂNG XUẤT</a></button></li>
                            
			            <?php } else {?>
                            <li class="header__navbar--item"><button  class="header__navbar--item--link header__navbar--item--link-signin" ><a href="register.php">ĐĂNG KÍ</a></button></li>
                            <li class="header__navbar--item"><button  class="header__navbar--item--link header__navbar--item--link-login" ><a href="login.php">ĐĂNG NHẬP</a></button></li>
			            <?php }?>
                    </ul>
                </nav>
                
                <!-- tien ich -->
                <nav class="tienich">
                    <div class="tienich__blog">
                        <ul class="tienich__blog-list">
                            <li><a href="./indexFilms.html"  class="tienich__blog-item">LỊCH CHIẾU</a></li>
                            <li><a href="./indexFilms.html" class="tienich__blog-item">PHIM</a></li>
                            <li><a href="./indexGT.html" class="tienich__blog-item">RẠP & GIÁ VÉ</a></li>
                            <li><a href="./IndexSL.html" class="tienich__blog-item">ƯU ĐÃI</a></li>
                        </ul>
                        
                        <ul class="tienich__blog-list">
                            <li class="tienich__blog-item">
                                <a href="https://www.facebook.com/"><i class="icon__navbar fa-brands fa-facebook"></i></a>
                            </li>
                            <li class="tienich__blog-item">
                                <a href="https://www.instagram.com/?hl=en"><i class="icon__navbar fa-brands fa-square-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
                
</header>


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

<div class="footer">
            <div class="grid">
            <div class="grid__row">
                <div class="grid__colum-6">
                    <div class="footer__left">
                        <ul class="footer__left-list">
                            <li class="footer__left-item"><a href="./indexFilms.html">LỊCH CHIẾU</a></li>
                            <li class="footer__left-item"><a href="./indexFilms.html">PHIM</a></li>
                            <li class="footer__left-item"><a href="./indexGT.html">RẠP & GIÁ VÉ</a></li>
                            <li class="footer__left-item"><a href="./IndexSL.html">ƯU ĐÃI</a></li>
                        </ul>
                        <ul class="footer__left-list">
                            <li class="footer__left-item"><a href="./indexGT.html">GIỚI THIỆU</a></li>
                            <li class="footer__left-item"><a href="./IndexSL.html">SỰ KIỆN</a></li>
                            <li class="footer__left-item"><a href="./IndexSL.html">DỊCH VỤ</a></li>
                            <li class="footer__left-item"><a href="./indexGT.html">ĐIỀU KHOẢNG CHUNG</a></li>
                            <li class="footer__left-item"><a href="./indexGT.html">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="grid__colum-4">
                    <div class="footer__right">
                        <div class="hotline">
                            <div class="hotline-list">
                                <span>RẠP PHIM</span>
                                <span>000000000</span>
                            </div>
                            <div class="hotline-img">
                                <img src="./Asset/images/footer-phone.png" alt="">
                            </div>
                        </div>
                    
                        <div class="footer__img">
                            <img src="./Asset/images/footer-star.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="footer__bottom">
                <div class="grid">
                    <p class="footer__text">No Coppyright 2023 - Bản quyền thuộc vể Công ty ABC</p>
                </div>
            </div>
        </div>
</body>
</html>

