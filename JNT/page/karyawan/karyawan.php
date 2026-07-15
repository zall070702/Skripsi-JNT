<!-- <?php
if (isset($_POST['simpan'])){

  $nrp = $_POST['nrp'];
  $nama = $_POST['nama'];
  $departemen = $_POST['departemen'];
  
  // menambah data
    $query = "INSERT INTO karyawan (nrp,nama,departemen)   VALUES ('$nrp','$nama','$departemen')";
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
  ?> -->

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h3 class="card-title">Data Karyawan</h3>
    </div>
    <div class="card-body">
    <a href="?page=karyawan&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">

        <!-- <div class="form-group">
            
              <div class="card-header">
                <h3 class="card-title">Tambah Data Karyawan</h3>
              </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NRP</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="nrp" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Departemen</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="departemen"  >
                  </div>

                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
        <hr> -->
            <table id="example1" class="table table table-striped table-hover">
                <thead class="">
                <tr align='center'>
                <th>No</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Kode Drop Point</th>
                <th>Jabatan</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM karyawan");

                    while ($data= mysqli_fetch_array($sql)) {
                    ?> <tr align='center'>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['nrp'];?></td>
                        <td><?php echo $data['nama'];?></td>
                        <td><?php echo $data['id_dp'];?></td>
                        <td><?php echo $data['jabatan'];?></td>
                        <td>
                        <a href="?page=karyawan&aksi=ubah&id=<?php echo $data['id_karyawan'];?>"><button   class="btn fas fa-edit"></button></a>
                        <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=karyawan&aksi=hapus&id=<?php echo $data['id_karyawan'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

