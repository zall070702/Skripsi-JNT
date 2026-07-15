<?php

include "../../koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$koneksi = new mysqli("localhost", "root", "", "skripsi");
$bulan1 = isset($_POST['bulan']) ? $_POST['bulan'] : '';
$tahun  = isset($_POST['tahun']) ? $_POST['tahun'] : date('Y');
$kategori  = isset($_POST['kategori']) ? $_POST['kategori'] : '';
//$kategori = $_POST['kategori'];

 function format_indo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
    }

function bulan_indo($bulan_angka) {
 $bulan1 = array(1=>'JANUARI', 
      'FEBRUARI', 
      'MARET', 
      'APRIL', 
      'MEI', 
      'JUNI', 
      'JULI', 
      'AGUSTUS', 
      'SEPTEMBER', 
      'OKTOBER', 
      'NOVEMBER', 
      'DESEMBER'
     );

 return $bulan1[$bulan_angka];
}

if($bulan1 != '' && $kategori != ''){
    $where = "MONTH(tgl_diterima)='$bulan1'
              AND YEAR(tgl_diterima)='$tahun'
              AND brg_masuk_peralatan.id_kategori='$kategori'";
}
elseif($kategori != ''){
    $where = "YEAR(tgl_diterima)='$tahun'
              AND brg_masuk_peralatan.id_kategori='$kategori'";
}
else{
    $where = "YEAR(tgl_diterima)='$tahun'";
}

if($bulan1 != ''){
    $where1 = "MONTH(tgl_pengajuan_diterima)='$bulan1' 
              AND YEAR(tgl_pengajuan_diterima)='$tahun'";
} else {
    $where1 = "YEAR(tgl_pengajuan_diterima)='$tahun'";
}
?>

<style>

    @media print{
      input.noPrint{
        display: none;
      }

    }
.img{
width: 900px;
height: auto;
margin-left: 20px;

}
.button {
  background-color: #1E90FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.tumblr {
  background-color: #1E90FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<table class="table table-borderless" style="width: 100%" > 

  <tr>    
    <td><center><img src="../../dist/img/logo.png" width="auto" height="200px"></center></td>

  </tr>
  
  </table>
<hr>
   <h3><center><b>LAPORAN KONDISI ASET PADA <?php
      if($bulan1 != ''){
          echo " BULAN ".bulan_indo((int)$bulan1)." TAHUN ".$tahun;
      }else{
          echo " TAHUN ".$tahun;
      } 
    ?>  </b></center></h3>
<table class="table table-borderless" style="width: 100%"> 
  <tr>
    <th style="text-align: right;">Tanggal Cetak :&nbsp&nbsp<?php echo format_indo(date('Y-m-d'))?> </th>
</tr>
  </table> 
<table border="1" width="100%" style="border-collapse: collapse;">

                                       <thead>
                                        <tr>

   <th width="25px" height="50px">No</th>
   <th width="25px" height="50px">Kode Asset</th>
   <th width="25px" height="50px">Nama Asset</th>
   <th width="25px" height="50px">Merek</th>
   <th width="25px" height="50px">Kategori</th>
   <th width="25px" height="50px">Kondisi Aset</th>

 </tr>  
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi ->query("SELECT * from  brg_masuk_peralatan
        inner join kategori_brg using(id_kategori)
        inner join pengajuan_dtl_mmsk using(id_pengajuan)
        WHERE $where
        order by tgl_diterima ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['kd_asset'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['merek'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kategori'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kondisi_brg'];?></center></td>
         </tr>  
        <?php }  ?>
            </tbody>  
            <?php $bua = mysqli_query($koneksi,"SELECT *, count(kd_asset) as total
              FROM	brg_masuk_peralatan
              inner join pengajuan_dtl_mmsk using(id_pengajuan)
              WHERE $where
              AND status_brg='DISIMPAN'
              ");

              $tot = mysqli_query($koneksi,"
              SELECT SUM(pengajuan_dtl_mmsk.harga) AS total_harga
              FROM pengajuan_dtl_mmsk
              INNER JOIN brg_masuk_peralatan
              ON pengajuan_dtl_mmsk.id_pengajuan = brg_masuk_peralatan.id_pengajuan
              WHERE $where
              AND pengajuan_dtl_mmsk.status_brg='DISIMPAN'
              ");
              
              ?>
                    
            <tfoot>
            </tfoot>
            </table>
            <br><p align="right">Banjarmasin,&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo format_indo(date('Y-m-d'))?> &nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
            <br>Supervisor GW J&T Express &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>PT Global Jet Express Kalsel &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>         
            <br></br>   
            <br></br>
            <br></br>
            <u>Ali Abdul Muis</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
            </div>
            <br></br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            
            <input type="button" class="noPrint button" value="Cetak" onclick="window.print()">
                      </div>
                  </div>
              </div>
          </div>
    </div>                                     
