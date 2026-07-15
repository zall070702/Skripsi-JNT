<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM daily WHERE id_daily='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=daily";
    </script>