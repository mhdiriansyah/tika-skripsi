<?php 
include '../lib/koneksi.php';
include 'service.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Magang</title>
    <style>
        .container {
            width: 100%;
        }
        h2 {
            text-decoration: underline;
        }
        .row.title {
            height: 170px;
            width: 100%;
        }
        .side-right {
            float: right;
            width: 35%;
        }
        .side-left {
            float: left;
            width: 65%;
        }
        .row.desc {
            line-height: 1.1;
            text-align: justify;
            margin-left: 105px;
            margin-right: 50px;
        }
        .row.desc p {
            font-size: 12pt;
        }
        .ttd {
            text-align: center;
            vertical-align: middle;
            margin-left: 400px;
        }
        table.mhs {
            margin-left: 5px;
            margin-bottom: -10px;
            border-collapse: collapse;
            font-size: 12pt;
        }
        table.mhs tr td {
            border: 0.8px solid black;
        }
        table.mhs td.center {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php 
        $id = $_GET['id'];
        $data = unserialize($_GET['data']);
        $ket = unserialize($_GET['ket']);

        foreach($data as $row){
            $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$row'");
            $data = mysqli_fetch_array($q);
            $isi['nim'] = $data['nim'];
            $isi['nama'] = $data['nama_lengkap'];
            $isi['semester'] = $data['semester'];
            $datas[] = $isi;
        }
            $nice = json_encode($datas);
            $all = json_decode($nice);

    ?>
    <div class="container">
        <div class="row title">
            <div class="side-left">
                <br>
                <table>
                    <tr>
                        <td width="100px">No</td>
                        <td>: /2/B04/Srt/2019</td>
                    </tr>
                    <tr>
                        <td width="100px">Lampiran</td>
                        <td>: -</td>
                    </tr>
                    <tr>
                        <td width="100px">Perihal</td>
                        <td>: Permohonan Kerja Magang</td>
                    </tr>
                </table>
            </div>
            <div class="side-right">
                <table>
                    <tr>
                        <td>Jakarta, <?= tgl_indo(date('Y-m-d')) ?></td>
                    </tr>
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
                    <tr>
                        <td>Kepada Yth: </td>
                    </tr>
                    <tr>
                        <td><?= str_replace('_', ' ',$ket['ditujukan']) ?> </td>
                    </tr>
                    <tr>
                        <td><small>di</small></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="margin-left: 15px;">
                            <?= str_replace('_', ' ',$ket['alamat_perusahaan']) ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row desc">
            <p>
                Dalam rangka memenuhi persyaratan Kurikulum di jurusan S1 Teknik Informatika  STT-PLN, Mahasiswa wajib melaksanakan Kerja Magang di Perusahaan.
                Sehubungan dengan hal tersebut, maka Mahasiswa kami berminat dan merencanakan untuk melaksanakan Kerja Magang di <strong><?= str_replace('_', ' ', $ket['nama_perusahaan']) ?></strong>.
            </p>
            <p>
                Mohon Kiranya Mahasiswa tersebut dibawah ini dapat diberi kesempatan melaksanakan Kerja Magang selama <?= durationDate($ket['periode_awal'],$ket['periode_akhir']) ?> bulan, dengan perkiraan jadwal pada bulan
                <strong><?= periodDate($ket['periode_awal'],$ket['periode_akhir']) ?></strong>
            </p>
            <p>
                Adapun Mahasiswa yang dimaksud sebagai berikut :
            </p>
            <div style="margin-left: 15px;margin-top: -5px;margin-bottom: 5px;">
                <table class="mhs">
                    <tr>
                        <td>No.</td>
                        <td width="300px" class="center">Nama</td>
                        <td width="100px" class="center">NIM</td>
                        <td width="70px" class="center">Semester</td>
                    </tr>
                    <?php 
                    $no=1;
                        foreach($all as $row){
                            echo '<tr>';
                            echo '<td class="center">'.$no.'.</td>';
                            echo '<td>'.$row->nama.'</td>';
                            echo '<td class="center">'.$row->nim.'</td>';
                            echo '<td class="center">'.$row->semester.'</td>';
                            echo '</tr>'; 
                        $no++;                           
                        }
                    ?>
                </table>
            </div>
            <p>
                Selama pelaksanaan Kerja Magang, Mahasiswa yang bersangkutan agar diikutsertakan/dipekerjakan dalam kegiatan operasional unit kerja dan dimonitor secara ketat kehadirannya. Selain itu, kami mengharapkan pihak
                perusahaan dapat menyediakan seorang Supervisor sebagai Pembimbing lapangan/mentor agar dapat memberikan konsultasi kepada Mahasiswa serta diharapkan ada komunikasi antara Pembimbing lapangan/mentor dengan Dosen
                pembimbing di STT-PLN.
            </p>
            <p>
                Pada akhir Kerja Magang, Mahasiswa diwajibkan membuat laporan yang dinilai oleh Pembimbing lapangan/mentor dari pihak perusahaan dan Dosen Pembimbing Kerja Magang STT-PLN dengan penekanan materi yang menitikberatkan
                pada salah satu objek praktek yang dilaksanakan
            </p>
            <p>
                Selanjutnya, segala ketentuan atau peraturan yang berlaku di Unit Kerja Bapak/Ibu akan dilaksanakan dan dipatuhi oleh Mahasiswa yang bersangkutan. Demikian permohonan kami, atas perhatian dan bantuan yang diberikan,
                ucapkan terima kasih.
            </p>
        </div>
        <div class="row">
            <div class="ttd">
                <p>Kepala Departemen Informatika</p>
                <br><br>
                <p style="font-weight:bold;">(MEILIA NUR INDAH, S.ST., M.KOM)</p>
            </div>
        </div>
        <div class="row desc">
            <p>Tembusan :</p>
            <p>
                - Dosen Pembimbing Kerja Magang <br>
                - ybs
            </p>
        </div>
    </div>
</body>
</html>