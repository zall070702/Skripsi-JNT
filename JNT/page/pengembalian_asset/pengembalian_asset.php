
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Barang Pengembalian Asset</h5>
    </div>
    <div class="card-body">
    <a href="?page=pengembalian_asset&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Barang Dikembalikan</th>
        <th>Kode Barang Asset</th>
        <th>Nama Asset</th>
        <th>Nama Pengguna</th>
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM kembalikan_brg 
            Inner join brg_keluar_radio using(kd_asset_radio)
            Inner join brg_masuk_radio using(kd_asset_radio)
            Inner join karyawan using(id_karyawan)
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_kembalikan']; ?></td>
                <td><?php echo $data['kd_asset_radio'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=pengembalian_asset&aksi=hapus&id=<?php echo $data['id_kembali'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM kembalikan_brg 
            Inner join brg_masuk_komputer using(kd_asset_pc)
            Inner join brg_keluar_komputer using(kd_asset_pc)
            Inner join karyawan using(id_karyawan)
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_kembalikan']; ?></td>
                <td><?php echo $data['kd_asset_pc'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=pengembalian_asset&aksi=hapus&id=<?php echo $data['id_kembali'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM kembalikan_brg 
            Inner join brg_masuk_peralatan using(kd_asset)
            Inner join brg_keluar_peralatan using(kd_asset)
            Inner join karyawan using(id_karyawan)
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_kembalikan']; ?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=pengembalian_asset&aksi=hapus&id=<?php echo $data['id_kembali'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>