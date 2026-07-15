
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Drop Point J&T</h5>
    </div>
    <div class="card-body">
    <a href="?page=dp&aksi=tambah"><button   class="btn btn-primary">Tambah Drop Point</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th width="10%">No</th>
        <th width="20%">Kode Drop Point</th>
        <th width="20%">Lokasi</th>
        <th width="40%">Alamat</th>
        <th width="10%">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM dp 
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_dp'];?></td>
                <td><?php echo $data['lokasi'];?></td>
                <td><?php echo $data['alamat'];?></td>
                <td>
                <a href="?page=asset_radio&aksi=buka&id=<?php echo $data['id_kategori'];?>"><button class="btn btn-sm btn-success">Buka</button></a></td>
            <?php
            }
        ?>
        </tbody>

        <tfoot> 
        </tfoot>
    </table>
    </div>
</div>