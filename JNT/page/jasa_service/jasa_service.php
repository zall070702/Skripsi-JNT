

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h3 class="card-title">Data Tempat Service</h3>
    </div>
    <div class="card-body">
    <a href="?page=jasa_service&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">

        <!-- <div class="form-group">
            
              <div class="card-header">
                <h3 class="card-title">Tambah Data service</h3>
              </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">id_jasa</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="id_jasa" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">nama_service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_service" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">alamat_service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat_service"  >
                  </div>

                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
        <hr> -->
            <table id="example1" class="table table table-striped table-hover">
                <thead class="">
                <tr align='center'>
                <th>No</th>
                <th>Id Jasa Service</th>
                <th>Nama Service</th>
                <th>Alamat Service</th>
                <th>No Telpon</th>
                <th>Jenis Toko</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM jasa_service");

                    while ($data= mysqli_fetch_array($sql)) {
                    ?> <tr align='center'>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['id_jasa'];?></td>
                        <td><?php echo $data['nama_service'];?></td>
                        <td><?php echo $data['alamat_service'];?></td>
                        <td><?php echo $data['no_hp'];?></td>
                        <td><?php echo $data['jenis_service'];?></td>
                        <td>
                        <a href="?page=jasa_service&aksi=ubah&id=<?php echo $data['id_jasa'];?>"><button   class="btn fas fa-edit"></button></a>
                        <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=jasa_service&aksi=hapus&id=<?php echo $data['id_jasa'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

