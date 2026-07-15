<?php

$query5 = "SELECT max(id_pengajuan_msk) as maxid from pengajuan_msk";
$hasil = mysqli_query($koneksi, $query5);
$data  = mysqli_fetch_array($hasil);
$id_pengajuan_msk = $data['maxid'];

$nourut = (int) substr($id_pengajuan_msk,2,6);
$nourut++;
$char = "PM";
$idpengajuanmsk = $char.sprintf("%06s",$nourut);

?>