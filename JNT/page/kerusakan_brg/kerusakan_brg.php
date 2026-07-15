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
    <h5 class="header">Data Asset Rusak </h5>
    </div>
    <div class="card-body">
    <a href="?page=maintenance_asset&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Id Service</th>
        <th>Tanggal Kerusakan</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Kondisi</th>
        <th>Catatan Kerusakan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
             $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan
             INNER JOIN perawatan_brg Using (kd_asset) 
             INNER JOIN service Using (id_perawatan) 
             INNER JOIN kategori_brg Using (id_kategori)
             Where kondisi_brg='Rusak' 
             ");
 
             while ($data= mysqli_fetch_array($sql)) {
             ?> <tr align='center'>
                 <td><?php echo $no++;?></td>
                 <td><?php echo $data['id_service'];?></td>
                <td><?php echo tgl_indo($data['tgl_selesai']);?></td>
                 <td><?php echo $data['kd_asset'];?></td>
                 <td><?php echo $data['nama_barang'];?></td>
                 <td><?php echo $data['kategori'];?></td>
                 <td><?php echo $data['kondisi_brg'];?></td>
                 <td><?php echo $data['catatan_perbaikan'];?></td>
                <td>
                <a href="?page=kerusakan_brg&aksi=tambah_disposal2&idrusak=<?=$data['id_service']; ?> ">
                <button class="btn btn-sm btn-danger">Disposal</button></a></td>
             </tr>
            <?php
            }
        ?>
        
        
        </tbody>
    </table>
    </div>
</div>

<div class = "card mt-3 card-danger">
    <div class = " card-header">
    <h5 class="header">Data Disposal Asset </h5>
    </div>
    <div class="card-body">
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Kode Disposal</th>
        <th>Tanggal Disposal</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Status Asset</th>
        <th>Catatan Disposal</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan
            INNER JOIN perawatan_brg Using (kd_asset) 
            INNER JOIN kategori_brg Using (id_kategori)
            INNER JOIN service Using (id_perawatan)
            INNER JOIN disposal Using (id_service)
            Where kondisi_brg='Disposal' 
            ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_disposal'];?></td>
                <td><?php echo tgl_indo($data['tgl_disposal'])?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['kondisi_brg'];?></td>
                <td><?php echo $data['catatan_disposal'];?></td>
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