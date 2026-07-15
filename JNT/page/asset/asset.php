
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Barang Asset IT</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th width="10%">No</th>
        <th width="60%">Kategori</th>
        <th width="20%">Stok</th>
        <th width="10%">Aksi</th>
        </tr>
        </thead>
        <tbody>
         <?php
            $sql2 = mysqli_query($koneksi,"
    SELECT *,
           COUNT(id_kategori) AS jumlah
    FROM kategori_brg
    INNER JOIN brg_masuk_peralatan USING(id_kategori)
    WHERE kondisi_brg != 'Disposal'
    GROUP BY id_kategori
");

            while ($data= mysqli_fetch_array($sql2)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jumlah'];?></td>
                <td>
                <a href="?page=asset_peralatan&aksi=buka&id=<?php echo $data['id_kategori'];?>"><button class="btn btn-sm btn-success">Buka</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
        <tfoot>  
        <hr>                      
        <?php 

                $q3 = mysqli_query($koneksi, "SELECT COUNT(*) as total3 FROM brg_masuk_peralatan
                WHERE kondisi_brg != 'Disposal'
                ");
                $d3 = mysqli_fetch_assoc($q3);

                // Total semua
                $total =  $d3['total3'];
                ?>

            
            <tr align="center">

            
              
              <td>Total</td>
              <td></td>
              <td><?php echo $total;?></td>
              <td></td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>