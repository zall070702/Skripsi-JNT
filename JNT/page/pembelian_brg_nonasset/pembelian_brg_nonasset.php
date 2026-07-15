<div class = "card card-primary">
    <div class = " card-header">
    <h3 class="card-title">Data Barang Non Asset</h3>
    </div>
    <div class="card-body">
    <a href="?page=asset&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table-boardered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah Beli</th>
        <th>Tanggal Order</th>
        <th>Tanggal Diterima</th>
        <th>Harga /pcs</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM brg_nonasset");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_barang'];?></td>
                <td><?php echo $data['nama_brg'];?></td>
                <td><?php echo $data['jmlh_beli'];?></td>
                <td><?php echo $data['tgl_beli'];?></td>
                <td><?php echo $data['tgl_diterima'];?></td>
                <td>Rp.<?php echo number_format($data['harga'],0,',','.');?></td>
                <td>
                <a href="?page=asset&aksi=ubah&id=<?php echo $data['kd_barang'];?>"><button   class="btn btn-success">Edit</button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=asset&aksi=hapus&id=<?php echo $data['kd_barang'];?>"><button   class="btn btn-danger">Hapus</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>