<?php
$id = $_GET['id'];
$id2 = $_GET['id2'];

mysqli_query($koneksi,"DELETE FROM pengajuan_dtl_mmsk WHERE id_pengajuan='$id'");

// print $query1;
// print $query2;
?>
<script type="text/javascript">
      alert("Data Berhasil Dihapus")
    window.location.href="?page=pengajuan_asset&aksi=tambah&idpengajuanmsk=<?=$id2;?>";
</script>