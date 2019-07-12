<div class="panel panel-headline">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">
                <div class="profile-header">
                    <div class="overlay"></div>
                    <div class="profile-main">
                        <img src="<?= $photo ?>" class="img-circle" width="100" alt="<?= $nama ?>">
                        <h3 class="name"><?= $nama ?></h3>
                        <span class="online-status status-available">Aktif</span>
                    </div>
                    <div class="profile-stat">
                        <div class="row">
                            <div class="col-md-6 stat-item">
                                <span>IPK</span> <?= $datauser['ipk'] ?>
                            </div>
                            <div class="col-md-6 stat-item">
                                <span>Semester</span> <?= $datauser['semester'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="profile-info informasiumum">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">Informasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NIM</td>
                                <td><?= $datauser['nim'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $datauser['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Login Terakhir</td>
                                <td><?= $datauser['terakhir_login'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="profile-info editpassword">
                    <h4 class="heading">Ubah Password</h4>
                    <form action="?page=profiledit" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="nim" value="<?= $datauser['nim'] ?>">
                        <input type="text" class="form-control" name="password" placeholder="inputkan password baru ..." autocomplete="off" required>
                </div>
                <div id="btnsimpanpassword" class="text-center editpassword"><input class="btn btn-primary" type="submit" name="submit" value="Simpan"></div>
                </form>
                <div id="btneditpassword" class="text-center informasiumum"><button class="btn btn-primary"><i class="fa fa-lock"></i> Ubah Password</button></div>
            </div>
        </div>
    </div>
</div>