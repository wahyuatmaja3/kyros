<?php  
session_start();
require '../functions.php';

$subtotal = 0;

$all_cart = [];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="../img/logo/plate-b.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>CART | KYROS</title>
</head>
<body>

	<div class="wrapper">
		
		<!-- Logo -->
		<div class="logo">
			<a href="../home.php">KYROS</a>
		</div>


		<!-- Tabel Produk -->
		<div class="product-list">

			<table cellpadding="5px" cellspacing="0" >
				<thead>
					<tr>
						<th class="h-product">Product</th>
						<th class="h-harga">Harga</th>
						<th class="h-qty">Qty</th>
						<th class="h-total">Total</th>
						<th class="h-hapus"></th>
					</tr>	
				</thead>

					

			<?php if ( isset($_SESSION['cart']) ): ?>

				<tbody>
				<?php  
					$produtcs_cart = $_SESSION['cart'];
				?>
				<!-- Produk pada cart -->
				<?php foreach ($produtcs_cart as $product => $jumlah): ?>
					<?php

						//Mengambil 1 per 1 data produk menggunakan id pada $_SESSION
					 	$query = "SELECT * FROM product WHERE id_prod = $product";
						$result = mysqli_query($conn, $query);
						$prod = mysqli_fetch_assoc($result);

						//Detail product
						$nama = $prod['nama_prod'];
						$harga = $prod['harga_prod'];
						$cat = $prod['cat_prod'];
						$subcat = $prod['subcat_prod'];
						$img = $prod['img_prod'];

						$all_cart = $prod;
						//Subtotal
					?>
					<tr>
						<td>
							<img src="../img/product/<?php echo $cat . '/' . $subcat . '/' . $img ?>">
							<p class="nama"><?php echo $nama ?></p>
						</td>
						<td><p class="harga">$<?php echo $harga ?></p></td>
						<td><p class="qty"><?php echo $jumlah ?></p></td>
						<td>
							<!-- Total harga ( harga * qty ) -->
							<?php 
								$total = $harga * $jumlah;
								echo "$" . $total;
							?>
						</td>
						<td class="hapus">
							<a href="hapus.php?id=<?php echo $product ?>" title="HAPUS">x</a>
						</td>
					</tr>

				<?php 
					$subtotal += $total;
					endforeach 
				?>
				</tbody>

			<!-- Jika cart belum ada isinya -->
			<?php else: ?>

				<tbody>
					<td colspan="4">Cart is empty</td>
				</tbody>

			<?php endif ?>
			</table>
		</div>

		<div class="link-shop">
			<a href="../shop/shop.php">< Back to SHOP</a>
		</div>

	</div>

	<div class="checkout-link">
		<p class="subtotal">Cart total <em>$<?php echo $subtotal ?></em></p>
		<p class="desc">Shipping and taxes calculated at Checkout</p>

		<div class="checkout">
			<a href="checkout.php" name="check-submit">Checkout</a>
		</div>
		
	</div>


</body>
</html>