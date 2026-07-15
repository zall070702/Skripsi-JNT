<div class = "card card-primary">
    <div class = " card-header">
    <h3 class="card-title">Data Daily</h3>
    </div>
    <div class="card-body">
    <a href="?page=pr&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table-boardered table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Id Daily</th>
        <th>No PR</th>
        <th>Item</th>
        <th>quality</th>
        <th>Harga</th>
        <th>MDA</th>
        <th>Tanggal PR</th>
        <th>Status PR</th>
        <th>No PO</th>
        <th>Status PO</th>
        <th>Tanggal Tiba</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM pr");

            while ($data= mysqli_fetch_array($sql)) {
                
            ?> <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_pr'];?></td>
                <td><?php echo $data['no_pr'];?></td>
                <td><?php echo $data['item'];?></td>
                <td><?php echo $data['quality'];?></td>
                <td>Rp.<?php echo number_format($data['harga'],0,',','.');?></td>
                <td><?php echo $data['mda'];?></td>
                <td><?php echo $data['tgl_pr'];?></td>
                <td><?php echo $data['status_pr'];?></td>
                <td><?php echo $data['no_po'];?></td>
                <td><?php echo $data['status_po'];?></td>
                <td><?php echo $data['tgl_tiba'];?></td>
                <td><?php echo $data['status'];?></td>
                <td><?php echo $data['keterangan'];?></td>
                
                <td>
                <a href="?page=pr&aksi=ubah&id=<?php echo $data['id_pr'];?>"><button   class="btn btn-warning">Selesai</button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=pr&aksi=hapus&id=<?php echo $data['id_pr'];?>"><button   class="btn btn-danger">Hapus</button></a></td>
            </tr>
            <?php
            
            }
        ?>
        </tbody>
    </table>
    </div>
</div>