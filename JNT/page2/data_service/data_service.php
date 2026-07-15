<?php

$id_dp = $_SESSION['id_dp'];


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
    <h5 class="header">Data Aset yang Diservice</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Id Service</th>
        <th>Tanggal Service</th>
        <th>Lokasi</th>
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
            INNER JOIN dp Using (id_dp)
            Where id_dp='$id_dp' and status_brg='Service' 
            order by tgl_selesai desc
            ");
            
            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['tgl_selesai'];?></td>
            <td><?php echo $data['id_dp'];?></td>
            <td><?php echo $data['kd_asset'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['jenis_maintenance'];?></td>
            <td><?php echo $data['kondisi'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['proses'];?></td>
            <td><?php echo $data['kondisi_brg'];?></td>
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


