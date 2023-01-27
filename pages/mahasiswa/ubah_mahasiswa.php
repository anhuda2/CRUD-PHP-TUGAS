<?php

$id = $_GET['id'];


$query = mysqli_query($conn, "SELECT a.*, k.nama_kelas, j.nama_jurusan ,k.id as id_kelas,c.id_jurusan
FROM mahasiswa a 
LEFT JOIN daftar_kelas b ON b.id_mahasiswa=a.id_mahasiswa 
LEFT JOIN kelas k ON k.id=b.id_kelas 
LEFT JOIN daftar_jurusan c ON c.id_siswa=a.id_mahasiswa 
LEFT JOIN jurusan j ON j.id=c.id_jurusan where a.id_mahasiswa='$id' ");
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      UBAH MAHASISWA
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">UBAH MAHASISWA</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" enctype="multipart/form-data"
            action="pages/mahasiswa/ubah_mahasiswa_proses.php">
            <div class="box-body">
              <input type="hidden" name="id" value="<?php echo $row['id_mahasiswa']; ?>">
              <div class="form-group">
                <label>Nim</label>
                <input type="text" name="nim" class="form-control" placeholder="Nim" value="<?php echo $row['nim']; ?>"
                  required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama"
                  value="<?php echo $row['nama']; ?>" required>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <select class="form-control" name="nama_kelas">
                  <option>Pilih Kelas</option>
                  <?php

                  $ambil_kelas = "select * from kelas";
                  $ambil_data_kelas = mysqli_query($conn, $ambil_kelas);
                  while ($kelas = mysqli_fetch_assoc($ambil_data_kelas)) {
                    $nama_kelas = $kelas['nama_kelas'];
                    $selected = ($kelas['id'] == $row['id_kelas']) ? 'selected' : '';
                    echo "<option value='{$kelas['id']}' $selected>{$kelas['nama_kelas']}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" name="nama_jurusan">
                  <option>Pilih Jurusan</option>
                  <?php
                  $ambil_jurusan = "select * from jurusan";
                  $ambil_data_jurusan = mysqli_query($conn, $ambil_jurusan);
                  while ($jurusan = mysqli_fetch_assoc($ambil_data_jurusan)) {
                    $nama_jurusan = $jurusan['nama_jurusan'];

                    $selected = ($jurusan['id'] == $row['id_jurusan']) ? 'selected' : '';
                    echo "<option value='{$jurusan['id']}' $selected>{$jurusan['nama_jurusan']}</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input class="form-control" type="file" name="foto" id="foto">
        </div>
        <img src="pages/mahasiswa/assets/<?= $foto ?>" class="img-thumbnail" alt="">
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" title="Simpan Data"> <i
                  class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->