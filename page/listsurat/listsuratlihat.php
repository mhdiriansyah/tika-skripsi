<?php 
    $g = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi 
                            JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori
                            WHERE tbl_suratkonfirmasi.kd_suratkonfirmasi='$_GET[id]'
                            GROUP BY tbl_suratkonfirmasi.kd_suratkonfirmasi");
    $data = mysqli_fetch_array($g);

    if ($data['view_admin'] == 0){
        mysqli_query($conn, "UPDATE tbl_suratkonfirmasi SET view_admin=1 WHERE kd_suratkonfirmasi='$data[kd_suratkonfirmasi]'");
    }
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
                            <td><span class="label label-success"><?= $data['kd_suratkonfirmasi'] ?></span></td>
                        </tr>
                        <tr>
                            <td>Tipe Surat</td>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>File Surat Final</td>
                            <td><?= getOnlyFileSurat($data['file_surat_final'],2) ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?= getStatus($data['id_kategori'],$data['status_surat']) ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                            <?= ketKategori($data['id_kategori'],$data['data']) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="3">Data Mahasiswa</th>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                                    JOIN tbl_mahasiswa ON tbl_suratkonfirmasi.nim=tbl_mahasiswa.nim
                                                    WHERE tbl_suratkonfirmasi.kd_suratkonfirmasi='$_GET[id]'");
                            while($datas = mysqli_fetch_array($sql)){
                                echo '<tr>';
                                echo '<td>'.$datas['nim'].'</td>';
                                echo '<td>'.$datas['nama_lengkap'].'</td>';
                                echo '<td>'.$datas['semester'].'</td>';
                                echo '<tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a href="?page=listsurat" class="btn btn-default">kembali</a>
        <?php 
        if ($data['id_kategori'] == 'KSURAT002'){
            if($data['status_surat'] == 2){ ?>
        <a href="?page=listsuratacc&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> disetujui jurusan</a>
        <a href="?page=listsurattolak&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-danger"><i class="fa fa-remove"></i> ditolak</a>
        <?php } ?>
        <?php if($data['status_surat'] == 1){ ?>
        <a href="?page=listsurataccperusahaan&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> disetujui perusahaan</a>
        <a href="?page=listsurattolak&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-danger"><i class="fa fa-remove"></i> ditolak</a>
        <?php }} else { 
            if($data['status_surat'] == 2){ ?>
             <a href="?page=listsuratacc&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> disetujui jurusan</a>
             <a href="?page=listsurattolak&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-danger"><i class="fa fa-remove"></i> ditolak</a>
        <?php }} ?>
    </div>
</div>