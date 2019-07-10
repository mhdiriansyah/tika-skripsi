<?php
// menyertakan autoloader
use Dompdf\Dompdf;
require '../vendor/autoload.php';
include '../lib/koneksi.php';

// menggunakan class dompdf
$dompdf = new Dompdf();

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $data = json_decode($_POST['arrData']);
    $ket = json_decode($_POST['arrKet']);

    switch($id){
        case 'KSURAT001':
            foreach($data as $row){
                $isi[] = $row->nim;
            }
            $isiku = [
                'tempat' => $ket[0]->tempat,
                'tgl_lahir' => $ket[0]->tgl_lahir,
                'alamat' => str_replace(' ', '_',$ket[0]->alamat),
            ];
        
            $allData = serialize($isi);
            $allKet = serialize($isiku);
            $html = file_get_contents("http://localhost:81/tika-skripsi-rev/pdf/skk.php?id=".$id."&data=".$allData."&ket=".$allKet);
        break;
        case 'KSURAT002':
            foreach($data as $row){
                if ($row->code == 1){
                    $isi[] = $row->nim;
                }
            }
            $isiku = [
                'ditujukan' =>str_replace(' ', '_',$ket[0]->ditujukan),
                'nama_perusahaan' => str_replace(' ', '_',$ket[0]->nama_perusahaan),
                'alamat_perusahaan' => str_replace(' ', '_',$ket[0]->alamat_perusahaan),
                'periode_awal' => $ket[0]->periode_awal,
                'periode_akhir' => $ket[0]->periode_akhir,
            ];
        
            $allData = serialize($isi);
            $allKet = serialize($isiku);
            $html = file_get_contents("http://localhost:81/tika-skripsi-rev/pdf/sm.php?id=".$id."&data=".$allData."&ket=".$allKet);
        break;
        case 'KSURAT003':
            foreach($data as $row){
                $isi[] = $row->nim;
            }
            $isiku = [
                'ditujukan' =>str_replace(' ', '_',$ket[0]->ditujukan),
                'nama_perusahaan' => str_replace(' ', '_',$ket[0]->nama_perusahaan),
                'alamat_perusahaan' => str_replace(' ', '_',$ket[0]->alamat_perusahaan),
            ];
    
            $allData = serialize($isi);
            $allKet = serialize($isiku);
            $html = file_get_contents("http://localhost:81/tika-skripsi-rev/pdf/sr.php?id=".$id."&data=".$allData."&ket=".$allKet);
        break;
        case 'KSURAT004':
            foreach($data as $row){
                $isi[] = $row->nim;
            }
            $isiku = [
                'tempat' => $ket[0]->tempat,
                'tgl_lahir' => $ket[0]->tgl_lahir,
                'alamat' => str_replace(' ', '_',$ket[0]->alamat),
                'alasan' => str_replace(' ', '_',$ket[0]->alasan),
            ];
        
            $allData = serialize($isi);
            $allKet = serialize($isiku);
            $html = file_get_contents("http://localhost:81/tika-skripsi-rev/pdf/srk.php?id=".$id."&data=".$allData."&ket=".$allKet);
        break;
        default:
            foreach($data as $row){
                $isi[] = $row->nim;
            }
            $isiku = [
                'alamat' => str_replace(' ', '_',$ket[0]->alamat),
                'judul_skripsi' => str_replace(' ', '_',$ket[0]->judul_skripsi),
            ];
        
            $allData = serialize($isi);
            $allKet = serialize($isiku);
            $html = file_get_contents("http://localhost:81/tika-skripsi-rev/pdf/skl.php?id=".$id."&data=".$allData."&ket=".$allKet);
        break;
    }
}

$dompdf->loadHtml($html);

// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
// $dompdf->stream("Codingan",array("Attachment"=>0));
// $dompdf->stream("Codingan");
$file = $dompdf->output();

file_put_contents('../file/surat/apa.pdf', $file);







?>