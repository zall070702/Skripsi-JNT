<?php
$id = $_GET['id'];
$sql=mysqli_query($koneksi,"SELECT * FROM daily WHERE id_daily='$id'");
$data=mysqli_fetch_assoc($sql);
?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Daily Selesai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Daily</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_daily" 
                    value="<?php echo $data['id_daily'];?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Isu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="isu"  value="<?php echo $data['isu'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-4">
                                <input type="date" required class="form-control" class="form-control" name="tgl_selesai" id="exampleInputEmail1">
                            </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status" value="<?php echo $data['tgl_selesai'];?>">
                      <option value="">Status</option>
                      <option value="Hold">Hold</option>
                      <option value="Solved">Solved</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="keterangan"  value="<?php echo $data['keterangan'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Solusi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="solusi"  value="<?php echo $data['solusi'];?>">
                  </div>                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="selesai"  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<?php
if (isset($_POST['selesai'])){

  $id_daily = $_POST['id_daily'];
  $dept = $_POST['dept'];
  $isu = $_POST['isu'];
  $kategori = $_POST['kategori'];
  $device = $_POST['device'];
  $tgl_lapor = $_POST['tgl_lapor'];
  $waktu = $_POST['waktu'];
  $tgl_selesai = $_POST['tgl_selesai'];
  $status = $_POST['status'];
  $keterangan = $_POST['keterangan'];
  $solusi = $_POST['solusi'];


  $sql = mysqli_query($koneksi,"UPDATE daily SET id_daily='$id_daily',isu='$isu',tgl_selesai='$tgl_selesai',status='$status',keterangan='$keterangan', solusi='$solusi' WHERE id_daily='$id_daily'");

  if ($sql) {

    ?>
    <script type="text/javascript">
      alert("Data Berhasil Diubah")
      window.location.href="?page=daily";
    </script>
    <?php
  }
}

