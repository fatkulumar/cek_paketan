<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cek Paketan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="gs/admin/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="gs/admin/adminlte/dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="gs/admin/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="gs/admin/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cek Paketan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="gs/admin/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block">Cek Paketan</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Cek Paketan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header bg-danger"><strong><h1>Cek Paketan Gs</strong></h1></div>
                <div class="card-body">

                      <div class="table table-responsive">   
                      <!-- /.content-header -->
                      
                        <table id="table_resi" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengirim</th>
                                    <th>Penerima</th>
                                    <th>Tanggal Penerimaan</th>
                                    <th>No. Pelanggan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                          <tbody>

                              <?php 
                                  include "conn.php";
                                  $no = 1;
                                  $qrys = mysqli_query($conn, "SELECT * FROM tb_resi");
                                  foreach($qrys as $qry):
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $qry["pengirim"] ?></td>
                                    <td><?= $qry["penerima"] ?></td>
                                    <td><?= $qry["tgl_penerimaan"] ?></td>
                                    <td><?= $qry["no_pelanggan"] ?></td>
                                    <td>
                                        <?php $status = $qry["status"];
                                            if($status == 0) {
                                                echo "<span class='btn btn-danger btn-sm'>Belum Diambil</span>";
                                            }else{
                                                echo "<span class='btn btn-primary btn-sam'>Sudah Diambil</span>";
                                            }
                                        ?>
                                    </td>
                                </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table> 
                      </div>
                    </div>
               </div>
           </div>
       </div>
    </div>
    <!-- Main content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="gs/admin/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="gs/admin/adminlte/dist/js/adminlte.min.js"></script>

<script src="gs/admin/adminlte/plugins/jquery/jquery.min.js"></script>

<!-- jQuery -->
<script src="gs/admin/adminlte/plugins/jquery/jquery.min.js"></script>

<script src="gs/admin/adminlte/plugins/datatables/jquery.dataTables.js"></script>

  <script>
        $(function () {
    $("#table_resi").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#table_resi').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
    </script>
    
</body>
</html>
