<?php 

require 'fpdf.php';
include '../lib/koneksi.php';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
if (isset($_POST['submit'])){
    $slug = $_POST['slug'];

    if ($slug == 'skk'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Keterangan Kuliah : ',0,10,'J');
    } else if ($slug == 'sm'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Magang : ',0,10,'J');
    } else if ($slug == 'sr'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Riset : ',0,10,'J');
    } else if ($slug == 'srk'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Rekomendasi : ',0,10,'J');
    } else if ($slug == 'skl'){
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,0,'SURAT KETERANGAN',0,10,'C');
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,10,'NO: INF/201/400',0,10,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,15,'Surat Keterangan Kuliah : ',0,10,'J');
    }

    foreach(json_decode($_POST['nim']) as $key => $value){
        mysqli_query($conn, "INSERT INTO tbl_suratkonfirmasi SET
                            id_kategori     = '$_POST[idk]',
                            nim             = '$value',
                            status_surat    = 1,
                            nama_surat      = 'apa'");
    }
}
$pdf->Output();
?>