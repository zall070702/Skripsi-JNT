<?php
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM perawatan_brg WHERE id_perawatan='$id'");

$status='Belum Terpakai';
mysqli_query($koneksi,"UPDATE brg_masuk_peralatan SET status='$status' WHERE id_perawatan='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=brg_keluar_peralatan";
    </script>