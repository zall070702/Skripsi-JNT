<?php
function tgl_indo($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
   
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
?>
<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Catatan Maintenance Asset </h5>
    </div>
    <div class="card-body">
    <a href="?page=maintenance_asset&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Id Maintenance</th>
        <th>Tanggal Maintenance</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jenis Maintenance</th>
        <th>Kondisi</th>
        <th>Status Barang</th>
        <th>Catatan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM  perawatan_brg
            INNER JOIN brg_masuk_peralatan Using (kd_asset) 
            INNER JOIN kategori_brg Using (id_kategori)
            Where NOT status_brg='Service' AND id_perawatan IN (Select Max(id_perawatan) From perawatan_brg GROUP BY kd_asset)
            order by tgl_perawatan DESC
            ");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo tgl_indo($data['id_perawatan']) ?></td>
                <td><?php echo tgl_indo($data['tgl_perawatan']) ?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jenis_maintenance'];?></td>
                <td><?php echo $data['kondisi'];?></td>
                <td><?php echo $data['status_brg'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=maintenance_brg&aksi=hapus&id=<?php echo $data['id_perawatan'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        
        
        </tbody>
    </table>
    </div>
</div>





<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Maintenance Service Aset </h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Id Maintenance</th>
        <th>Tanggal Maintenance</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jenis Maintenance</th>
        <th>Kondisi</th>
        <th>Status Barang</th>
        <th>Catatan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM  perawatan_brg
            INNER JOIN brg_masuk_peralatan Using (kd_asset) 
            INNER JOIN kategori_brg Using (id_kategori)
            Where NOT status_brg='Bagus'  AND NOT status_brg='Rusak'
            order by tgl_perawatan DESC
            ");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo tgl_indo($data['id_perawatan']) ?></td>
                <td><?php echo tgl_indo($data['tgl_perawatan']) ?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jenis_maintenance'];?></td>
                <td><?php echo $data['kondisi'];?></td>
                <td><?php echo $data['status_brg'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=maintenance_brg&aksi=hapus&id=<?php echo $data['id_perawatan'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        
        
        </tbody>
    </table>
    </div>
</div>