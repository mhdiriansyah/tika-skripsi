<?php
// menyertakan autoloader
use Dompdf\Dompdf;
require '../vendor/autoload.php';
include '../lib/koneksi.php';
// menggunakan class dompdf
$dompdf = new Dompdf();
$ksurat = $_POST['ksurat'];
$ssurat = $_POST['ssurat'];
if ($ksurat == 'KSURAT002'){
    if ($ssurat == 1){
        $ks = $ksurat;
        $ss = 3;
    } else {
        $ks = $ksurat;
        $ss = $ssurat;
    }
} else {
    $ks = $ksurat;
    $ss = $ssurat;
}
$html = file_get_contents("http://localhost:81/tika-skripsi/pdf/mantap.php?ks=".$ks."&ss=".$ss);
$dompdf->loadHtml($html);
// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Menjadikan HTML sebagai PDF
$dompdf->render();
// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("report",array("Attachment"=>0));