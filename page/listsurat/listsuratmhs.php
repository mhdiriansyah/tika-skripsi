<?php 
    $g = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">List Pengajuan Surat Berdasarkan Mahasiswa</h3>
                    <p class="panel-subtitle"></p>
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">Data Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NIM</td>
                                <td><span class="label label-success"><?= $data['nim'] ?></span></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td><?= $data['nama_lengkap'] ?></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td><?= $data['semester'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="7">List Pengajuan Surat</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Kd Surat Konfirmasi</th>
                                <th>Kategori</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi 
                                                        JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori
                                                        WHERE nim='$_GET[id]'
                                                        GROUP BY tbl_suratkonfirmasi.kd_suratkonfirmasi");
                            while($datas = mysqli_fetch_array($sql)){
                                echo '<tr>';
                                echo '<td>'.$no.'.</td>';
                                echo '<td><span class="label label-info">'.$datas['kd_suratkonfirmasi'].'</span></td>';
                                echo '<td>'.$datas['nama'].'</td>';
                                echo '<td>'.getOnlyFileSurat($datas['file']).'</td>';
                                echo '<td>'.getStatus($datas['id_kategori'],$datas['status_surat']).'</td>';
                                echo '<td>'.tanggal_indo($datas['created_at']).'</td>';
                                echo '<td><a href="?page=listsuratlihat&id='.$datas['kd_suratkonfirmasi'].'" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> lihat</a></td>';

                            $no++;
                            }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a href="?page=listsurat" class="btn btn-default">kembali</a>
    </div>
</div>