<?php
$id = $_GET['id'];
$id2 = $_GET['id2'];
$id3 = $_GET['id3'];
$id4 = $_GET['id4'];



$query1="DELETE FROM pengajuan_dtl_mmsk WHERE id_pengajuan='$id'";
mysqli_query($connection,$query1);

// print $query1;
// print $query2;
?>
<script>
    window.location.href="?page=pengajuan_asset&aksi=tambah&id_pengajuan_msk=<?=$id2;?>";
</script>