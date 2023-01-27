<?php
include "../conf/conn.php";
$username = mysqli_real_escape_string($conn, htmlentities($_POST['username']));
$password = mysqli_real_escape_string($conn, htmlentities($_POST['password']));
$password = md5($password);
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$check = mysqli_query($conn, $query);
if (mysqli_num_rows($check) >= 1) {
	while ($row = mysqli_fetch_array($check)) {
		session_start();
		$_SESSION['id_admin'] = $row['id_admin'];
		?>
		<script>alert("Selamat Datang <?= $row['username']; ?> Kamu Telah Login Ke Halaman Admin !!!");
			window.location.href = "../index.php"</script>
	<?php
	}
} else {
	echo '<script>alert("Masukan Username dan Password dengan Benar !!!");
	window.location.href="login.php"</script>';
}
mysqli_close($conn);
?>