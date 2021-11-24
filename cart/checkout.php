<?php  
session_start();

require '../functions.php';

$all = $_SESSION['cart'];

//Mengupdate stock barang yang ada pada cart
foreach ($all as $product => $jumlah) {
	// Mengambil data stock pada tabel product
	$result = mysqli_query($conn, "SELECT * FROM product WHERE id_prod = $product");
	$prod_db = mysqli_fetch_assoc($result);

	$stock = $prod_db['stock_prod'];
	//Melakukan pengurangan stock tersedia dikurangi barang yang dibeli
	$final_qty = $stock - $jumlah;

	$query = "UPDATE product SET stock_prod = $final_qty WHERE id_prod = $product";
	update($query);
}

unset($_SESSION['cart']);

echo "<script>

alert('Pembelian Berhasil');
document.location.href = '../home.php';

</script>";

?>