<?php
$today = date("Y-m-d");


$query = "SELECT max(id_kembali) as maxid from kembalikan_brg";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
$id_kembali = $data['maxid'];

$nourut = (int) substr($id_kembali,2,6);
$nourut++;
$char = "PB";
$newid = $char.sprintf("%06s",$nourut);

?>


<div class="card card-primary card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
      <li class="pt-2 px-3"><h3 class="card-title">Tambah Data Pengembalian Barang Asset</h3></li>
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
        <div class="card mt-1 card-gray">
          <div class="card-header">
            <h3 class="card-title">Tambah Pengembalian Asset Peralatan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Barang Asset</label>
                  <select class="form-control" name="kd_asset" required oninvalid="this.setCustomValidity('Barang Asset Belum Dipilih')" oninput="setCustomValidity('')">
                    <option value="" required>Pilih Kode Asset...</option>
                    
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM  brg_keluar_peralatan
                    INNER JOIN brg_masuk_peralatan using(kd_asset)
                    Where status='Terpakai' 
                    ORDER BY kd_asset DESC");
                    while($row = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?= $row['kd_asset']; ?>"><?= $row['kd_asset']; ?> : <?= $row['nama_barang']; ?></option>
                    
                    <?php } ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_kembalikan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Catatan pengembalian</label>
                  <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="catatan"></textarea>
                </div>               
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_peralatan"  class="btn btn-success btn">Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
      <div class="card mt-1 card-gray">
          <div class="card-header">
            <h3 class="card-title">Tambah pengembalian Asset Laptop/PC</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kode Asset</label>
                  <select class="form-control" name="kd_asset_pc" required oninvalid="this.setCustomValidity('Barang Asset Belum Dipilih')" oninput="setCustomValidity('')">
                    <option value="" required>Pilih Barang...</option>
                    
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM  brg_keluar_komputer
                    INNER JOIN brg_masuk_komputer using(kd_asset_pc)
                    Where status='Terpakai' 
                    ORDER BY kd_asset_pc DESC");
                    while($row = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?= $row['kd_asset_pc']; ?>"><?= $row['kd_asset_pc']; ?> : <?= $row['nama_barang']; ?></option>
                    
                    <?php } ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_kembalikan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputDescription">Catatan Pengembalian</label>
                  <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="catatan"></textarea>
                </div>               
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_komputer"  class="btn btn-success btn">Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
      <div class="card mt-1 card-gray">
          <div class="card-header">
            <h3 class="card-title">Tambah Pengembalian Asset Radio HT</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kode Asset</label>
                  <select class="form-control" name="kd_asset_radio" required oninvalid="this.setCustomValidity('Barang Asset Belum Dipilih')" oninput="setCustomValidity('')">
                    <option value="" required>Pilih Barang...</option>
                    
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM  brg_keluar_radio
                    INNER JOIN brg_masuk_radio using(kd_asset_radio)
                    Where status='Terpakai' 
                    ORDER BY kd_asset_radio DESC");
                    while($row = $sql->fetch_assoc()) {
                    ?>
                    <option value="<?= $row['kd_asset_radio']; ?>"><?= $row['kd_asset_radio']; ?> : <?= $row['nama_barang']; ?></option>
                    
                    <?php } ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_kembalikan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Catatan Pengembalian</label>
                  <textarea id="inputDescription" class="form-control" rows="4" type="text" class="form-control" id="exampleInputEmail1" name="catatan"></textarea>
                </div>               
                
              <!-- /.card-body -->

              <div class="">
                <button type="submit" name="simpan_radio"  class="btn btn-success btn">Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['simpan_peralatan'])){

$kd_asset = $_POST['kd_asset'];
$catatan = $_POST['catatan'];
$tgl_kembalikan = $_POST['tgl_kembalikan'];

$status='Belum Terpakai';


// menambah data
  $query = "INSERT INTO kembalikan_brg( id_kembali, kd_asset, tgl_kembalikan, catatan) VALUES ('$newid', '$kd_asset', '$tgl_kembalikan', '$catatan')";
  $sql = $koneksi->query($query);
  //mengubah status Barang
  $query3 = "UPDATE brg_masuk_peralatan SET (status='$status') WHERE kd_asset='$kd_asset'";
  $sql3 = $koneksi->query($query3);

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=pengembalian_asset";
    </script>
    <?php
  }
}

if (isset($_POST['simpan_komputer'])){

    $kd_asset = $_POST['kd_asset_pc'];
    $catatan = $_POST['catatan'];
    $tgl_kembalikan = $_POST['tgl_kembalikan'];
    
    $status='Belum Terpakai';
  
  
  // menambah data
  $query = "INSERT INTO kembalikan_brg( id_kembali, kd_asset_pc, tgl_kembalikan, catatan) VALUES ('$newid', '$kd_asset', '$tgl_kembalikan', '$catatan')";
  $sql = $koneksi->query($query);
  //mengubah status Barang
  $query3 = "UPDATE brg_masuk_komputer SET status='$status' WHERE kd_asset_pc='$kd_asset'";
  $sql3 = $koneksi->query($query3);
  
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan")
        window.location.href="?page=pengembalian_asset";
      </script>
      <?php
    }
  }

  if (isset($_POST['simpan_radio'])){

    $kd_asset = $_POST['kd_asset_radio'];
    $catatan = $_POST['catatan'];
    $tgl_kembalikan = $_POST['tgl_kembalikan'];
    
    $status='Belum Terpakai';
    
    // menambah data
    $query = "INSERT INTO kembalikan_brg( id_kembali, kd_asset_radio, tgl_kembalikan, catatan) VALUES ('$newid', '$kd_asset', '$tgl_kembalikan', '$catatan')";
    $sql = $koneksi->query($query);
    //mengubah status Barang
    $query3 = "UPDATE brg_masuk_radio SET (status='$status') WHERE kd_asset_radio='$kd_asset'";
    $sql3 = $koneksi->query($query3);
    
      if ($sql) {
        ?>
        <script type="text/javascript">
          alert("Data Berhasil Disimpan")
          window.location.href="?page=pengembalian_asset";
        </script>
        <?php
      }
    }
?>


