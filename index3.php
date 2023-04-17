
<?php
	include("include/common.php");

	$data = db_select("select * from danhmuc");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách san phẩm</title>
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
					<th>Danh Mục Sản Phẩm</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php  
					foreach($data as $x){
						$id = $x["id"];
						$Ten_DanhMuc = $x["Ten_DanhMuc"];

						echo <<<EOL
					<tr>
						<td>$id</td>
						<td>$Ten_DanhMuc</td>
						<td>
							<a href="./indexSanPham.php" class="btn btn-a">Chi tiết</a>
							<a href="./admin/danhmuc/edit.php?id=$id" class="btn btn-b">Sửa</a>
							<a href="./admin/danhmuc/delete.php?id=$id" class="btn btn-c">Xóa</a>
						</td>
					</tr>
EOL;
					}
				?>
			</tbody>
		</table>
		<br>
		<hr>
		<a href="./index4.php" class="btn btn-a">Trang Admin sản phẩm </a>
	</div>
</body>
</html>