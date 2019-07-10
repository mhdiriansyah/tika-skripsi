<?php 

require 'fpdf.php';
include '../lib/koneksi.php';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
if (isset($_POST['submit'])){
    $id = $_POST['id'];

    if ($id == 'KSURAT001'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Keterangan Kuliah : ',0,10,'J');
    } else if ($id == 'KSURAT002'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Magang : ',0,10,'J');
    } else if ($id == 'KSURAT003'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Riset : ',0,10,'J');
    } else if ($id == 'KSURAT004'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,40,'SURAT REKOMENDASI',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,0,'Yang bertanda tangan dibawah ini menerangkan bahwa : ',0,10,'J');
        $pdf->MultiCell(190,10,$pdf->WriteHTML('<p>Good</p>'));
    } else if ($id == 'KSURAT005'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Keterangan Kuliah : ',0,10,'J');
    }

    // foreach(json_decode($_POST['nim']) as $key => $value){
    //     mysqli_query($conn, "INSERT INTO tbl_suratkonfirmasi SET
    //                         id_kategori     = '$_POST[idk]',
    //                         nim             = '$value',
    //                         status_surat    = 1,
    //                         nama_surat      = 'apa'");
    // }
}
$pdf->Output();
?>