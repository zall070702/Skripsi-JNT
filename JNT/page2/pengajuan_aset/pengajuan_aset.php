<?php

$query = mysqli_query($koneksi,"
SELECT MAX(id_dtl_pnjm) as maxid
FROM pinjam_dtl
");

$data = mysqli_fetch_array($query);

$lastid = $data['maxid'];

if($lastid == ''){

    $iddetailpinjam = "KP000001";

}else{

    $nourut = (int) substr($lastid,2,6);

    $nourut++;

    $iddetailpinjam = "KP".sprintf("%06s",$nourut);
}

?>

<div class = "card mt-3 card-gray">
    <div class = " card-header">
    <h5 class="header">Data Pengajuan Penggunaan Aset</h5>
    </div>
    <div class="card-body">
    <a href="?page2=pengajuan_aset&aksi=tambah&iddetailpinjam=<?=$iddetailpinjam;?>"><button   class="btn btn-primary">Tambah Pengajuan</button></a>
    <hr>
    <table id="example1" class="table table table-striped table-hover">
        <thead class="">
        <tr align='center'>
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Kode Pengajuan</th>
        <th>Kode Barang Pengajuan</th>
        <th>Nama Pengaju</th>
        <th>Aset</th>
        <th>status_pengajuan</th>
        <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
             $no = 1;
             $sql = mysqli_query($koneksi," SELECT * FROM pinjam
             INNER JOIN pinjam_dtl using(id_dtl_pnjm)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             where status_pengajuan='PENDING'
             ORDER BY pinjam.tgl_pinjam desc 
             ");

            while ($data= mysqli_fetch_array($sql)) {
            ?> <tr align='center'>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_pengajuan_pnjm']; ?> </td>
                <td><?= $data['id_dtl_pnjm']; ?> </td>
                <td><?= $data['id_pinjam']; ?> </td>
                <td><?= $data['nama']; ?> </td>
                <td><?= $data['kategori']; ?> </td>
                <td><?= $data['status_pengajuan']; ?> </td>
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

</div>