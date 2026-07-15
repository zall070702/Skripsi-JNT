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
    <h5 class="header">Data Pengajuan Service Diterima</h5>
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
        <th>Status</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM service 
             INNER JOIN perawatan_brg Using (id_perawatan)
             INNER JOIN brg_masuk_komputer Using (kd_asset_pc)
             INNER JOIN kategori_brg Using (id_kategori)
             Where status1= 'DITERIMA'
             order by service.tgl_service_diterima DESC  
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['tgl_service_diterima'];?></td>
            <td><?php echo $data['id_service'];?></td>
            <td><?php echo $data['kd_asset_pc'];?></td>
            <td><?php echo $data['nama_barang'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo $data['catatan'];?></td>
            <td><?php echo $data['status1'];?></td>
            <td>
                <a href="?page1=data_service&aksi=buka&idservice=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-success">Buka</button></a></td>
            </tr>
            <?php
            }
        ?>
    </table>
    </div>
</div>


<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Pengajuan Asset Ditolak</h5>
    </div>
    <div class="card-body">
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Nomor Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Estimasi Harga</th>
        <th>Status</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT *, sum(harga) as total FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             WHERE status='DITOLAK'
             group by id_pengajuan_msk
             ORDER BY pengajuan_msk.tgl_masuk  desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= tgl_indo($data['tgl_masuk']) ?> </td>
                <td><?= $data['id_pengajuan_msk']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td>Rp.<?php  echo number_format($data['total']) ?></td>
                <td><?= $data['status']; ?> </td>
                <td>
                <a href="?page1=validasi_pengajuan_asset&aksi=validasi&idpengajuanmsk=<?=$data['id_pengajuan_msk']; ?> ">
                <button class="btn btn-sm btn-danger">Validasi</button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>
