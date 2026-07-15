<?php
$id = $_GET['idpengajuan'];

$status='SAMPAI';
mysqli_query($koneksi,"UPDATE pengajuan_dtl_mmsk SET status_brg='$status' WHERE id_pengajuan='$id'");

?>
<script type="text/javascript">
      window.location.href="?page=pengajuan_asset_diterima";
    </script>