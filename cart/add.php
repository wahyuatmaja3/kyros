<?php  
session_start();

//Cek apakah user sudah login atau belum
if ( !isset($_SESSION['login'])) {
	echo "
	<script>
		alert('Anda harus login terlebih dahulu')
		document.location.href = '../login/login.php';
	</script>
	";
} else {


//Mendapatkan id produk
$id = $_GET['id'];

$_SESSION['cart'];

//Jika barang ada di cart, jumlah +1
if ( isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id] += 1;


//Jika belum, jumlah = 1
} else {
	$_SESSION['cart'][$id] = 1;
}

echo "
	<script>
		alert ('Barang berhasil dimasukkan ke CART');
		document.location.href = '../shop/shop.php';
	</script>";
}
?>