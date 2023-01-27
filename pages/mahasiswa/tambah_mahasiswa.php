<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      TAMBAH MAHASISWA
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">TAMBAH MAHASISWA</li>
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
          <form role="form" method="post" action="pages/mahasiswa/tambah_mahasiswa_proses.php"
            enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Nim</label>
                <input type="text" name="nim" class="form-control" placeholder="Nim" required>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
              </div>
             
              <div class="form-group">
                <label>Foto</label>
                <input class="form-control" type="file" name="foto" id="foto">
              </div>
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