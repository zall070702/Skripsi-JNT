<?php
$query = "SELECT max(id_nonasset) as maxid from brg_nonasset";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($hasil);
$id_nonasset = $data['maxid'];

$nourut = (int) substr($id_nonasset,3,3);
$nourut++;
$char = "NAST";
$newid = $char . sprintf("%03s" , $nourut);

?>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Mahasiswa</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id_nonasset" 
                    value="<?php echo $newid;?>" placeholder="Masukkan Id" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                      <option value="">-- Pilih Jenis Kelamin --</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="telepon"  >
                  </div>     
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <select class="form-control" name="id_kelas">
                      <option value="">--> Pilih Kelas <--</option>
                      <?php
                      $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
                      while ($data= mysqli_fetch_array($sql)) { 
                        echo "<option value='$data[id_kelas]'> $data[kelas] </option>";
                      }
                      ?>
                    </select>
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

$id_nonasset = $_POST['id_nonasset'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$id_kelas = $_POST['id_kelas'];


  $sql = mysqli_query($koneksi,"INSERT INTO mahasiswa (id_nonasset,nama,jenis_kelamin,alamat,telepon,id_kelas)VALUES('$id_nonasset','$nama','$jenis_kelamin','$alamat','$telepon','$id_kelas')");

  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href="?page=mahasiswa";
    </script>
    <?php
  }


}
?>