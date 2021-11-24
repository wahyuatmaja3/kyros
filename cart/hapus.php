<?php 
session_start();

$id = $_GET['id'];

//Hapus item dari id
unset($_SESSION['cart'][$id]);

echo "
<script>

	alert('Item berhasil dihapus!');
	document.location.href = 'cart.php'

</script>";

?>