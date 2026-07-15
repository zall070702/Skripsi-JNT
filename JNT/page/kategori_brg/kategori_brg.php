<div class = "card card-primary">
    <div class = " card-header">
    <h3 class="card-title">Data Barang </h3>
    </div>
    <div class="card-body">
    <a href="?page=kategori_brg&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table-boardered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM kategori_brg");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_brg'];?></td>
                <td><?php echo $data['nama_brg'];?></td>
                <td>
                <a href="?page=kategori_brg&aksi=ubah&id=<?php echo $data['kd_brg'];?>"><button   class="btn btn-success">Edit</button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=kategori_brg&aksi=hapus&id=<?php echo $data['kd_brg'];?>"><button   class="btn btn-danger">Hapus</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>