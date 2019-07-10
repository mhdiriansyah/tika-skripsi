<?php 
    $g = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi 
                            JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori
                            WHERE tbl_suratkonfirmasi.id_suratkonfirmasi='$_GET[id]'");
    $data = mysqli_fetch_array($g);

    foreach(json_decode($data['data']) as $key){
        $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$key'");
        $datas = mysqli_fetch_array($q);
        $isi['nim'] = $datas['nim'];
        $isi['nama_lengkap'] = $datas['nama_lengkap'];
        $isi['semester'] = $datas['semester'];
        $arr[] = $isi;
    }
        $arrData = json_encode($arr)
?>
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Lihat List Pengajuan Surat</h3>
                    <p class="panel-subtitle"></p>
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">
            <?= getFileSurat($data['file_surat']) ?>
            </div>
            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Data Surat Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID Surat</td>
                            <td><span class="label label-success"><?= $data['id_suratkonfirmasi'] ?></span></td>
                        </tr>
                        <tr>
                            <td>Tipe Surat</td>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?= getStatus($data['status_surat']) ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="3">Data Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach(json_decode($arrData) as $key){
                                echo '<tr>';
                                echo '<td>'.$key->nim.'</td>';
                                echo '<td>'.$key->nama_lengkap.'</td>';
                                echo '<td>'.$key->semester.'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a href="?page=listsurat" class="btn btn-default">kembali</a>
        <?php if($data['status_surat'] == 0){ ?>
        <a href="?page=listsuratacc&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> setujui</a>
        <?php } ?>
    </div>
</div>