<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">List Persetujuan Surat</h3>
                    <p class="panel-subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Surat Keterangan</th>
                                <th>Nama Mahasiswa</th>
                                <th>Status</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                                    JOIN tbl_mahasiswa ON tbl_suratkonfirmasi.nim=tbl_mahasiswa.nim
                                                    JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori");
                            while($data=mysqli_fetch_array($q)){ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><span class="label label-success"><i class="fa fa-file"></i> <?= $data['nama'] ?></span></td>
                                    <td><?= '('.$data['nim'].') '.$data['nama_lengkap'] ?></td>
                                    <td><?= getStatus($data['status_surat']) ?></td>
                                    <td><span class="label label-info"><i class="fa fa-check-square"></i> selesai</span></td>
                                </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>