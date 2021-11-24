
<?php 

session_start();
	
require '../functions.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="../img/logo/plate-b.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>LOGIN | KYROS</title>
</head>
<body>

	<form action="" method="POST">


		<ul>
			<h1>LOGIN</h1>

			<!-- PEMBERITAHUAN KESALAHAN -->
			<?php if ( isset($_POST['submit'])) : ?>
				<?php 

				$nama = $_POST['username'];
				$password = $_POST['password'];
				$cekname = mysqli_query($conn, "SELECT * FROM user WHERE nama_user = '$nama'");
				$cekpass = mysqli_query($conn, "SELECT * FROM user WHERE pass_user = '$password'"); 

				?>
				
				<!-- Cek ketersediaan NAMA -->
				<?php if ( !mysqli_num_rows($cekname) > 0) : ?>

					<p class="salah">Username tidak tersedia</p>

				<?php else: ?>

					<!-- Cek kesesuaian Password -->
					<?php if (!mysqli_num_rows($cekpass) > 0) : ?>

						<p class="salah">Password yang anda masukkan salah!</p>

					<?php else: 

						$_SESSION['login'] = true;
						$_SESSION['nama'] = $nama;

						?>

						<script>
							alert ("Login Berhasil");
							document.location.href = '../home.php';
						</script>

					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>

			<li>
				<label for="">Username</label>
				<input type="text" name="username" id="username" required>
			</li>

			
			<li>
				<label>Password</label>
				<input type="password" name="password" id="password" required>
			</li>

			<li>
				<button type="submit" name="submit">LOGIN</button>
				<a href="signup.php" title="LOGIN">Create new account</a>
			</li>

		</ul>
			
		
	</form>

</body>
</html>