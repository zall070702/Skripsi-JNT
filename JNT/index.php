<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include 'koneksi.php';
include 'id_pengajuan_msk.php';

session_start();

if ($_SESSION['admin']) {
    $user =$_SESSION['admin'];
    $sql = $koneksi->query("SELECT * FROM user
    INNER JOIN karyawan using(id_karyawan) 
    WHERE id_user='$user'
    ");
  
    $datanav = $sql->fetch_assoc();
  
    $_SESSION['id_dp'] = $data['id_dp'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>J&T Kalimantan Selatan</title>
    <link href='dist/img/jnt.jpg' rel="shortcut icon">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <!-- Include Choices CSS -->
  <link rel="stylesheet" href="dist/assets/vendors/choices.js/choices.min.css" >
  <!-- Select2 -->
  <link rel="stylesheet" href="tampilan/bower_components/select2/dist/css/select2.min.css">

  
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <link rel="stylesheet" href="select2-master/dist/css/select2.min.css"/>
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
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge" id="notif"></span>
        </a>
        <div  class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div  class="dropdown-divider"></div>
          <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             INNER JOIN supplier using(id_supplier)
             group by id_pengajuan_msk
             ORDER BY pengajuan_msk.tgl_masuk desc Limit 5
             ");
             ?>
            <?php
             while ($data= mysqli_fetch_array($sql)) {
              ?> <tr align='center'>
                <td><a href="?page=pengajuan_asset&aksi=buka&idpengajuanmsk=<?=$data['id_pengajuan_msk']; ?> " class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>Pengajuan
            <?= $data['id_pengajuan_msk']; ?> 
          <?= $data['status']; ?> </a></td>
          
          <?php
            }
        ?>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
    <script src="tampil.js"></script>
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="logo mt-4 pb-3 mb-2 d-flex">
        <div class="image">
          <a href="index.php">
          <img src="dist/img/logo.png"  center width="230px" height="auto" class="img" alt="User Image"> 
          </a>
        </div>
      </div>
<hr>
<div>

      <h3 class="profile-username text-center"><?php echo $datanav['nama'];?></h3>

                <p class="text-muted text-center"><b><?php echo $datanav['nrp'];?></b></p>
                <p class="text-muted text-center"><b><?php echo $datanav['id_dp'];?></b></p>
      <h3 align='center'><?php echo $datanav['jabatan'];?></h3>
      </div>
      
      <hr>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="index.php" class="nav-link active" style="background-color:red; color:white;">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Master Data
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                <a href="?page=asset" class="nav-link ">
                <i class="nav-icon fas fa-file"></i>
                  <p>
                    Data Aset 
                  </p>
                </a>                
              </li>
              <li class="nav-item has-treeview ">
                <a href="?page=dp" class="nav-link ">
                <i class="nav-icon fas fa-home"></i>
                  <p>
                    Drop Point
                  </p>
                </a>                
              </li>
                     
              <li class="nav-item has-treeview ">
                <a href="?page=karyawan" class="nav-link ">
                <i class="nav-icon fas fas fa-users"></i>
                  <p>
                    Karyawan
                  </p>
                </a>                
              </li>
              <li class="nav-item has-treeview ">
                <a href="?page=supplier" class="nav-link ">
                <i class="nav-icon fas fas fa-user"></i>
                  <p>
                    Supplier
                  </p>
                </a>                
              </li>
              <li class="nav-item has-treeview ">
                <a href="?page=jasa_service" class="nav-link ">
                <i class="nav-icon fas fas fa-user"></i>
                  <p>
                    Tempat Service
                  </p>
                </a>                
              </li>
            <!--<li class="nav-item has-treeview ">
                <a href="?page=daftar" class="nav-link ">
                <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Pendaftaran
                  </p>
                </a>                
              </li> -->
            </ul>
          </li>  
          
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pengajuan Aset
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page=pengajuan_asset" class="nav-link ">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Pengajuan Aset
                              
                  </p>
                </a>           
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page=pengajuan_asset_diterima" class="nav-link ">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Pengajuan Aset Diterima        
                  </p>
                </a>           
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Data Barang Aset Masuk
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page=brg_masuk_peralatan" class="nav-link ">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Barang Aset Masuk
                              
                  </p>
                </a>           
              </li>
              <!-- <li class="nav-item has-treeview ">
                    <a href="?page=brg_masuk_radio" class="nav-link ">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Barang Radio HT Masuk
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                    <a href="?page=brg_masuk_komputer" class="nav-link ">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Barang PC/Laptop Masuk
                              
                  </p>
                </a>           
              </li> -->
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
                <p>
                Pengajuan Aset DP      
                <i class="nav-icon fas fa-angle-left right"></i>        
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                <a href="?page=penggunaan_aset" class="nav-link ">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Pengajuan Penggunaan Aset
                  </p>
                </a>           
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-upload"></i>
              <p>
                Data Barang Aset Keluar
                <i class="nav-icon fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                    <a href="?page=brg_keluar_peralatan" class="nav-link ">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Barang Aset Keluar
                              
                  </p>
                </a>           
              </li>
              <!-- <li class="nav-item has-treeview ">
                    <a href="?page=brg_keluar_radio" class="nav-link ">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Barang Radio HT Keluar
                              
                  </p>
                </a>           
              </li>
              <li class="nav-item has-treeview ">
                    <a href="?page=brg_keluar_komputer" class="nav-link ">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Barang PC/Notebook Keluar
                              
                  </p>
                </a>           
              </li> -->
            </ul>
          </li>

          

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tools"></i>
                <p>
                Maintenance & Service      
                <i class="nav-icon fas fa-angle-left right"></i>        
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                <a href="?page=maintenance_asset" class="nav-link ">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>
                    Maintenance
                  </p>
                </a>           
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                <a href="?page=service_brg" class="nav-link ">
                  <i class="nav-icon fas fa-exclamation-circle"></i>
                  <p>
                    Service
                              
                  </p>
                </a>           
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview ">
                <a href="?page=kerusakan_brg" class="nav-link ">
                  <i class="nav-icon fas fa-trash"></i>
                  <p>
                  Kerusakan  
                              
                  </p>
                </a>           
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview ">
            <a href="?page=daily" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Data Daily
              </p>
            </a>                
          </li>
          <li class="nav-item has-treeview ">
            <a href="?page=pr" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
              <p>
                PR/PO
              </p>
            </a>                
          </li>  

          <li class="nav-item has-treeview ">
                <a href="?page=nonasset" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                BA Kerusakan                                         
              </p>
            </a>           
          </li> -->

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
              <a href="#" class="nav-link ">
                <i class="nav-icon far fa-file-pdf"></i>
                <p>
                  Laporan Aset
                  <i class="nav-icon fas fa-angle-left right"></i>                
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm10">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                      Laporan Data Asset
                                
                    </p>
                  </a>           
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm11">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                      Laporan Kategori Aset
                                
                    </p>
                  </a>           
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm12">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                      Laporan Kondisi Aset
                                
                    </p>
                  </a>           
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm13">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                      Laporan Lokasi Aset
                                
                    </p>
                  </a>           
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm14">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                      Laporan Harga Aset
                                
                    </p>
                  </a>           
                </li>
                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm15">
                    <i class="nav-icon fas fa-file-pdf"></i>
                    <p>
                      Laporan Status Penggunaan 
                                
                    </p>
                  </a>           
                </li>
              </ul>
            </li>

              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Pengajuan Asset
                              
                  </p>
                </a>           
              </li>
              
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm2">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Asset Masuk
                              
                  </p>
                </a>           
              </li> 
              <li class="nav-item has-treeview ">
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm4">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Permintaan Aset
                              
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
                <a class="nav-link " data-toggle="modal" data-target="#modal-sm7">
                  <i class="nav-icon far fa-file-pdf"></i>
                  <p>
                    Laporan Supplier
                              
                  </p>
                </a>           
              </li>



            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                <i class="nav-icon far fa-file-pdf"></i>
                <p>
                  Laporan Monitoring
                  <i class="nav-icon fas fa-angle-left right"></i>                
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item has-treeview ">
                  <a class="nav-link " data-toggle="modal" data-target="#modal-sm5">
                    <i class="nav-icon fas fa-file-pdf"></i>
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
                    <i class="nav-icon fas fa-file-pdf"></i>
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
      $page = $_GET['page'];
      $aksi = $_GET['aksi'];

      if($page == "asset_peralatan") {
        if ($aksi == "buka") {
          include "page/asset_peralatan/asset_peralatan.php";
        } elseif ($aksi == "detail"){ 
          include "page/asset_peralatan/detail_brg.php";
        } elseif ($aksi == "ubah"){
          include "page/asset_peralatan/ubah.php";
        } elseif ($aksi == "hapus"){
          include "page/asset_peralatan/hapus.php";
        } 
      } elseif ($page == "asset"){
        if($aksi == "") {
            include "page/asset/asset.php";
          } elseif ($aksi == "tambah"){ 
            include "page/asset/tambah.php";
          } elseif ($aksi == "buka"){
            include "page/asset/stok_barang.php";
          } elseif ($aksi == "hapus"){
            include "page/asset/hapus.php";
          } 
      } elseif ($page == "dp"){
        if($aksi == "") {
            include "page/dp/dp.php";
          } elseif ($aksi == "tambah"){ 
            include "page/asset/tambah.php";
          } elseif ($aksi == "buka"){
            include "page/asset/stok_barang.php";
          } elseif ($aksi == "hapus"){
            include "page/asset/hapus.php";
          } 
      } elseif ($page == "penggunaan_aset"){
         if ($aksi == "") {
          include "page/penggunaan_aset/penggunaan_aset.php";
        } elseif ($aksi == "validasi"){ 
          include "page/penggunaan_aset/validasi.php";
        } elseif ($aksi == "tambah"){
          include "page/penggunaan_aset/tambah.php";
        } elseif ($aksi == "terima"){
          include "page/penggunaan_aset/terima.php";
        } elseif ($aksi == "tolak"){
          include "page/penggunaan_aset/tolak.php";
        } elseif ($aksi == "ubah"){
          include "page/penggunaan_aset/ubah.php";
        } elseif ($aksi == "hapus"){
          include "page/penggunaan_aset/hapus.php";
        }
      }elseif ($page == "asset_komputer"){
        if($aksi == "buka") {
            include "page/asset_komputer/asset_komputer.php";
          } elseif ($aksi == "tambah"){ 
            include "page/asset_komputer/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/asset_komputer/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/asset_komputer/hapus.php";
          }
      }elseif ($page == "pengajuan_asset"){
        if($aksi == "") {
            include "page/pengajuan_asset/pengajuan_asset.php";
          } elseif ($aksi == "tambah"){ 
            include "page/pengajuan_asset/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/pengajuan_asset/ubah.php";
          } elseif ($aksi == "hapus1"){
            include "page/pengajuan_asset/hapus1.php";
          } elseif ($aksi == "buka"){
            include "page/pengajuan_asset/buka.php";
          }
      }elseif ($page == "pengajuan_asset_diterima"){
        if($aksi == "") {
            include "page/pengajuan_asset_diterima/pengajuan_asset_diterima.php";
          } elseif ($aksi == "buka"){ 
            include "page/pengajuan_asset_diterima/aset_diterima.php";
          } elseif ($aksi == "masuk"){
            include "page/pengajuan_asset_diterima/masuk.php";
          } elseif ($aksi == "hapus"){
            include "page/pengajuan_asset_diterima/hapus.php";
          }
      }elseif ($page == "brg_masuk_peralatan"){
        if($aksi == "") {
            include "page/brg_masuk_peralatan/brg_masuk_peralatan.php";
          } elseif ($aksi == "tambah"){ 
            include "page/brg_masuk_peralatan/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/brg_masuk_peralatan/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/brg_masuk_peralatan/hapus.php";
          }
      }elseif ($page == "brg_masuk_komputer"){
        if($aksi == "") {
            include "page/brg_masuk_komputer/brg_masuk_komputer.php";
          } elseif ($aksi == "tambah"){ 
            include "page/brg_masuk_komputer/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/brg_masuk_komputer/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/brg_masuk_komputer/hapus.php";
          }
      }elseif ($page == "brg_masuk_radio"){
        if($aksi == "") {
            include "page/brg_masuk_radio/brg_masuk_radio.php";
          } elseif ($aksi == "tambah"){ 
            include "page/brg_masuk_radio/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/brg_masuk_radio/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/brg_masuk_radio/hapus.php";
          }
      }elseif ($page == "brg_keluar_peralatan"){
        if($aksi == "") {
            include "page/brg_keluar_peralatan/brg_keluar_peralatan.php";
          } elseif ($aksi == "tambah"){ 
            include "page/brg_keluar_peralatan/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/brg_keluar_peralatan/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/brg_keluar_peralatan/hapus.php";
          }
      }elseif ($page == "brg_keluar_radio"){
        if($aksi == "") {
            include "page/brg_keluar_radio/brg_keluar_radio.php";
          } elseif ($aksi == "tambah"){ 
            include "page/brg_keluar_radio/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/brg_keluar_radio/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/brg_keluar_radio/hapus.php";
          }
      }elseif ($page == "brg_keluar_komputer"){
        if($aksi == "") {
            include "page/brg_keluar_komputer/brg_keluar_komputer.php";
          } elseif ($aksi == "tambah"){ 
            include "page/brg_keluar_komputer/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/brg_keluar_komputer/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/brg_keluar_komputer/hapus.php";
          }
      }elseif ($page == "pengembalian_asset"){
        if($aksi == "") {
            include "page/pengembalian_asset/pengembalian_asset.php";
          } elseif ($aksi == "tambah"){ 
            include "page/pengembalian_asset/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/pengembalian_asset/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/pengembalian_asset/hapus.php";
          }
      }elseif ($page == "maintenance_asset"){
        if($aksi == "") {
            include "page/maintenance_asset/maintenance_asset.php";
          } elseif ($aksi == "tambah"){ 
            include "page/maintenance_asset/tambah.php";
          } elseif ($aksi == "ubah"){
            include "page/maintenance_asset/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/maintenance_asset/hapus.php";
          }
      }elseif ($page == "service_brg"){
        if($aksi == "") {
            include "page/service_brg/service_brg.php";
          } elseif ($aksi == "tambah"){ 
            include "page/service_brg/tambah.php";
          } elseif ($aksi == "input"){ 
            include "page/service_brg/input.php";
          } elseif ($aksi == "input1"){ 
            include "page/service_brg/input1.php";
          } elseif ($aksi == "input2"){ 
            include "page/service_brg/input2.php";
          } elseif ($aksi == "input_selesai"){ 
            include "page/service_brg/input_selesai.php";
          } elseif ($aksi == "input_selesai1"){ 
            include "page/service_brg/input_selesai1.php";
          } elseif ($aksi == "input_selesai2"){ 
            include "page/service_brg/input_selesai2.php";
          } elseif ($aksi == "service_selesai"){
            include "page/service_brg/service_selesai.php";
          } elseif ($aksi == "hapus"){
            include "page/service_brg/hapus.php";
          }
      }elseif ($page == "kerusakan_brg"){
        if($aksi == "") {
            include "page/kerusakan_brg/kerusakan_brg.php";
          } elseif ($aksi == "tambah_disposal"){ 
            include "page/kerusakan_brg/tambah_disposal.php";
          } elseif ($aksi == "tambah_disposal1"){ 
            include "page/kerusakan_brg/tambah_disposal1.php";
          } elseif ($aksi == "tambah_disposal2"){ 
            include "page/kerusakan_brg/tambah_disposal2.php";
          } elseif ($aksi == "ubah"){
            include "page/kerusakan_brg/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/kerusakan_brg/hapus.php";
          }
      }elseif ($page == "karyawan"){
        if($aksi == "") {
            include "page/karyawan/karyawan.php";
          } elseif ($aksi == "tambah"){ 
            include "page/karyawan/tambah.php";
          }elseif ($aksi == "ubah"){
            include "page/karyawan/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/karyawan/hapus.php";
          }
      }elseif ($page == "supplier"){
        if($aksi == "") {
            include "page/supplier/supplier.php";
          } elseif ($aksi == "tambah"){ 
            include "page/supplier/tambah.php";
          }elseif ($aksi == "ubah"){
            include "page/supplier/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/supplier/hapus.php";
          }
      }elseif ($page == "jasa_service"){
        if($aksi == "") {
            include "page/jasa_service/jasa_service.php";
          } elseif ($aksi == "tambah"){ 
            include "page/jasa_service/tambah.php";
          }elseif ($aksi == "ubah"){
            include "page/jasa_service/ubah.php";
          } elseif ($aksi == "hapus"){
            include "page/jasa_service/hapus.php";
          }
      }elseif ($page == "daftar"){
        include "page/daftar/daftar.php";

      } elseif ($page == ""){
        include "home.php";
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
  <!-- Select2 -->
  <script src="tampilan/bower_components/select2/dist/js/select2.full.min.js"></script>
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
<!-- Include Choices JavaScript -->
<script src="dist/assets/vendors/choices.js/choices.min.js"></script>
<script src="dist/assets/js/pages/form-element-select.js"></script>

<script src="jquery-2.1.4.min.js"></script>
<script src="select2-master/dist/js/select2.min.js"></script>
<script src="jquery.masknumber.js"></script>
<script src="tampil.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="POST" action="page/laporan/laporan_pengajuan_asset.php">

                <div class="modal-header">
                    <h4 class="modal-title">Pilih Filter Laporan Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan" >
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
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Tahun</label>
                            <input type="text"
                                   name="tahun"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label>Validasi</label>
                            <select class="form-control" name="validasi" required>
                                <option value="DITERIMA">DITERIMA</option>
                                <option value="DITOLAK">DITOLAK</option>
                            </select>
                        </div>
  
                    </div>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">
                        Tutup
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        PRINT
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

      <div class="modal fade" id="modal-sm2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

             <form method="POST" action="page/laporan/laporan_asset_masuk.php">

            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                    <div class="row">

                        <div class="col-md-4">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan" >
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
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Tahun</label>
                            <input type="text"
                                   name="tahun"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label>Nama Kategori</label>
                            <select class="form-control" name="kategori">
                              <option value="">Pilih Kategori</option>
                              <?php 
                                $sql = mysqli_query($koneksi,"SELECT * FROM kategori_brg");
                                while($row = $sql->fetch_assoc()) :
                                ?>
                                <option value="<?= $row['id_kategori']; ?>"><?= $row['kategori']; ?> </option>
                                
                                <?php endwhile; ?>
                            </select>
                        </div>
  
                    </div>
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
                <select class="form-control" name="bulan"
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
      /.modal

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
             <form method="POST" action="page/laporan/laporan_permintaan_aset.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan"
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
                <select class="form-control" name="bulan" 
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
                <select class="form-control" name="bulan" 
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
                <select class="form-control" name="bulan" 
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
                <select class="form-control" name="bulan" 
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
                <select class="form-control" name="bulan" 
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


      <div class="modal fade" id="modal-sm10">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_aset.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" 
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

<div class="modal fade" id="modal-sm11">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_kategori.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" 
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

      <div class="modal fade" id="modal-sm12">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_kondisi.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" 
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

      <div class="modal fade" id="modal-sm13">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_lokasi.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" 
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

      <div class="modal fade" id="modal-sm14">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_harga.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" 
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

      <div class="modal fade" id="modal-sm15">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST" action="page/laporan/laporan_status_penggunaan.php">
                <label for="">Bulan</label>
                <select class="form-control" name="bulan" 
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
