<?php  
session_start();

require '../functions.php';

$products = ambil('SELECT * FROM product');



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="../img/logo/plate-b.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>SHOP | KYROS</title>
</head>
<body>

	<!-- Navbar -->
	<div class="navbar">
		<ul class="left">
			<li><a href="../home.php" >Home</a></li>
			<li><a href="#" id="page">Shop</a></li>
			<li><a href="">About</a></li>
		</ul>

		<a href="../home.php" class="logo">KYROS</a>

		<ul class="right">
			<?php if ( isset($_SESSION['login'])): ?>
				<li><a href="account/account.php">Account</a></li>
			<?php else: ?>
				<li><a href="../login/login.php">Login</a></li>
			<?php endif ?>

			<!-- Menentukan isi cart -->
			<?php 
				$isi = 0;

				if ( isset($_SESSION['total'])) {
					$isi = $_SESSION['total'];
				}
			?>
			<li><a href="../cart/cart.php">Cart(<?php echo $jumlah_produk ?>)</a></li>
			
		</ul>
	</div>

	<!-- Header -->
	<div class="header">
		<h1>SHOP</h1>
	</div>

	<!-- Shop Field -->
	<div class="shop-field">
		<div class="top-field">
			<p class="cat">All category</p>

			<!-- Category -->
			<!-- <select name="category">
				<option>All category</option>
				<option>Dinnerware</option>
				<option>Serveware</option>
			</select> -->
		</div>

		<div class="product-field">
			<?php foreach ($products as $product): ?>
			
				<div class="product-box">
					
					<img src="../img/product/<?php echo $product['cat_prod'] . '/' . $product['subcat_prod'] . '/' . $product['img_prod']?>">
					<p class="nama"><?php echo $product['nama_prod']?></p>
					<p class="harga">$<?php echo $product['harga_prod']?></p>
					<div class="add">
						<p class="stock">Stock : <?php echo $product["stock_prod"] ?></p>
						<a href="../cart/add.php?id=<?php echo $product['id_prod']; ?>">ADD TO CART</a>
					</div>

				</div>	
				
			<?php endforeach ?>
			
		</div>

	</div>

	<!-- Footer -->
	<div class="footer">
		<p>&copy KYROS 2021</p>
	</div>

</body>
</html>