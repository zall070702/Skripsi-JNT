<?php
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM brg_keluar_peralatan WHERE kd_asset='$id'");

$status='Belum Terpakai';
mysqli_query($koneksi,"UPDATE brg_masuk_peralatan SET status='$status' WHERE kd_asset='$id'");
mysqli_query($koneksi,"UPDATE asset_peralatan SET status='$status' WHERE kd_asset='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=brg_keluar_peralatan";
    </script>