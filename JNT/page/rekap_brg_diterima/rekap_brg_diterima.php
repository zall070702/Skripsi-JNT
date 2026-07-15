<div class = "card card-primary">
    <div class = " card-header">
    <h3 class="card-title">Data Kelas</h3>
    </div>
    <div class="card-body">
    <a href="?page=kelas&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table-boardered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Id Kelas</th>
        <th>Kelas</th>
        <th>Ruangan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM kelas");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_kelas'];?></td>
                <td><?php echo $data['kelas'];?></td>
                <td><?php echo $data['ruangan'];?></td>
                <td>
                <a href="?page=kelas&aksi=ubah&id=<?php echo $data['id_kelas'];?>"><button   class="btn btn-success">Edit</button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=kelas&aksi=hapus&id=<?php echo $data['id_kelas'];?>"><button   class="btn btn-warning">Hapus</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>