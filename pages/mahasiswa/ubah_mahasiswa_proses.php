<?php
include "../../conf/conn.php";



$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$nama_kelas = $_POST['nama_kelas'];
$nama_jurusan = $_POST['nama_jurusan'];
$foto = $_FILES['foto']['name'];

// echo var_dump($_POST);
// echo var_dump($_FILES);
// die();


$query = "UPDATE mahasiswa SET nim='$nim',nama='$nama' ";
if ($foto != '') {
	$query .= ", `foto` = '$foto'";
}
$query .= " where `id_mahasiswa` = '$id'";

$update_data = mysqli_query($conn, $query);

if ($update_data) {
	echo '<script>alert("Data Berhasil Diubah !!!");
	window.location.href="../../index.php?page=data_mahasiswa"</script>';
} else {
	echo "<p>Data gagal masuk</p>";
}


$cek_data_kelas = mysqli_query($conn, "select * from daftar_kelas where `id_mahasiswa` = '$id'");
if (mysqli_fetch_assoc($cek_data_kelas)) {
	$query = mysqli_query($conn, "UPDATE daftar_kelas set `id_kelas` = '$nama_kelas' where `id_mahasiswa` = '$id'  ");

} else {
	$query = mysqli_query($conn, "insert daftar_kelas values ( null,'$id','$nama_kelas') ");
}
$cek_data_jurusan = mysqli_query($conn, "select * from daftar_jurusan where `id_siswa` = '$id'");
if (mysqli_fetch_assoc($cek_data_jurusan)) {
	$query = mysqli_query($conn, "UPDATE daftar_jurusan set `id_jurusan` = '$nama_jurusan' where `id_siswa` = '$id'  ");

} else {
	$query = mysqli_query($conn, "insert into daftar_jurusan values (null, '$id', '$nama_jurusan') ");
}
echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];

move_uploaded_file($_FILES["foto"]["tmp_name"], 'assets/' . $foto);
?>