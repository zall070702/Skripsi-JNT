<?php
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM pr WHERE id_pr='$id'");

?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
      window.location.href="?page=pr";
    </script>