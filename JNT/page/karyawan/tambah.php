<?php
if (isset($_POST['simpan'])){

  $nrp = $_POST['nrp'];
  $nama = $_POST['nama'];
  $id_dp = $_POST['id_dp'];
  $jabatan = $_POST['jabatan'];
  
  // menambah data
    $query = "INSERT INTO karyawan (nrp,nama,id_dp,jabatan)   VALUES ('$nrp','$nama','$id_dp','$jabatan')";
    $sql = $koneksi->query($query);
  
    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Data Berhasil Disimpan")
        window.location.href="?page=karyawan";
      </script>
      <?php
    }
  
  
  }
  ?>
<div class="card mt-3 card-gray">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Asset Radio HT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">NRP</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="nrp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" >
                  </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Kode Drop Point</label>
                    <select class="choices form-control" name="id_dp" required >
                      <option value="" required>Pilih Kode DP...</option>
                      
                      <?php 
                      $sql = mysqli_query($koneksi,"SELECT * FROM dp");
                      while($row = $sql->fetch_assoc()) :
                      ?>
                      <option value="<?= $row['id_dp']; ?>">
                        <?= $row['id_dp']; ?> 
                        : 
                        <?= $row['lokasi']; ?>
                      </option>
                      
                      <?php endwhile; ?>

                    </select>
                  </div>
                </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jabatan"  >
                  </div>


                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
