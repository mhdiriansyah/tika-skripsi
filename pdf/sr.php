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
    <title>Surat Riset</title>
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

        $sql = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$data[0]'");
        $datas = mysqli_fetch_array($sql);
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
                        <td>: Permohonan Ijin Melakukan Riset/Penelitian/Pengambilan Data</td>
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
                Saya yang bertanda tangan dibawah ini :
            </p>
            <div style="margin-left: 50px;margin-top: -5px;margin-bottom: 5px;">
                <table>
                    <tr>
                        <td width="150px">Nama</td>
                        <td>: Meilia Nur Indah S, ST., M.Kom</td>
                    </tr>
                    <tr>
                        <td width="150px">Jabatan</td>
                        <td>: Kepala Departemen Informatika</td>
                    </tr>
                </table>
            </div>
            <p>
                Menerangkan Bahwa :
            </p>
            <div style="margin-left: 15px;margin-top: 5px;margin-bottom: 25px;">
                <table class="mhs">
                    <tr>
                        <td>No.</td>
                        <td width="300px" class="center">Nama</td>
                        <td width="100px" class="center">NIM</td>
                        <td width="70px" class="center">Semester</td>
                    </tr>
                    <tr>
                        <td class="center">1.</td>
                        <td><?= $datas['nama_lengkap'] ?></td>
                        <td class="center"><?= $datas['nim'] ?></td>
                        <td class="center"><?= $datas['semester'] ?></td>
                    </tr>
                </table>
            </div>
            <p>
                adalah benar Mahasiswa/i Sekolah Tinggi Teknik - PLN Jakarta Jurusan S1 Teknik Informatika yang terdaftar pada tahun Akademik 2018/2019.
            </p>
            <p>
                Saat ini Mahasiswa/i tersebut sedang dalam proses penyelesaian pembuatan Skripsi/Tugas Akhir, untuk itu mohon kiranya dapat diberikan ijin
                untuk melakukan Riset/Penelitian/Pengambilan Data yang ada di Perusahaan/Instansi yang Bapak/Ibu pimpin.
            </p>
            <p>
                Adapun Pengambilan Data / Penelitian dan dimaksudkan hanya untuk menerapkan Ilmu Pengetahuan yang didapat dengan Kondisi/Keadaan Nyata di 
                Lapangan, bukan untuk tujuan Komersil/Publikasi di Media Massa.
            </p>
            <p>
                Demikian kami sampaikan, atas perhatiannya dan kerjasamanya kami ucapkan terima kasih.
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
                - ybs
            </p>
        </div>
    </div>
</body>
</html>