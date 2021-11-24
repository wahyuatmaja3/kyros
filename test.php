<?php  
	
$conn = mysqli_connect("localhost", "root", "", "kyros");

$nama = $_POST['username'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE nama_user = '$nama'");

var_dump($query);
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>

	<form action="" method="POST">
		
		<input type="text" name="username">

		

	</form>

</body>
</html>