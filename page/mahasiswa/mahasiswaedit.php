<?php 
    $g = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Edit Data Mahasiswa</h3>
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
                <form action="?page=mahasiswaeditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                            <label>NIM</label><br>
                            <a class="btn btn-success"><i class="fa fa-user"></i> <?= $data['nim'] ?></a>
                                <input type="hidden" name="nim" value="<?= $data['nim'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Nama Lengkap Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="masukkan nama lengkap mahasiswa ..." value="<?= $data['nama_lengkap'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="masukkan email mahasiswa ..." value="<?= $data['email'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>IPK</label>
                                <input type="text" class="form-control" name="ipk" placeholder="masukkan ipk mahasiswa ..." value="<?= $data['ipk'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control kapital" name="semester" placeholder="masukkan semester mahasiswa ..." value="<?= $data['semester'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" placeholder="masukkan password untuk akun mahasiswa ..." value="<?= $data['password'] ?>" required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="simpan">
        <a href="?page=mahasiswa" class="btn btn-default">kembali</a>
    </div>
    </form>
</div>