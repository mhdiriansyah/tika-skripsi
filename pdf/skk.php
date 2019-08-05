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
    <title>Surat Keterangan Kuliah</title>
    <style>
        .container {
            width: 100%;
            padding: 0px 30px 30px 30px;
        }
        .title h2 {
            text-decoration: underline;
        }
        .title p {
            font-weight: bold;
            margin-top: -20px;
            font-size: 15pt;
        }
        .row.title {
            margin-top: 50px;
            text-align: center;
            margin-bottom: 50px;
        }
        .row.desc {
            line-height: 1.6;
            text-align: justify;
        }
        .ttd {
            text-align: center;
            vertical-align: middle;
            margin-left: 300px;
        }
        .row.desc table {
            border-spacing: 5px;
        }
        table tr td:first-child {
            width: 150px;
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
            <h2>SURAT KETERANGAN</h2>
            <p>No. 255/KT/2/B04/2019</p>
        </div>
        <div class="row desc">
            Yang bertanda tangan dibawah ini :
            <br><br>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: Meilia Nur Indah S, ST., M.KOM </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: Kepala Departemen Informatika</td>
                </tr>
            </table>
            <br>
            Menerangkan Bahwa :
            <br><br>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?= $datas['nama_lengkap'] ?> </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: <?= $datas['nim'] ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl. Lahir</td>
                    <td>: <?= $ket['tempat'].', '.tgl_indo(date('Y-m-d', strtotime($ket['tgl_lahir']))) ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= str_replace('_', ' ', $ket['alamat']) ?></td>
                </tr>
            </table>

        </div>
        <div class="row desc">
            <p>
                Adalah benar mahasiswa Sekolah Tinggi Teknik - PLN jurusan S1 Teknik Informatika pada yang terdaftar pada Semester VI Tahun Akademik 2017/2018
            </p>
        </div>
        <div class="row desc">
            <p>
                Demikian surat keterangan ini kami buat, untuk diketahui dan digunakan sebagaimana mestinya.
            </p>
        </div>
        <div class="row">
            <div class="ttd">
                <p>Jakarta, <?= tgl_indo(date('Y-m-d')) ?></p>
                <p>Kepala Departemen Informatika</p>
                <br><br><br>
                <p style="font-weight:bold;">(MEILIA NUR INDAH, S.ST., M.KOM)</p>
            </div>
        </div>
    </div>
</body>
</html>