<?php
$id = $_GET['id'];

?>


<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Stok Peralatan</h5>
    </div>
    <div class="card-body">
    
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th width="10%">No</th>
        <th width="20%">Kode Asset</th>
        <th width="30%">Nama Barang</th>
        <th width="10%">Merek</th>
        <th width="10%">Kategori</th>
        <th width="10%">SN</th>
        <th width="10%">Status</th>
        <th width="10%">Lokasi</th>
        <th width="10%">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql=mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan 
            INNER JOIN kategori_brg using(id_kategori) 
    WHERE kondisi_brg != 'Disposal' and id_kategori='$id' 
            ORDER BY kd_asset DESC");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['merek'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['sn'];?></td>
                <td><?php echo $data['kondisi_brg'];?></td>
                <td><?php echo $data['id_dp'];?></td>
                <td>
                <a href="?page=asset_peralatan&aksi=detail&id=<?php echo urlencode($data['kd_asset']); ?>"><button class="btn btn-sm btn-success">Buka</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>