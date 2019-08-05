
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
                                <th>File Surat Final</th>
                                <th>Bukti Upload</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                                    JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori
                                                    WHERE tbl_suratkonfirmasi.nim='$datauser[nim]'");
                            while($data=mysqli_fetch_array($q)){
                                ?>
                                <tr>
                                    <td><?= $no ?>.</td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= getOnlyFileSurat($data['file_surat'],1) ?></td>
                                    <td><?= getOnlyFileSurat($data['file_surat_final'],2) ?></td>
                                    <td><?= buktiUpload($data['file_upload']) ?></td>
                                    <td><?= getStatus($data['id_kategori'],$data['status_surat']) ?></td>
                                    <td>
                                    <?php if ($data['id_kategori'] == 'KSURAT002' && $data['status_surat'] == 1 && empty($data['file_upload'])){ ?>
                                    <a href="?page=persetujuanupload&id=<?= $data['kd_suratkonfirmasi'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-upload"></i> Upload Bukti</a>
                                    <?php } ?>
                                    <?php 
                                    if ($data['id_kategori'] == 'KSURAT002'){
                                    if ($data['status_surat'] > 0 && $data['status_surat'] < 3){ ?>
                                    <a href="?page=persetujuansurathapus&id=<?= $data['id_suratkonfirmasi'] ?>&file=<?= $data['file_surat'] ?>" class="btn btn-danger btn-xs" title="hapus"><i class="fa fa-trash"></i> Hapus</a>
                                    <?php } else { ?>
                                    <span class="label label-success"><i class="fa fa-check-circle"></i> selesai</span>
                                    <?php }} else { 
                                    if ($data['status_surat'] == 1){ ?>
                                    <span class="label label-success"><i class="fa fa-check-circle"></i> selesai</span>
                                    <?php } else { ?>
                                    <a href="?page=persetujuansurathapus&id=<?= $data['id_suratkonfirmasi'] ?>&file=<?= $data['file_surat'] ?>" class="btn btn-danger btn-xs" title="hapus"><i class="fa fa-trash"></i> Hapus</a>
                                    <?php }} ?>
                                    </td>
                                </tr>
                            <?php $no++;} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>