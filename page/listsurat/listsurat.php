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
                                <th>Surat</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                                    JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori");
                            while($data=mysqli_fetch_array($q)){
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><a href="file/surat/<?=$data['file_surat'] ?>" class="btn btn-info btn-xs" target="_blank" title="lihat file"><?= $data['file_surat'] ?></a></td>
                                    <td><?= getStatus($data['status_surat']) ?></td>
                                    <td><?= tanggal_indo($data['created_at']) ?></td>
                                    <td>
                                        <a href="?page=listsuratlihat&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-warning"><i class="fa fa-eye"></i> lihat</a>
                                        <?php if($data['status_surat'] == 0){ ?>
                                        <a href="?page=listsuratacc&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> setujui</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>