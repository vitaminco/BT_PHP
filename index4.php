
<?php
	include("include/common.php");

	$data = db_select("SELECT st.*, cls.Ten_DanhMuc FROM sanpham st
	left join danhmuc cls on st.Id_DanhMuc = cls.id");       
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách sản phẩm</title>
	<link rel="stylesheet" href="<?php asset("./CSS/style.css");?>"/>

</head>
<body>
	<div class="container">
	<header class="header">
		<div class="logo">
			<img src="asset/IMG/cute.jpg" width="150" heigh="150" alt="">
			<h1>Admin</h1>
		</div>

		<div class="mb-3">
			<a href="./admin/danhmuc/create.php" class="btn btn-a">Thêm Danh sách mới</a>
			<?php if(is_logged()) { ?>
				<a href="./logout.php" class="btn btn-a">TRANG ĐĂNG XUẤT</a>
			<?php } else {?>
				<a href="register.php" class="btn btn-a">TRANG ĐĂNG KÝ</a>
				<a href="login.php" class="btn btn-a">TRANG ĐĂNG NHẬP</a>
			<?php }?>
		</div>
	</header>
    <table>
			<col style="width: 10%;" />
			<col style="width: 70%;" />
			<col style="width: 20%;" />
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên Sản Phẩm</th>
					<th>Gia</th>
					<th>Ngày Bán</th>
					<th>Hình</th>
					<th>Id_DanhMuc</th>
					<th>Tên Danh Mục</th>
					<th>Thông Tin</th>
					<th><a href="./admin/sanpham/create.php" class="btn btn-a">THÊM SẢN PHẨM</a></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					foreach($data as $x){
						$id = $x["id"];
						$TenSanPham = $x["TenSanPham"];
						$Gia = $x["Gia"];
						$NgayBan = $x["NgayBan"];
						$img_path = $x["img_path"];
						$Id_DanhMuc = $x["Id_DanhMuc"];
						$Ten_DanhMuc = $x["Ten_DanhMuc"];
						$ThongTin = $x["ThongTin"];

						echo <<<EOL
						<tr>
						<td>$id</td>
						<td>$TenSanPham</td>
						<td>$Gia</td>
						<td>$NgayBan</td>
						<td><img src="upload/$img_path" width=100 /></td>
						<td>$Id_DanhMuc</td>
						<td>$Ten_DanhMuc</td>
						<td>$ThongTin</td>
						<td>
							<a href="./admin/sanpham/edit.php?id=$id" class="btn btn-b">Sửa</a>
							<a href="admin/sanpham/delete.php?id=$id" class="btn btn-c">Xóa</a>
						</td>
				</tr>
EOL;
					}
				?>
			</tbody>
		</table>

		<a href="index3.php" class="btn btn-a">Trang Admin Danh mục </a>
        <a href="indexSanPham.php" class="btn btn-a">Trang SẢN PHẨM </a>
	</div>
</body>
</html>