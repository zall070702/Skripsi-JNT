<?php

include "../../koneksi.php";


date_default_timezone_set('Asia/Jakarta');

$koneksi = new mysqli("localhost", "root", "", "magang");
$bulan1 = $_POST['bulan'];
$tahun = $_POST['tahun'];

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
    <td><center><img src="../../dist/img/logo_report_hrs.jpg" width="auto" height="200px"></center></td>
  </tr>
  
  </table>
<hr>
   <h3><center><b>LAPORAN DATA PENGEMBALIAN BARANG ASSET PADA BULAN <?php echo  bulan_indo((int)$bulan1); ?>  </b></center></h3>
<table class="table table-borderless" style="width: 100%"> 
  <tr>
    <th style="text-align: right;">Tanggal Cetak :&nbsp&nbsp<?php echo format_indo(date('Y-m-d'))?> </th>
</tr>
  </table> 
<table border="1" width="100%" style="border-collapse: collapse;">

  <thead>
  <tr>

   <th width="25px" height="50px">No</th>
   <th width="25px" height="50px">NRP</th>
   <th width="25px" height="50px">Nama Pengguna</th>
   <th width="25px" height="50px">Departemen</th>
   <th width="25px" height="50px">Kode Asset</th>
   <th width="25px" height="50px">Nama Barang Asset</th>
   <th width="25px" height="50px">Merek</th>
   <th width="25px" height="50px">Tanggal Pengembalian</th>
   <th width="25px" height="50px">Keterangan</th>

 </tr>  
    </thead>
    <tbody>
                                     

        <?php
        $no = 1;

        $sql = $koneksi ->query("SELECT * from   brg_masuk_radio
        inner join kembalikan_brg using(kd_asset_radio)
        inner join brg_keluar_radio using(kd_asset_radio)
        inner join karyawan using(id_karyawan)
        WHERE MONTH(tgl_kembalikan)='$bulan1'
        AND YEAR(tgl_kembalikan)='$tahun'
        ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['nrp'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['departemen'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset_radio'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['sn'];?></center></td>
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_kembalikan']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['catatan'];?> </center></td> 
         </tr>  
        <?php }  ?>
        <?php

        $sql = $koneksi ->query("SELECT * from   brg_masuk_komputer
        inner join kembalikan_brg using(kd_asset_pc)
        inner join brg_keluar_komputer using(kd_asset_pc)
        inner join karyawan using(id_karyawan)
        WHERE MONTH(tgl_kembalikan)='$bulan1'
        AND YEAR(tgl_kembalikan)='$tahun'
        ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['nrp'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['departemen'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset_pc'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['sn'];?></center></td>
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_kembalikan']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['catatan'];?> </center></td> 
         </tr>  
        <?php }  ?>
        <?php

        $sql = $koneksi ->query("SELECT * from   brg_masuk_peralatan
        inner join kembalikan_brg using(kd_asset)
        inner join brg_keluar_peralatan using(kd_asset)
        inner join karyawan using(id_karyawan)
        WHERE MONTH(tgl_kembalikan)='$bulan1'
        AND YEAR(tgl_kembalikan)='$tahun'
        ");
        while ($data=$sql->fetch_assoc()) {

        ?>
          <tr>
              <td width="25px" height="50px"><center><?php echo $no++;?></center></td> 
              <td width="100px" height="50px"><center><?php echo $data['nrp'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['departemen'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['kd_asset'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['nama_barang'];?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['sn'];?></center></td>
              <td width="100px" height="50px"><center><?php echo format_indo(date($data['tgl_kembalikan']));?></center></td>
              <td width="100px" height="50px"><center><?php echo $data['catatan'];?> </center></td> 
         </tr>  
        <?php }  ?>
        </tbody> 
            </table>
            <br><p align="right">Rantau,&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo format_indo(date('Y-m-d'))?> &nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
            <br>Departemen Head HRGS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>PT HASNUR RIUNG SINERGI site AGM &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</br>         
            <br></br>   
            <br></br>
            <br></br>
            <u>Joko Susilo</u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
            </div>
            <br></br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            
            <input type="button" class="noPrint button" value="Cetak" onclick="window.print()">
                      </div>
                  </div>
              </div>
          </div>
    </div>                                     
