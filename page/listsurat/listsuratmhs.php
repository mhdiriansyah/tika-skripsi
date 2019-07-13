<?php 
    $g = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$_GET[id]'");
    $data = mysqli_fetch_array($g);

    $jum = jumSurat($_GET['id']);
    if ($jum > 0){
        $r = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori");
        while($row=mysqli_fetch_array($r)){
            if(in_array($_GET['id'],json_decode($row['data']))){
                $isi['id'] = $row['id_suratkonfirmasi'];
                $isi['id_kategori'] = $row['id_kategori'];
                $isi['nama_kategori'] = $row['nama'];
                $isi['file_surat'] = $row['file_surat'];
                $isi['status'] = $row['status_surat'];
                $isi['dibuat'] = $row['created_at'];
                $arr[] = $isi;
            }
        }
            $arrSurat = json_encode($arr);
    } else {
        $arr=[];
        $arrSurat = json_encode($arr);
    }


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
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            
                            if (count(json_decode($arrSurat)) > 0){
                                $no = 1;
                                foreach(json_decode($arrSurat) as $row){
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td><span class="label label-info">'.$row->id.'</span></td>';
                                    echo '<td><span class="label label-success">'.$row->id_kategori.'</span> '.$row->nama_kategori.'</td>';
                                    echo '<td><a href="file/surat/'.$row->file_surat.'" class="btn btn-primary btn-xs" target="_blank" title="lihat file">'.$row->file_surat.'</a></td>';
                                    echo '<td>'.getStatus($row->id_kategori,$row->status).'</td>';
                                    echo '<td>'.tanggal_indo($row->dibuat).'</td>';
                                    echo '<td><a href="?page=listsuratlihat&id='.$row->id.'" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> lihat</a></td>';
                                    echo '<tr>';
                                    $no++;
                                }
                            } else {
                                echo '<tr>';
                                echo '<td colspan="6" style="text-align:center;"><span class="label label-danger">belum ada data</span></td>';
                                echo '</tr>';
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