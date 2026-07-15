<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">DASHBOARD</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->  
    </div><!-- /.container-fluid -->
</div>
<div class="image">
         <center> <img src="dist/img/logo.png"  center width="800px" height="auto" class="img" alt="User Image"> 
         </center>
         <br>
        </div>
<div class="main-content">
     <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                <?php
                    // mengambil data 
                        $data_peralatan= mysqli_query($koneksi,"SELECT * FROM asset_peralatan");
 
                    // menghitung data 
                    $jumlah_peralatan = mysqli_num_rows($data_peralatan);
                    ?>
                    <h3><?php echo $jumlah_peralatan; ?></h3>

                    <p>Jumlah Total Aset</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="?page=asset" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <?php
                    // mengambil data 
                        $data_karyawan= mysqli_query($koneksi,"SELECT * FROM karyawan");
 
                    // menghitung data 
                    $jumlah_karyawan = mysqli_num_rows($data_karyawan);
                    ?>
                    <h3><?php echo $jumlah_karyawan ?></h3>

                    <p>Karyawan Terdaftar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="?page=karyawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <!-- <div class="col-lg-3 col-6">
                
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Asset Terpakai</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->
            <!-- ./col -->
            
        </div>
     </div>
<!--      
     <div class="card bg-gradient-success">
        <div class="card-header border-0">

        <h3 class="card-title">
            <i class="far fa-calendar-alt"></i>
            Calendar
        </h3>
        
            <div class="card-tools">
                
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                        <a href="#" class="dropdown-item">Add new event</a>
                        <a href="#" class="dropdown-item">Clear events</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        
        </div>
        
        <div class="card-body pt-0">
        
            <div id="calender" style="width: 100%"></div>
        </div>
    </div> -->
</div>