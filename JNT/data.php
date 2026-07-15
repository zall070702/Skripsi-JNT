<?php

// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'skripsi');



//menghitung jumlah pesan dari tabel pesan
$sql= mysqli_query($connect, "SELECT * FROM pengajuan_dtl_mmsk
             INNER JOIN pengajuan_msk using(id_pengajuan_msk)
             INNER JOIN karyawan using(id_karyawan)
             INNER JOIN kategori_brg using(id_kategori)
             INNER JOIN supplier using(id_supplier)
             group by id_pengajuan_msk
             ORDER BY pengajuan_msk.tgl_masuk desc Limit 5 ");
$result = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}

echo json_encode(array("result" => $data));
?>