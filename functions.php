<?php 

// Connect ke database
$nama_host = "localhost";
$nama_user = "root";
$pass = "";
$db = "kyros";

$conn = mysqli_connect($nama_host, $nama_user, $pass, $db);


//Ambil data
function ambil($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}


//Tambah Data
function tambah($data) {
	global $conn;
	$nama = $data['username'];
	$password = $data['password'];
	$query = "INSERT INTO user
				VALUES
				('', '$nama', '$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// Menghitung jumlah produk dalam cart
if ( isset($_SESSION['login']) ) {

	if ( isset($_SESSION['cart'])) {
		
		$jumlah_produk = 0;

		foreach ($_SESSION['cart'] as $row => $jumlah) {
			if ( !isset($jumlah) ) {
				continue;
			}
			$jumlah_produk += 1;	
		}	
	} else {
		// Jika belum login, jumlah item CART berisi 0
		$jumlah_produk = 0;
	}
	
} else {
	$jumlah_produk = 0;
}


//Update data
function update($query) {
	global $conn;
	
	$query = $query;
	mysqli_query($conn, $query);
}

?>