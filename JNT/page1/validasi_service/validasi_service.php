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
    <h5 class="header">Data Pengajuan Asset Yang Belum Di Validasi</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan Service</th>
        <th>Id Service</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jenis Kerusakan</th>
        <th>Kondisi</th>
        <th>Catatan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM service 
            INNER JOIN perawatan_brg Using (id_perawatan)
            INNER JOIN brg_masuk_radio Using (kd_asset_radio)
            INNER JOIN kategori_brg Using (id_kategori)
            Where proses= 'PENDING'  
            order by tgl_pengajuan_service DESC
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_pengajuan_service'];?></td>
                <td><?php echo $data['id_service'];?></td>
                <td><?php echo $data['kd_asset_radio'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jenis_maintenance'];?></td>
                <td><?php echo $data['kondisi'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a href="?page1=validasi_service&aksi=validasi1&idservice=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-success">Validasi</button></a></td>
            </tr>
            <?php
            }
        ?>
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM service 
            INNER JOIN perawatan_brg Using (id_perawatan)
            INNER JOIN brg_masuk_komputer Using (kd_asset_pc)
            INNER JOIN kategori_brg Using (id_kategori)
            Where proses= 'PENDING'  
            order by tgl_pengajuan_service DESC
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_pengajuan_service'];?></td>
                <td><?php echo $data['id_service'];?></td>
                <td><?php echo $data['kd_asset_pc'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jenis_maintenance'];?></td>
                <td><?php echo $data['kondisi'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a href="?page1=validasi_service&aksi=validasi&idservice=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-success">Validasi</button></a></td>
            </tr>
            <?php
            }
        ?>
        
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM service 
            INNER JOIN perawatan_brg Using (id_perawatan)
            INNER JOIN brg_masuk_peralatan Using (kd_asset)
            INNER JOIN kategori_brg Using (id_kategori)
            Where proses= 'PENDING'  
            order by tgl_perawatan DESC
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_pengajuan_service'];?></td>
                <td><?php echo $data['id_service'];?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jenis_maintenance'];?></td>
                <td><?php echo $data['kondisi'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a href="?page1=validasi_service&aksi=validasi2&idservice=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-success">Validasi</button></a></td>
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
    <h5 class="header">Data Pengajuan Asset Diterima</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan Diterima</th>
        <th>Id Service</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Catatan Kerusakan</th>
        <th>Status Pengajuan</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM service 
             INNER JOIN perawatan_brg Using (id_perawatan)
             INNER JOIN brg_masuk_radio Using (kd_asset_radio)
             INNER JOIN kategori_brg Using (id_kategori)
             Where status1= 'DITERIMA'  
             order by tgl_perawatan DESC 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['tgl_diterima'];?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['kd_asset_radio'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['status1'];?></td>
            </tr>
            <?php
            }
        ?>
        <?php
             $sql = mysqli_query($koneksi," SELECT * FROM service 
             INNER JOIN perawatan_brg Using (id_perawatan)
             INNER JOIN brg_masuk_komputer Using (kd_asset_pc)
             INNER JOIN kategori_brg Using (id_kategori)
             Where status1= 'DITERIMA'  
             order by tgl_perawatan DESC 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['tgl_diterima'];?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['kd_asset_pc'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['status1'];?></td>
            </tr>
            <?php
            }
        ?>
        <?php
             $sql = mysqli_query($koneksi," SELECT * FROM service 
             INNER JOIN perawatan_brg Using (id_perawatan)
             INNER JOIN brg_masuk_peralatan Using (kd_asset)
             INNER JOIN kategori_brg Using (id_kategori)
             Where status1= 'DITERIMA'  
             order by tgl_perawatan DESC 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['tgl_diterima'];?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['kd_asset'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['status1'];?></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>