<?php

include "../../koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$koneksi = new mysqli("localhost", "root", "", "skripsi");
$bulan1 = isset($_POST['bulan']) ? $_POST['bulan'] : '';
$tahun  = isset($_POST['tahun']) ? $_POST['tahun'] : date('Y');

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

if($bulan1 != ''){
    $where = "MONTH(tgl_pinjam)='$bulan1' 
              AND YEAR(tgl_pinjam)='$tahun'";
} else {
    $where = "YEAR(tgl_pinjam)='$tahun'";
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
   <h3><center><b>LAPORAN DATA PERMINTAAN ASET PADA <?php
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
   <th width="25px" height="50px">Kode Permintaan</th>
   <th width="25px" height="50px">Kode Barang Permintaan </th>
   <th width="25px" height="50px">Nama</th>
   <th width="25px" height="50px">Kode Area</th>
   <th width="25px" height="50px">Jenis Barang</th>
   <th width="25px" height="50px">Status</th>
   <th width="25px" height="50px">Tanggal Permintaan</th>

 </tr>  
    </thead>
    <tbody>
                                     
        <?php
        $no = 1;

        $sql = $koneksi ->query("SELECT * from  pinjam 
        inner join pinjam_dtl using(id_dtl_pnjm)
        inner join kategori_brg using(id_kategori)
        inner join karyawan using(id_karyawan)
        WHERE $where
        ") or die($koneksi->error);
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['id_pinjam'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['id_dtl_pnjm'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['id_dp'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kategori'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['status_pengajuan'];?></center></td>
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_pinjam']));?></center></td>
         </tr>  
        <?php }  ?>
        </tbody> 
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
