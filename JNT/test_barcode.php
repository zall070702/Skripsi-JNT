<?php

include 'koneksi.php';
require_once 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorSVG;

$generator = new BarcodeGeneratorSVG();

$data = mysqli_fetch_array(
    mysqli_query(
        $koneksi,
        "SELECT * FROM brg_masuk_peralatan
         WHERE kd_asset='$_GET[id]'"
    )
);

echo "<h4>".$data['kd_asset']."</h4>";

echo $generator->getBarcode(
    $data['kd_asset'],
    $generator::TYPE_CODE_128
);
?>