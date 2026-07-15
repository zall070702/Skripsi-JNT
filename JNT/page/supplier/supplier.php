

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h3 class="card-title">Data Supplier</h3>
    </div>
    <div class="card-body">
    <a href="?page=supplier&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">

        <!-- <div class="form-group">
            
              <div class="card-header">
                <h3 class="card-title">Tambah Data supplier</h3>
              </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">id_supplier</label>
                    <input type="text" class="form-control di" id="exampleInputEmail1" name="id_supplier" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">nama_supplier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_supplier" >
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputEmail1">alamat_supplier</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="alamat_supplier"  >
                  </div>

                  <button type="submit" name="simpan"  class="btn btn-primary">Submit</button>
               
                
              </form>
            </div>
        <hr> -->
            <table id="example1" class="table table table-striped table-hover">
                <thead class="">
                <tr align='center'>
                <th>No</th>
                <th>Id Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>No Telpon</th>
                <th>Email</th>
                <th>Jenis Toko</th>
                <th>Nama Sales</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM supplier");

                    while ($data= mysqli_fetch_array($sql)) {
                    ?> <tr align='center'>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data['id_supplier'];?></td>
                        <td><?php echo $data['nama_supplier'];?></td>
                        <td><?php echo $data['alamat_supplier'];?></td>
                        <td><?php echo $data['no_hp'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['jenis_supplier'];?></td>
                        <td><?php echo $data['nama_sales'];?></td>
                        <td>
                        <a href="?page=supplier&aksi=ubah&id=<?php echo $data['id_supplier'];?>"><button   class="btn fas fa-edit"></button></a>
                        <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=supplier&aksi=hapus&id=<?php echo $data['id_supplier'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

