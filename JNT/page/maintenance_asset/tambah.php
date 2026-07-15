<?php
$today = date("Y-m-d");


$query = "SELECT max(id_perawatan) as maxid from perawatan_brg";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
$id_perawatan = $data['maxid'];

$nourut = (int) substr($id_perawatan,4,6);
$nourut++;
$char = "MTNC";
$newid = $char.sprintf("%06s",$nourut);

?>


<div class="card card-primary card-tabs">
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-two-tabContent">
      <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
        <div class="card mt-1 card-danger">
          <div class="card-header">
            <h3 class="card-title">Tambah Maintenance Asset Peralatan</h3>
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
                    $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan 
                    Where NOT kondisi_brg='Disposal' 
                    ORDER BY kd_asset DESC");
                    while($row = $sql->fetch_assoc()) :
                    ?>
                    <option value="<?= $row['kd_asset']; ?>"><?= $row['kd_asset']; ?> : <?= $row['nama_barang']; ?>/<?= $row['sn']; ?></option>
                    
                    <?php endwhile; ?>

                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Jenis Maintenance</label>
                  <select class="form-control" name="jenis_maintenance" required oninvalid="this.setCustomValidity('Jenis Maintenance Belum Dimasukkan')" oninput="setCustomValidity('')">
                    <option value="">Pilih Jenis Maintenance...</option>
                    <option value="Pembersihan Asset">Pembersihan Asset</option>
                    <option value="Penggantian Part Asset">Penggantian Part Asset</option>
                    <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Status Barang</label>
                  <select class="form-control" name="status_brg" required oninvalid="this.setCustomValidity('Status Barang Belum Dimasukkan')" oninput="setCustomValidity('')">
                    <option value="">Pilih Status...</option>
                    <option value="Bagus">Bagus</option>
                    <option value="Service">Service</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kondisi Barang</label>
                  <select class="form-control" name="kondisi" required oninvalid="this.setCustomValidity('Kondisi Barang Belum Dimasukkan')" oninput="setCustomValidity('')">
                    <option value="">Pilih Kondisi...</option>
                    <option value="100%">100%</option>
                    <option value="80%">80%</option>
                    <option value="50%">50%</option>
                    <option value="10%">10%</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Maintenance</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" class="form-control" name="tgl_perawatan" id="exampleInputEmail1" value="<?= $today; ?>" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Catatan Maintenance</label>
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
    </div>
  </div>
</div>

<?php
if (isset($_POST['simpan_peralatan'])){

$kd_asset = $_POST['kd_asset'];
$jenis_maintenance = $_POST['jenis_maintenance'];
$kondisi = $_POST['kondisi'];
$tgl_keluar = $_POST['tgl_keluar'];
$catatan = $_POST['catatan'];
$tgl_perawatan = $_POST['tgl_perawatan'];
$status_brg = $_POST['status_brg'];

$ket= 'Diambil Oleh ' . $nrp; 

$status='Terpakai';


// menambah data
  $query = "INSERT INTO perawatan_brg( id_perawatan, kd_asset,  jenis_maintenance, kondisi, status_brg, tgl_perawatan, catatan) VALUES ('$newid', '$kd_asset', '$jenis_maintenance', '$kondisi', '$status_brg', '$tgl_perawatan','$catatan')";
  $sql = $koneksi->query($query);
  //mengubah status Barang
  $query3 = "UPDATE brg_masuk_peralatan SET kondisi_asset='$kondisi', kondisi_brg='$status_brg' WHERE kd_asset='$kd_asset'";
  $sql3 = $koneksi->query($query3);

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=maintenance_asset";
    </script>
    <?php
  }
}
?>


