<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include 'koneksi.php';

session_start();

if ($_SESSION['dept_head']) {
    $user =$_SESSION['dept_head'];
    $sql = $koneksi->query("SELECT * FROM user
    INNER JOIN karyawan using(id_karyawan) 
    WHERE id_user='$user'");
  
    $data = $sql->fetch_assoc();
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>J&T Express Kalsel</title>
    <link href='dist/img/jnt.jpg' rel="shortcut icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-gray-light navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="logo mt-3 pb-3 mb-2 d-flex">
        <div class="image">
          <a href="index_dept_head.php">
          <img src="dist/img/logo.png"  center width="230px" height="auto" class="img" alt="User Image"> 
          </a>
        </div>
      </div>
      <hr>
      <div>
      <h3 class="profile-username text-center"><?php echo $data['nama'];?> <i class="fas fa-signal"></i></h3>

                <p class="text-muted text-center"><b><?php echo $data['nrp'];?></b></p>
      <h3 align='center'><?php echo $data['jabatan'];?></h3>
      </div>
      
      <hr>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="index_dept_head.php" class="nav-link active" style="background-color:red; color:white;">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
           
          
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pengajuan Asset
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page1=validasi_pengajuan_asset" class="nav-link ">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Validasi Pengajuan
                              
                  </p>
                </a>           
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page1=data_pengajuan_aset" class="nav-link ">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Data Pengajuan 
                              
                  </p>
                </a>           
              </li>
            </ul>
            
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pengajuan Service Asset
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page1=validasi_service" class="nav-link ">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Validasi Service
                              
                  </p>
                </a>           
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page1=data_service" class="nav-link ">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Data Service 
                              
                  </p>
                </a>           
              </li>
            </ul>
            
          </li>

          <li class="nav-header">REPORT</li> 

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Report
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                    Laporan Pengajuan Asset
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm7">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Supplier
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm2">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                    Laporan Asset Masuk
                              
                  </p>
                </a>           
              </li> 
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm3">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Asset Keluar
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm4">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                    Laporan Pengembalian
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm5">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Maintenance 
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm6">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                  Laporan Service
                              
                  </p>
                </a>           
              </li>
              
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm8">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                  Laporan Kerusakan
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm9">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                  Laporan Disposal
                              
                  </p>
                </a>           
              </li>
            </ul>
          </li>  

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <?php
      $page = $_GET['page1'];
      $aksi = $_GET['aksi'];

      if($page == "validasi_pengajuan_asset") {
        if ($aksi == "") {
          include "page1/validasi_pengajuan_asset/validasi_pengajuan_asset.php";
        } elseif ($aksi == "validasi"){ 
          include "page1/validasi_pengajuan_asset/validasi.php";
        } elseif ($aksi == "tambah"){
          include "page1/validasi_pengajuan_asset/tambah.php";
        } elseif ($aksi == "terima"){
          include "page1/validasi_pengajuan_asset/terima.php";
        } elseif ($aksi == "tolak"){
          include "page1/validasi_pengajuan_asset/tolak.php";
        } elseif ($aksi == "ubah"){
          include "page1/validasi_pengajuan_asset/ubah.php";
        } elseif ($aksi == "hapus"){
          include "page1/validasi_pengajuan_asset/hapus.php";
        } 
      } elseif ($page == "validasi_service"){
        if($aksi == "") {
            include "page1/validasi_service/validasi_service.php";
          } elseif ($aksi == "validasi"){ 
            include "page1/validasi_service/validasi.php";
          } elseif ($aksi == "validasi1"){ 
            include "page1/validasi_service/validasi1.php";
          } elseif ($aksi == "validasi2"){ 
            include "page1/validasi_service/validasi2.php";
          } 
        }  elseif ($page == "data_pengajuan_aset"){
        if($aksi == "") {
            include "page1/data_pengajuan_aset/data_pengajuan_aset.php";
          } elseif ($aksi == "buka"){ 
            include "page1/data_pengajuan_aset/data_pengajuan.php";
          }
      }  elseif ($page == "data_service"){
        if($aksi == "") {
            include "page1/data_service/data_service.php";
          } elseif ($aksi == "buka"){ 
            include "page1/data_service/data_pengajuan.php";
          }
      } elseif ($page == ""){
        include "home_depthead.php";
      }
    ?>

   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1" >
								<img src="dist/img/jnt.jpg" width="24" height="24">
							</a>
  <span class="text-muted">&copy; <?php echo date("Y")?> J&T EXPRESS</span>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>

<?php
}else{
  header("location: login.php");
}
?>



<div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_pengajuan_asset.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control" required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm2">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_asset_masuk.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm3">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_asset_keluar.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm4">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_pengembalian.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm5">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_maintenance.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm6">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_service.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-sm7">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_supplier.php">
             `  <label for="">Supplier</label>
                <select name="id_supplier"class="form-control" >

                  <option value="">Pilih Supplier</option>
                  <?php
                    $sql= mysqli_query($koneksi,"SELECT*FROM supplier");
                    while ($data= mysqli_fetch_array($sql)){
                      echo "<option value='$data[id_supplier]'>$data[nama_supplier]</option>";
                    }
                  ?>
                  
                </select>
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modal-sm8">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_kerusakan.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modal-sm9">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_disposal.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" required
                  oninvalid="this.setCustomValidity('Pilih Bulan')" oninput="setCustomValidity('')">
                      <option value="">-- Pilih --</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktoberr</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control"  required
                    oninvalid="this.setCustomValidity('Isi Tahun')" oninput="setCustomValidity('')">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">PRINT</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->