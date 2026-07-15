   
<?php    
$id = $_GET['idpengajuanmsk'];
  $status = 'DITERIMA';

  $query1="UPDATE pengajuan_dtl_mmsk SET status='$status' WHERE id_pengajuan='$id";
  mysqli_query($connection,$query1);
  ?> 

    <script>
    alert("Data Berhasil Ditambah")
    window.location.href="?page1=validasi_pengajuan_asset";
    </script>



