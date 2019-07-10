<?php
// menyertakan autoloader
use Dompdf\Dompdf;
require '../vendor/autoload.php';
include '../lib/koneksi.php';
// menggunakan class dompdf
$dompdf = new Dompdf();

$get_id = mysqli_query($conn, "SELECT id_suratkonfirmasi FROM tbl_suratkonfirmasi WHERE SUBSTRING(id_suratkonfirmasi,1,2)='SK'") or die (mysqli_error($conn));
$trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_suratkonfirmasi,-6,6) as hasil FROM tbl_suratkonfirmasi WHERE SUBSTRING(id_suratkonfirmasi,1,2)='SK' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
$hit    = mysqli_num_rows($get_id);
if ($hit == 0){
    $id_k   = "SK000001";
} else if ($hit > 0){
    $row    = mysqli_fetch_array($trim_id);
    $kode   = $row['hasil']+1;
    $id_k   = "SK".str_pad($kode,6,"0",STR_PAD_LEFT); 
} 

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
            $html = file_get_contents("http://localhost:81/tika-skripsi/pdf/skk.php?id=".$id."&data=".$allData."&ket=".$allKet);
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
            $html = file_get_contents("http://localhost:81/tika-skripsi/pdf/sm.php?id=".$id."&data=".$allData."&ket=".$allKet);
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
            $html = file_get_contents("http://localhost:81/tika-skripsi/pdf/sr.php?id=".$id."&data=".$allData."&ket=".$allKet);
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
            $html = file_get_contents("http://localhost:81/tika-skripsi/pdf/srk.php?id=".$id."&data=".$allData."&ket=".$allKet);
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
            $html = file_get_contents("http://localhost:81/tika-skripsi/pdf/skl.php?id=".$id."&data=".$allData."&ket=".$allKet);
        break;
    }
}
$dompdf->loadHtml($html);
// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Menjadikan HTML sebagai PDF
$dompdf->render();

$datas = json_decode($_POST['arrData']);
$idsurat = $_POST['id'];

if ($idsurat == 'KSURAT002') {
    foreach($datas as $row){
        if ($row->code == 1){
            $i[] = $row->nim;
        }
    }
        $nice = json_encode($i);
} else {
    $i[] = $datas[0]->nim;
    $nice = json_encode($i);
}

foreach(json_decode($_POST['arrData']) as $row){
    $output = $dompdf->output();
    $filename = $id_k.".pdf";
    $date = date('Y-m-d');
    mysqli_query($conn, "INSERT INTO tbl_suratkonfirmasi (id_suratkonfirmasi, id_kategori, status_surat, file_surat, data, created_at)
                        VALUES ('$id_k', '$id', 0, '$filename', '$nice', '$date')");
    file_put_contents('../file/surat/'.$filename, $output);    
}
// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("Codingan",array("Attachment"=>0));
