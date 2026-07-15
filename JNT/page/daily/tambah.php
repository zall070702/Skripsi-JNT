<?php
$query = "SELECT max(id_daily) as maxid from daily";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_daily = $data['maxid'];

$nourut = (int) substr($id_daily,3,3);
$nourut++;
$char = "IS";
$newid = $char . sprintf("%03s" , $nourut);

?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Daily</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Laporan Daily</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_daily" 
                    value="<?php echo $newid;?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Departemen</label>
                    <select class="form-control" name="dept">
                      <option value="">-- Pilih Departemen --</option>
                      <option value="All Dept">All Dept</option>
                      <option value="Plant">Plant</option>
                      <option value="SHE">SHE</option>
                      <option value="LOG">LOG</option>
                      <option value="HR">HR</option>
                      <option value="CVL">CVL</option>
                      <option value="CSR">CSR</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Isu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="isu"  >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select class="form-control" name="kategori">
                      <option value="">Pilih Kategori</option>
                      <option value="Hardware">Hardware</option>
                      <option value="Software">Software</option>
                      <option value="Network">Network</option>
                      <option value="System">System</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Device</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="device"  >
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Lapor</label>
                            <div class="col-sm-4">
                                <input type="date" required class="form-control" class="form-control" name="tgl_lapor" id="exampleInputEmail1">
                            </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Batas Waktu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="waktu"  >
                  </div>               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status">
                      <option value="">Status</option>
                      <option value="Hold">Hold</option>
                      <option value="Solved">Solved</option>
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                  <a href="?page=daily"><button type="submit" name="batal"  class="btn btn-danger">Batal</a>
                </div>
                
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

$id_daily = $_POST['id_daily'];
$dept = $_POST['dept'];
$isu = $_POST['isu'];
$kategori = $_POST['kategori'];
$device = $_POST['device'];
$tgl_lapor = $_POST['tgl_lapor'];
$waktu = $_POST['waktu'];
$status = $_POST['status'];


  $sql = mysqli_query($koneksi,"INSERT INTO daily (id_daily,dept,isu,kategori,device,tgl_lapor,waktu,status)VALUES('$id_daily','$dept','$isu','$kategori','$device','$tgl_lapor','$waktu','$status')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=daily";
    </script>
    <?php
  }


}
?>