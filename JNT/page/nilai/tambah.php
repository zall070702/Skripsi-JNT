<?php
$query = "SELECT max(id_nilai) as maxid from nilai";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_nilai = $data['maxid'];

$nourut = (int) substr($id_nilai,3,3);
$nourut++;
$char = "N";
$newid = $char . sprintf("%03s" , $nourut);

?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data nilai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID nilai</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_nilai" 
                    value="<?php echo $newid;?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mahasiswa</label>
                    <select class="form-control" name="id_mahasiswa">
                      <option value="">--> Pilih Mahasiswa <--</option>
                      <?php
                      $sql = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
                      while ($data= mysqli_fetch_array($sql)) { 
                        echo "<option value='$data[id_mahasiswa]'> $data[nama] </option>";
                      }
                      ?>
                    </select>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai Harian</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nilai_harian"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai UTS</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nilai_uts"  >
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai UAS</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nilai_uas"  >
                  </div>     
                           
                       
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
<?php
if (isset($_POST['simpan'])){

$id_nilai = $_POST['id_nilai'];
$id_mahasiswa = $_POST['id_mahasiswa'];
$nilai_harian = $_POST['nilai_harian'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];


  $sql = mysqli_query($koneksi,"INSERT INTO nilai (id_nilai,id_mahasiswa,nilai_harian,nilai_uts,nilai_uas)VALUES('$id_nilai','$id_mahasiswa','$nilai_harian','$nilai_uts','$nilai_uas')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=nilai";
    </script>
    <?php
  }


}
?>