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
    <title>Surat Rekomendasi</title>
    <style>
        .container {
            width: 100%;
        }
        h2 {
            text-decoration: underline;
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
            margin-left: 400px;
        }
        .row.content table {
            margin-left: 25px;
            border-spacing: 10px;
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
            <h2>SURAT REKOMENDASI</h2>
        </div>
        <div class="row content">
            Yang bertanda tangan dibawah ini menerangkan bahwa :
            <br><br>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?= $datas['nama_lengkap'] ?></td>
                </tr>
                <tr>
                    <td>Tempat dan tanggal lahir</td>
                    <td>: <?= $ket['tempat'].', '.tgl_indo(date('Y-m-d', strtotime($ket['tgl_lahir']))) ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: <?= $datas['nim'] ?></td>
                </tr>
                <tr>
                    <td class="left">Program Studi</td>
                    <td>: Teknik Informatika</td>
                </tr>
                <tr>
                    <td>Jenjang</td>
                    <td>: S1</td>
                </tr>
                <tr>
                    <td>IPK</td>
                    <td>: <?= $datas['ipk'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= str_replace('_', ' ', $ket['alamat']) ?></td>
                </tr>
            </table>
        </div>
        <div class="row desc">
            <p>
                Adalah benar mahasiswa Sekolah Tinggi Teknik Yayasan Pendidikan dan Kesejahteraan PT. PLN (Persero) pada
                program studi dan jenjang studi tersebut diatas yang terdaftar dan aktif kuliah pada Semester Genap TA 2017/2018
            </p>
        </div>
        <div class="row desc">
            <p>
                Sehubungan dengan pengajuan permohonan bantuan <?= strtoupper(str_replace('_', ' ', $ket['alasan'])) ?>, kami sampaikan Rekomendasi kepada
                yang bersangkutan untuk mengajukan <?= strtoupper(str_replace('_', ' ', $ket['alasan'])) ?>.
            </p>
        </div>
        <div class="row desc">
            <p>
                Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>
        <div class="row">
            <div class="ttd">
                <p>Jakarta, <?= tgl_indo(date('Y-m-d')) ?></p>
                <p>Ketua Departemen Informatika</p>
                <br><br><br>
                <p style="font-weight:bold;">(MEILIA NUR INDAH, S.ST., M.KOM)</p>
            </div>
        </div>
    </div>
</body>
</html>