<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Manajemen Kategori Surat</h3>
                    <p class="panel-subtitle"></p>
                </div>
                <div class="pull-right">
                    <a href="?page=kategoritambah" class="btn btn-primary"><i class="fa fa-plus-circle"></i> tambah data</a>
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
                                <th>Id Kategori</th>
                                <th>Nama Surat</th>
                                <th>Kode Surat</th>
                                <th width="300">Keterangan</th>
                                <th width="400">File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_kategorisurat");
                            while($data=mysqli_fetch_array($q)){ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><span class="label label-success"><i class="fa fa-file"></i> <?= $data['id_kategori'] ?></span></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><span class="label label-warning"><?= $data['kode'] ?></span></td>
                                    <td><?= keteranganSurat($data['ket']) ?></td>
                                    <td><?= getFile($data['file']) ?></td>
                                    <td>
                                        <a href="?page=kategoriedit&id=<?= $data['id_kategori'] ?>" class="btn btn-info"><i class="fa fa-edit"></i> edit</a>
                                        <a href="?page=kategorihapus&id=<?= $data['id_kategori'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> hapus</a>
                                    </td>
                                </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>