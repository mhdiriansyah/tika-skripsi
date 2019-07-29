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
                                <th>Bukti Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                                    JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori");
                            while($data=mysqli_fetch_array($q)){ 
                                if (in_array($datauser['nim'], json_decode($data['data']))){
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= getFileSurat($data['file_surat']) ?></td>
                                    <td><?= getStatus($data['id_kategori'],$data['status_surat']) ?></td>
                                    <td><?= (!empty($data['file_surat'])) ? '<a class="btn btn-info btn-xs" href="file/'.$data['file_upload'].'" target="_blank">bukti upload</a>' : '' ?></td>
                                    <td>
                                    <?php if ($data['id_kategori'] == 'KSURAT002' && $data['status_surat'] == 1 && empty($data['file_surat'])){ ?>
                                    <a href="?page=persetujuanupload&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-primary">Upload Bukti</a>
                                    <?php } ?>
                                    <a href="?page=persetujuansurathapus&id=<?= $data['id_suratkonfirmasi'] ?>&file=<?= $data['file_surat'] ?>" class="btn btn-danger" title="hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php $no++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>