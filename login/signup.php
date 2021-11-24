<?php 
	
require '../functions.php';



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="../img/logo/plate-b.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>SIGN UP | KYROS</title>
</head>
<body>

	<form action="" method="POST">

		<ul>
			<h1>CREATE ACCOUNT</h1>

			<?php if ( isset($_POST['submit']) ) : 
				$nama = $_POST['username'];
				$cekname = mysqli_query($conn, "SELECT * FROM user WHERE nama_user = '$nama'");?>

				<!-- Cek Nama Sudah Digunakan Atau Belum -->
				<?php if ( mysqli_num_rows($cekname) > 0) : ?>
					<p class="salah">Nama sudah digunakan!</p>
				<?php else : ?>

					<!-- Melakukan Tambah Data jika Nama Belum Dipakai -->
					<?php if ( tambah($_POST) > 0) { 
					echo "<script>
							alert ('Sign up berhasil!');
							document.location.href = 'login.php';
					</script>";
					} else {
						echo "<script>
							alert ('Sign up GAGAL!');
						</script>";
					} ?>
				<?php endif; ?>
				
			<?php endif; ?>

			<li>
				<label for="">Username</label>
				<input type="text" name="username" id="username" autocomplete="off" required>
			</li>

			<li>
				<label>Password</label>
				<input type="password" name="password" id="password" required>
			</li>

			<li>
				<button type="submit" name="submit">CREATE</button>
				<a href="Login.php">Already Have An Account? LOGIN</a>
			</li>

		</ul>
			
		
	</form>

</body>
</html>