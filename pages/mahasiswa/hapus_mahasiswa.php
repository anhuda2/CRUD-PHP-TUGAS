<?php
include "../../conf/conn.php";

$id = $_GET['id'];

// Fetch the file name
$query = "SELECT `foto` FROM `mahasiswa` WHERE `id_mahasiswa` = '$id'";
$data_foto = mysqli_query($conn, $query);
$foto = mysqli_fetch_assoc($data_foto);

// check if the file exist and is a file not a folder 
if (file_exists("assets/" . $foto['foto']) && is_file("assets/" . $foto['foto'])) {
    unlink("assets/" . $foto['foto']);
}

$delete_data = "DELETE FROM mahasiswa WHERE id_mahasiswa ='$id'";
$del = $conn->query($delete_data);
if ($del) {
	echo '<script>alert("Data Berhasil Dihapus !!!");
                window.location.href="../../index.php?page=data_mahasiswa"</script>';
} else {
    echo "<p>Hapus Data Gagal</p>";
}

