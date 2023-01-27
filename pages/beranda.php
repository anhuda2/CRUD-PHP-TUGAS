<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Beranda
      <small>Halaman Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">BERANDA</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <h4> Halo

      <?php
      $queryadmin = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin='$_SESSION[id_admin]'");
      $rowadmin = mysqli_fetch_array($queryadmin);
      echo $rowadmin['username'];
      ?>,
      Silahkan klik menu disamping untuk mengolah data </h4>
  </section>
  <!-- /.Main content -->
</div>
<!-- /.content-wrapper -->