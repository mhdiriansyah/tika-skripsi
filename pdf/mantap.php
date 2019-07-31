<?php 
    include "../lib/koneksi.php";
    include "./service.php";
    $sql = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi 
                                JOIN tbl_mahasiswa ON tbl_suratkonfirmasi.nim=tbl_mahasiswa.nim
                                JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori
                                WHERE tbl_kategorisurat.id_kategori='$_GET[ks]' AND status_surat='$_GET[ss]'");
    $count = mysqli_num_rows($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        body { color: #37383a; font-family: 'Roboto', sans-serif; font-size: 11pt;}
        main { padding: 10px;}
        .title { text-align: center;}
        .long-desc {text-align: justify;}
        .long-desc table {width: 100%;}
        #container { width: 100%; padding: 0px 30px 0px 30px; border-bottom: solid 2px #d3d3d3;}
        .row { display: block; width: 500px; height: 100px;}
        .img { display: inline-block; width: 80px; height: 80px; text-align: center;}
        .text { display: inline-block; line-height: 0.3; width: 400px;}
        .listrik-pintar { margin-top: 10px; display: inline-block; width: 400px;}
        .title h2 { text-decoration: capitalize;}
        .row.desc { line-height: 1.6; text-align: justify;}
        .row.desc table { border-spacing: 5px;}
        table.identitas tr td:first-child { width: 150px;}
        table.pelanggan tr th:first-child { width: 50px;}
        table.pelanggan tr th{height: 40px; border-bottom: solid 2px #d3d3d3; background: #f2f2f2;text-align: center;}
        span.acc {display: block; background: #27ae60;color: #f2f2f2;border-radius:5px;text-align: center;}
        span.notacc {display: block; background: #d9534f;color: #f2f2f2;border-radius:5px;text-align: center;}
        #watermark { position: fixed; bottom: 10cm; left: 5.5cm; width: 8cm; height: 8cm; z-index: -1000; opacity: 0.1;}
    </style>
</head>
<body>
    <div id="watermark">
        <img src="<?= $_SERVER['DOCUMENT_ROOT'].'/tika-skripsi/pdf/logo_himaka.jpg' ?>" width="300px">
    </div>
    <main>
        <div class="title">
            <h2>REPORT</h2>
        </div>
        <div class="long-desc">
            <table class="identitas">
                <tr>
                    <td>Tanggal</td>
                    <td>: <?= date('d M Y') ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>: <?= $count ?> Pengajuan Surat</td>
                </tr>
            </table>
        </div><br>
        <div class="long-desc">
            <table class="pelanggan">
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Kategori</th>
                </tr>
                <?php 
                    $no = 1;
                    while($data=mysqli_fetch_array($sql)){ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['nim'].' - '.$data['nama_lengkap'] ?></td>
                            <td><?= $data['id_kategori'].' - '.$data['nama'] ?></td>
                        </tr>
                    <?php $no++; } ?>
            </table>
        </div>
    </main>
</body>
</html>