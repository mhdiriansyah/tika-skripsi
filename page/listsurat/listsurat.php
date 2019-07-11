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
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
                <button id="btnListSurat" class="btn btn-info" style="outline:none;"><i class="fa fa-envelope"></i> By List Surat</button>
                <button id="btnListMhs" class="btn btn-info" style="outline:none;"><i class="fa fa-users"></i> By List Mahasiswa</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="listSurat" class="table-responsive">
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
                                    <td><?= getStatus($data['id_kategori'],$data['status_surat']) ?></td>
                                    <td><?= tanggal_indo($data['created_at']) ?></td>
                                    <td>
                                        <a href="?page=listsuratlihat&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-warning"><i class="fa fa-eye"></i> lihat</a>
                                        <?php if ($data['id_kategori'] == 'KSURAT002'){
                                                if($data['status_surat'] == 2){ ?>
                                            <a href="?page=listsuratacc&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> disetujui jurusan</a>
                                            <?php } ?>
                                            <?php if($data['status_surat'] == 1){ ?>
                                            <a href="?page=listsurataccperusahaan&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> disetujui perusahaan</a>
                                            <?php }} else { 
                                                if($data['status_surat'] == 2){ ?>
                                                <a href="?page=listsuratacc&id=<?= $data['id_suratkonfirmasi'] ?>" class="btn btn-primary"><i class="fa fa-check-square"></i> disetujui jurusan</a>
                                        <?php }} ?>
                                    </td>
                                </tr>
                            <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
                <div id="listMhs" class="table-responsive">
                    <table class="table table-bordered example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama Lengkap</th>
                                <th>Pengajuan Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
                            while($data=mysqli_fetch_array($q)){
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nim'] ?></td>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td><?= jumSuratPengajuan($data['nim']) ?></td>
                                    <td>
                                        <a href="?page=listsuratmhs&id=<?= $data['nim'] ?>" class="btn btn-warning"><i class="fa fa-eye"></i> lihat</a>
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