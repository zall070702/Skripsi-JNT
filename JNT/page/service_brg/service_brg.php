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
    <h5 class="header">Data Barang Yang Ingin Diservice </h5>
    </div>
    <div class="card-body">
    <a href="?page=service_brg&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Input</th>
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
            $sql = mysqli_query($koneksi,"SELECT * FROM  perawatan_brg
            INNER JOIN brg_masuk_peralatan Using (kd_asset) 
            INNER JOIN kategori_brg Using (id_kategori)
            Where status_brg= 'Service' AND NOT proses='PENDING' AND NOT proses='SELESAI'
            order by tgl_perawatan DESC
            ");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['tgl_perawatan'];?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jenis_maintenance'];?></td>
                <td><?php echo $data['kondisi'];?></td>
                <td><?php echo $data['catatan'];?></td>
                <td>
                <a href="?page=service_brg&aksi=input2&idservice=<?=$data['id_perawatan']; ?> ">
                <button class="btn btn-sm btn-warning">Service</button></a></td>
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
    <h5 class="header">Data Barang yang Diservice di Toko</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Id Service</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jenis Service</th>
        <th>Kondisi</th>
        <th>Catatan</th>
        <th>Status Service</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM service 
            INNER JOIN perawatan_brg Using (id_perawatan)
            INNER JOIN brg_masuk_peralatan Using (kd_asset)
            INNER JOIN kategori_brg Using (id_kategori)
            INNER JOIN jasa_service Using (id_jasa)
            Where status_brg='Service' 
            order by tgl_selesai desc
            ");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['tgl_selesai'];?></td>
            <td><?php echo $data['kd_asset'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['jenis_maintenance'];?></td>
            <td><?php echo $data['kondisi'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['proses'];?></td>
                <td>
                <a href="?page=service_brg&aksi=service_selesai&idservice=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-success">Buka</button></a></td>
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
    <h5 class="header">Data Proses Service Barang</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Id Service</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jenis Kerusakan</th>
        <th>Kondisi</th>
        <th>Catatan</th>
        <th>Status Service</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM service 
            INNER JOIN perawatan_brg Using (id_perawatan)
            INNER JOIN brg_masuk_peralatan Using (kd_asset)
            INNER JOIN kategori_brg Using (id_kategori)
            Where status1='DITERIMA' AND NOT proses='SELESAI'
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
                <td><?php echo $data['status_brg'];?></td>
                <td>
                <a href="?page=service_brg&aksi=input_selesai2&idservice=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-primary">Selesai</button></a></td>
            </tr>
            <?php
            }
        ?>
        
        
        </tbody>
    </table>
    </div>
</div>