
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Barang Asset Keluar Peralatan </h5>
    </div>
    <div class="card-body">
    <a href="?page=brg_keluar_peralatan&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Kode Asset</th>
        <th>Aset</th>
        <th>Nama Karyawan</th>
        <th>Kode Drop Point</th>
        <th>Tanggal Input</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM brg_keluar_peralatan 
            INNER JOIN asset_peralatan Using (kd_asset)
            INNER JOIN kategori_brg Using (Id_kategori)
            INNER JOIN karyawan Using (id_karyawan)");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['id_dp'];?></td>
                <td><?php echo $data['tgl_keluar']; ?></td>
                <td>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=brg_keluar_peralatan&aksi=hapus&id=<?php echo $data['kd_asset'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>