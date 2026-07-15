
<?php
$id_dp = $_SESSION['id_dp'];
?>

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Barang Aset</h5>
    </div>
    <div class="card-body">
    <a href="?page=brg_keluar_peralatan&aksi=tambah"><button   class="btn btn-primary">Tambah Kategori Asset</button></a>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th width="10%">No</th>
        <th width="15%">Kode Aset</th>
        <th width="20%">Merek</th>
        <th width="20%">Kategori</th>
        <th width="20%">Drop Point</th>
        <th width="10%">Status</th>
        <th width="5%">Aksi</th>
        </tr>
        </thead>
        <tbody>
         <?php
            $sql2 = mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan 
            INNER JOIN kategori_brg USING(id_kategori)
            INNER JOIN dp USING(id_dp)
            WHERE brg_masuk_peralatan.id_dp = '$id_dp' and kondisi_brg != 'Disposal'
            ");

            while ($data= mysqli_fetch_array($sql2)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['merek'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['id_dp'];?></td>
                <td><?php echo $data['status'];?></td>
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
                
                $q = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM brg_masuk_peralatan");
                $d = mysqli_fetch_assoc($q);

                // Total semua
                $total =  $d['total'];
                ?>

            
            <tr align="center">

            
              
              <td>Total Aset DP : <?php echo $total;?></td>
            </tr>
        </tfoot>
    </table>
    </div>
</div>