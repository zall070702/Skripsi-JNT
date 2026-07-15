
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Mahasiswa</label>
                    <input type="text" class="form-control" id="id_mahasiswa" onkeyup="isi_otomatis()" name="id_mahasiswa" placeholder="Pilih ID">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat1">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama..." readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat1">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat1">Alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat" placeholder="Alamat" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat1">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" readonly> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat1">Kelas</label>
                    <select class="form-control" name="id_kelas">
                        <option value="">--> PILIH KELAS <--  </option>
                        <?php
                          $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
                          while ($data= mysqli_fetch_array($sql)) {  
                          echo "<option value='$data[id_kelas]'>$data[kelas] </option>";   
                          }
                        ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


        <script type="text/javascript">
            function isi_otomatis(){
                var id_mahasiswa = $("#id_mahasiswa").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"id_mahasiswa="+id_mahasiswa ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#jenis_kelamin').val(obj.jenis_kelamin);
                    $('#alamat').val(obj.alamat);
                    $('#telepon').val(obj.telepon);
                });
            }
</script>
         


<?php
if (isset($_POST['simpan'])) {
  
$id_mahasiswa = $_POST['id_mahasiswa'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$id_kelas = $_POST['id_kelas'];



  $sql= mysqli_query($koneksi,"INSERT INTO mahasiswa (id_mahasiswa,nama,jenis_kelamin,alamat,telepon,id_kelas)VALUES
    ('$id_mahasiswa','$nama','$jenis_kelamin','$alamat','$telepon','$id_kelas')");

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