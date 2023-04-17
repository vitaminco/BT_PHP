//phần đăng kí và đăng nhập
function hienthiDN() {
    //hiện đăng nhập
    var divht = document.getElementById("Login__tab");
    divht.setAttribute("style", "display: block");
    //hiện cái khung
    var hien = document.getElementById("DN__DK");
    hien.setAttribute("style", "display: block")
    //ẩn đăng kí
    var divht = document.getElementById("Sigin__tab");
    divht.setAttribute("style", "display: none");
    //hiện cái lớp phủ
    var phu__tab = document.getElementById("lopphu__dkdn");
    phu__tab.setAttribute("style", "display: inline-flex")

}
function hienthiDK() {
    //hiện đăng kí
    var divht = document.getElementById("Sigin__tab");
    divht.setAttribute("style", "display: block");
    //hiện khung 
    var hien = document.getElementById("DN__DK");
    hien.setAttribute("style", "display: block")
    //ẩn cái đăng nhập
    var divht = document.getElementById("Login__tab");
    divht.setAttribute("style", "display: none");
    //hiện cái lớp phủ
    var phu__tab = document.getElementById("lopphu__dkdn");
    phu__tab.setAttribute("style", "display: inline-flex")

}
//close tab dk -dn
function close__dk_dn() {
    //cái nút đóng ẩn cái khung
    var an = document.getElementById("DN__DK");
    an.setAttribute("style", "display: none");
    //ẩn cái lóp phủ
    var phu__tab = document.getElementById("lopphu__dkdn");
    phu__tab.setAttribute("style", "display: none")
}
// mua
function mua() {
    var divht = document.getElementById("muave");
    divht.setAttribute("style", "display: flex");

}
function closebuy() {
    var divht = document.getElementById("muave");
    divht.setAttribute("style", "display: none");
}

