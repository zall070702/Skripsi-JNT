<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM brg_masuk_peralatan WHERE kd_asset='$id'");
mysqli_query($koneksi,"DELETE FROM asset_peralatan WHERE kd_asset='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=brg_masuk_peralatan";
    </script>