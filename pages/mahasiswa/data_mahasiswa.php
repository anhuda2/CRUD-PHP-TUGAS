<?php
include "conn.php";
$limit = 10;
$offset = 0;
if (isset($_GET['offset'])) {
  $offset = $_GET['offset'];
}

if (isset($_GET['cari']) && isset($_GET['page']) && $_GET['page'] == 'data_mahasiswa') {
  $cari = $_GET['cari'];

  $ambil_data = mysqli_query($conn, "SELECT a.*, k.nama_kelas, j.nama_jurusan 
FROM mahasiswa a 
LEFT JOIN daftar_kelas b ON b.id_mahasiswa=a.id_mahasiswa 
LEFT JOIN kelas k ON k.id=b.id_kelas 
LEFT JOIN daftar_jurusan c ON c.id_siswa=a.id_mahasiswa 
LEFT JOIN jurusan j ON j.id=c.id_jurusan 
WHERE a.nama LIKE '%$cari%' LIMIT $offset, $limit ");
} else {
  $ambil_data = mysqli_query($conn, "SELECT a.*, k.nama_kelas, j.nama_jurusan 
FROM mahasiswa a 
LEFT JOIN daftar_kelas b ON b.id_mahasiswa=a.id_mahasiswa 
LEFT JOIN kelas k ON k.id=b.id_kelas 
LEFT JOIN daftar_jurusan c ON c.id_siswa=a.id_mahasiswa 
LEFT JOIN jurusan j ON j.id=c.id_jurusan 
LIMIT $offset, $limit ");
  $query = "SELECT COUNT(*) as jumlah FROM mahasiswa";
  $hasil = mysqli_query($conn, $query);
  $data = mysqli_fetch_array($hasil);
  $jumlah_data = $data['jumlah'];

  $jumlah_halaman = ceil($jumlah_data / $limit);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA MAHASISWA
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">DATA MAHASISWA</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    </form>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="box box-primary">
            <div class="box-header">
              <a href="index.php?page=tambah_mahasiswa" class="btn btn-primary" role="button" title="Tambah Data"><i
                  class="glyphicon glyphicon-plus"></i> Tambah</a>
            </div>

            <div class="card">
              <div class="card-header">


              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <form action="index.php" method="get">
                  <input type="hidden" name="page" value="data_mahasiswa">
                  <input type="text" name="cari" placeholder="Cari nama mahasiswa">
                  <input type="submit" value="Cari">
                </form>

                <table id="example2" class="table table-bordered table-striped">
                  <div class="input-group">
                    <div class="form-outline">


                      </form>

                      </button>
                    </div>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>FOTO</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php $no = 1;
                      while ($row = mysqli_fetch_assoc($ambil_data)) {
                        // jika foto kosong maka tampilkan gambar default
                        if ($row['foto'] == "") {
                          $foto = "Noimg.png";
                        } else {
                          $foto = $row['foto'];
                        }
                        ?>

                        <tr>
                          <td>
                            <?php echo $no++; ?>
                          </td>
                          <td>
                            <?php echo $row['nim']; ?>
                          </td>
                          <td>
                            <?php echo $row['nama']; ?>
                          </td>
                          <td>
                            <?php echo $row['nama_kelas']; ?>
                          </td>
                          <td>
                            <?php echo $row['nama_jurusan']; ?>
                          </td>
                          <td><img class="img-thumbnail" width="100" src="pages/mahasiswa/assets/<?= $foto ?>" /></td>
                          <td>
                            <a href="index.php?page=ubah_mahasiswa&id=<?= $row['id_mahasiswa']; ?>"
                              class="btn btn-success" role="button" title="Ubah Data"><i
                                class="glyphicon glyphicon-edit"></i></a>
                            <a href="pages/mahasiswa/hapus_mahasiswa.php?id=<?= $row['id_mahasiswa']; ?>"
                              class="btn btn-danger" role="button" title="Hapus Data"><i
                                class="glyphicon glyphicon-trash"></i></a>
                          </td>
                        </tr>

                      <?php } ?>

                    </tbody>
                    <nav aria-label="Page navigation example">

                    </nav>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
      </div>
      <a href="index.php?page=data_mahasiswa&offset=<?php echo ($offset - $limit); ?>">Sebelumnya</a>
<a href="index.php?page=data_mahasiswa&offset=<?php echo ($offset + $limit); ?>">Selanjutnya</a>

      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function () {
    $('#mahasiswa').DataTable();
  });
</script>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<!-- Page specific script -->

</body>

</html>