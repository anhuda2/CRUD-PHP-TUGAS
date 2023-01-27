<?php
include "../../conf/conn.php";



$nim = $_POST['nim'];
$nama = $_POST['nama'];
$foto = $_FILES['foto']['name'];


$query = mysqli_query($conn, "INSERT INTO mahasiswa (`nim`,`nama`,`foto`) VALUES ('$nim','$nama','$foto') ");

if ($query) {
	echo '<script>alert("Data Berhasil Ditambahkan !!!");
				</script>';
} else {
	echo '<script>alert("Data Gagal Ditambahkan !!!");
	</script>';
}


move_uploaded_file($_FILES["foto"]["tmp_name"], 'assets/' . $foto);
header("Location: http://localhost/CRUD-PHP/index.php?page=data_mahasiswa");