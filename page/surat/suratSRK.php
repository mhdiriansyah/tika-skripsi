<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Form Surat Rekomendasi</h3>
                    <p class="panel-subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form action="?page=suratkonfirmasi" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>NIM</label><br>
                                <a class="btn btn-success"><i class="fa fa-user"></i> <?= $datauser['nim'] ?></a>
                                <input type="hidden" name="counter" value="0">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <input type="hidden" name="nim" value="<?= $datauser['nim'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Tempat Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tempat" placeholder="masukkan tempat lahir ..." required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="masukkan alamat anda ..." autocomplete="OFF"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Alasan / Perihal</label>
                                <textarea class="form-control" name="alasan" placeholder="alasan/perihal cth: Beasiswa Kopertis Wilayah III ..." autocomplete="OFF" required></textarea>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="simpan">
        <a href="?page=surat" class="btn btn-default">kembali</a>
    </div>
    </form>
</div>