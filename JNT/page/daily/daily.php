<div class = "card card-primary">
    <div class = " card-header">
    <h3 class="card-title">Data Daily</h3>
    </div>
    <div class="card-body">
    <a href="?page=daily&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table-boardered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Id Daily</th>
        <th>Dept</th>
        <th>Issue</th>
        <th>Kategori</th>
        <th>Device</th>
        <th>Tanggl Lapor</th>
        <th>Batas Waktu</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Solusi</th>
        <th>Tanggal Selesai</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM daily");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_daily'];?></td>
                <td><?php echo $data['dept'];?></td>
                <td><?php echo $data['isu'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['device'];?></td>
                <td><?php echo $data['tgl_lapor'];?></td>
                <td><?php echo $data['waktu'];?></td>
                <td><?php echo $data['status'];?></td>
                <td><?php echo $data['keterangan'];?></td>
                <td><?php echo $data['solusi'];?></td>
                <td><?php echo $data['tgl_selesai'];?></td>
                <td>
                <a href="?page=daily&aksi=ubah&id=<?php echo $data['id_daily'];?>"><button   class="btn btn-warning">Selesai</button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=daily&aksi=hapus&id=<?php echo $data['id_daily'];?>"><button   class="btn btn-danger">Hapus</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>