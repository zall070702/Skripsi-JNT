<?php
$today = date("Y-m-d");

if (isset($_POST['batal'])){
  ?>
  <script type="text/javascript">
      window.location.href="?page=brg_keluar_peralatan";
  </script>
  <?php
}

if (isset($_POST['simpan_peralatan'])){

$kd_asset = $_POST['kd_asset'];
$karyawan = $_POST['karyawan'];
$kondisi = $_POST['kondisi'];
$tgl_keluar = $_POST['tgl_keluar'];
$keterangan = $_POST['keterangan'];
$tgl_perawatan = $_POST['tgl_perawatan'];

$ket= 'Diambil Oleh ' . $nrp; 

$status='Terpakai';


// menambah data
  $query = "INSERT INTO perawatan_brg( kd_asset, kondisi, tgl_perawatan, keterangan) VALUES ('$kd_asset','$kondisi','$tgl_perawatan','$keterangan')";
  $sql = $koneksi->query($query);
  //mengubah status
 $query2 = "UPDATE brg_masuk_peralatan SET (kondisi='$kondisi') WHERE kd_asset='$kd_asset'";
 $sql2 = $koneksi->query($query2);
  // $query3 = "UPDATE asset_peralatan SET (tgl_perawatan='$tgl_perawatan',kondisi='$kondisi') WHERE kd_asset='$kd_asset'";
  // $sql3 = $koneksi->query($query3);

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=perawatan_brg";
    </script>
    <?php
  }
}

if (isset($_POST['simpan_komputer'])){

  $kd_asset = $_POST['kd_asset'];
  $karyawan = $_POST['karyawan'];
  $kondisi = $_POST['kondisi'];
  $tgl_keluar = $_POST['tgl_keluar'];
  $keterangan = $_POST['keterangan'];
  $tgl_perawatan = $_POST['tgl_perawatan'];
  
  $ket= 'Diambil Oleh ' . $nrp; 
  
  $status='Terpakai';
  
  
  // menambah data
    $query = "INSERT INTO perawatan_brg( kd_asset_pc, kondisi, tgl_perawatan, keterangan) VALUES ('$kd_asset','$kondisi','$tgl_perawatan','$keterangan')";
    $sql = $koneksi->query($query);
    //mengubah status
    $query2 = "UPDATE brg_masuk_komputer SET (kondisi='$kondisi') WHERE kd_asset_pc='$kd_asset'";
    $sql2 = $koneksi->query($query2);
    // $query3 = "UPDATE asset_peralatan SET (tgl_perawatan='$tgl_perawatan',kondisi='$kondisi') WHERE kd_asset='$kd_asset'";
    // $sql3 = $koneksi->query($query3);
  
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan")
        window.location.href="?page=perawatan_brg";
      </script>
      <?php
    }
  }

  if (isset($_POST['simpan_radio'])){

    $kd_asset = $_POST['kd_asset'];
    $karyawan = $_POST['karyawan'];
    $kondisi = $_POST['kondisi'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $keterangan = $_POST['keterangan'];
    $tgl_perawatan = $_POST['tgl_perawatan'];
    
    
    // menambah data
      $query = "INSERT INTO perawatan_brg( kd_asset_radio, kondisi, tgl_perawatan, keterangan) VALUES ('$kd_asset','$kondisi','$tgl_perawatan','$keterangan')";
      $sql = $koneksi->query($query);
      //mengubah status
      $query2 = "UPDATE brg_masuk_radio SET (kondisi='$kondisi') WHERE kd_asset_radio='$kd_asset'";
      $sql2 = $koneksi->query($query2);
      // $query3 = "UPDATE asset_peralatan SET (tgl_perawatan='$tgl_perawatan',kondisi='$kondisi') WHERE kd_asset='$kd_asset'";
      // $sql3 = $koneksi->query($query3);
    
      if ($sql) {
        ?>
        <script type="text/javascript">
          alert("Data Berhasil Disimpan")
          window.location.href="?page=perawatan_brg";
        </script>
        <?php
      }
    }
?>


<div class="card card-primary card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3"><h3 class="card-title">Tambah Data Perawatan</h3></li>
      <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Peralatan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Laptop/PC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Radio HT</a>
      </li>
    </ul>
</div>
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
        <div class="card mt-1 card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Perawatan Asset Peralatan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kode Asset</label>
                  <select class=" choices form-control" name="kd_asset" required >
                    <option value="" required>Pilih Barang...</option>
                    
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM asset_peralatan ORDER BY kd_asset DESC");
                    while($row = $sql->fetch_assoc()) :
                    ?>
                    <option value="<?= $row['kd_asset']; ?>"><?= $row['kd_asset']; ?> : <?= $row['nama_barang']; ?>/<?= $row['sn']; ?></option>
                    
                    <?php endwhile; ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kondisi Barang</label>
                  <select class="form-control" name="kondisi" required>
                    <option value="">Pilih Kondisi...</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    

                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Perawatan</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_perawatan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Keterangan</label>
                  <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="keterangan"></textarea>
                </div>               
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_peralatan"  class="btn btn-primary btn">Simpan</button>
                <button type="submit" name="batal" class="btn btn-danger btn">Batal</button></a>
              </div>
            </div>
            
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
      <div class="card mt-1 card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Perawatan Asset Laptop/PC</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kode Asset</label>
                  <select class=" choices form-control" name="kd_asset" required >
                    <option value="" required>Pilih Barang...</option>
                    
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_komputer  WHERE status='Belum Terpakai' ORDER BY kd_asset_pc DESC");
                    while($row = $sql->fetch_assoc()) :
                    ?>
                    <option value="<?= $row['kd_asset_pc']; ?>"><?= $row['kd_asset_pc']; ?> : <?= $row['nama_barang']; ?>/<?= $row['sn']; ?></option>
                    
                    <?php endwhile; ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kondisi Barang</label>
                  <select class="form-control" name="kondisi" required>
                    <option value="">Pilih Kondisi...</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    

                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Perawatan</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_perawatan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Keterangan</label>
                  <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="keterangan"></textarea>
                </div>               
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_komputer"  class="btn btn-primary btn">Simpan</button>
                <button type="submit" name="batal" class="btn btn-danger btn">Batal</button></a>
              </div>
            </div>
            
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
      <div class="card mt-1 card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Perawatan Asset Radio HT</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kode Asset</label>
                  <select class=" choices form-control" name="kd_asset" required >
                    <option value="" required>Pilih Barang...</option>
                    
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_radio  WHERE status='Belum Terpakai' ORDER BY kd_asset_radio DESC");
                    while($row = $sql->fetch_assoc()) :
                    ?>
                    <option value="<?= $row['kd_asset_radio']; ?>"><?= $row['kd_asset_radio']; ?> : <?= $row['nama_barang']; ?>/<?= $row['sn']; ?></option>
                    
                    <?php endwhile; ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kondisi Barang</label>
                  <select class="form-control" name="kondisi" required>
                    <option value="">Pilih Kondisi...</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    

                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Perawatan</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_perawatan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Keterangan</label>
                  <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="keterangan"></textarea>
                </div>               
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_radio"  class="btn btn-primary btn">Simpan</button>
                <button type="submit" name="batal" class="btn btn-danger btn">Batal</button></a>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




