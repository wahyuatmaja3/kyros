<?php  
session_start();

require 'functions.php';

$products = ambil("SELECT * FROM product LIMIT 3");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="img/logo/plate-b.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>HOME | KYROS</title>
</head>
<body>

	<!-- Navbar -->
	<div class="navbar">
		<ul class="left">
			<li><a href="#" id="page">Home</a></li>
			<li><a href="shop/shop.php">Shop</a></li>
			<li><a href="">About</a></li>
		</ul>

		<a href="" class="logo">KYROS</a>

		<ul class="right">
			<?php if ( isset($_SESSION['login'])): ?>
				<li><a href="account/account.php">Account</a></li>
			<?php else: ?>
				<li><a href="login/login.php">Login</a></li>
			<?php endif ?>
			
			<li><a href="cart/cart.php">Cart(<?php echo $jumlah_produk ?>)</a></li>
			
		</ul>
	</div>

	<!-- Header -->
	<div class="header">
		<h1>HOME</h1>
	</div>


	<!-- Product -->
	<div class="product">
		<div class="product_head">
			<p class="pro_head">Product</p>
			<p class="pro_subhead">NEW ARRIVALS</p>
		</div>
		

		<?php foreach ($products as $product) : ?>
			<div class="product_box">
				<img src="img/product/<?php echo $product["cat_prod"] . "/" . $product["subcat_prod"] . "/" . $product["img_prod"] ?>">
				<p class="nama"><?php echo $product["nama_prod"] ?></p>
				<p class="harga"><?php echo $product["harga_prod"] ?></p>
				<a href="cart/add.php?id=<?php echo $product['id_prod'] ?>">Add to cart</a>
			</div>
		<?php endforeach ?>
	</div>


	<div class="link-shop">
		<h1>Feel Comfort</h1>
		<p class="desc">Our modern cutlery design makes your dining table look beautiful. discover more and make your dining experience meaningful</p>
		<a href="shop/shop.php">SHOP ALL PRODUCT</a>
	</div>

	<div class="footer">
		<p>&copy KYROS 2021</p>
	</div>
</body>
</html>