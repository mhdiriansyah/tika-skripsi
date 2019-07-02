<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Manajemen Data Mahasiswa</h3>
                    <p class="panel-subtitle"></p>
                </div>
                <div class="pull-right">
                    <a href="?page=mahasiswatambah" class="btn btn-primary"><i class="fa fa-plus-circle"></i> tambah data</a>
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
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>IPK</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
                            while($data=mysqli_fetch_array($q)){ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><span class="label label-success"><i class="fa fa-file"></i> <?= $data['nim'] ?></span></td>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><span class="label label-info"><?= $data['ipk'] ?></span></td>
                                    <td><?= $data['semester'] ?></td>
                                    <td>
                                        <a href="?page=mahasiswaedit&id=<?= $data['nim'] ?>" class="btn btn-info"><i class="fa fa-edit"></i> edit</a>
                                        <a href="?page=mahasiswahapus&id=<?= $data['nim'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i> hapus</a>
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