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
    <h5 class="header">Data Barang Asset Masuk</h5>
    </div>
    <div class="card-body">
    <a href="?page=brg_masuk_peralatan&aksi=tambah"><button   class="btn btn-primary">Tambah Data</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Kode Asset</th>
        <th>Nama Barang</th>
        <th>Merek</th>
        <th>Kategori</th>
        <th>SN</th>
        <th>MDA</th>
        <th>Status</th>
        <th>Tanggal Diterima</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            $sql = mysqli_query($koneksi,"SELECT * FROM brg_masuk_peralatan
            INNER JOIN kategori_brg using(id_kategori)
            ORDER BY kd_asset desc");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['kd_asset'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['merek'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['sn'];?></td>
                <td><?php echo $data['mda'];?></td>
                <td><?php echo $data['status'];?></td>
                <td><?php echo tgl_indo($data['tgl_diterima']) ?></td>
                <td>
                <a href="?page=brg_masuk_peralatan&aksi=ubah&id=<?php echo $data['kd_asset'];?>"><button   class="btn fas fa-edit"></button></a>
                <a onclick="return confirm('Yakin Mau Hapus?')" href="?page=brg_masuk_peralatan&aksi=hapus&id=<?php echo $data['kd_asset'];?>"><button   class="btn fas fa-trash-alt"></button></a></td>
            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>