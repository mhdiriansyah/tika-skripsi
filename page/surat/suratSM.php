<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Form Surat Magang</h3>
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
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <input type="hidden" name="nim" value="<?= $datauser['nim'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-6">
                            <div clas="form-group" id="rowNim">
                                <input type="hidden" name="counter" class="form-control" id="counter" value="0">
                                <input type="button" id="tambah" class="btn btn-primary" value="tambah nim">
                                <input type="button" id="hapus" class="btn btn-danger" value="hapus nim">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Ditujukan Kepada</label>
                                <input class="form-control" name="ditujukan" placeholder="ditujukan kepada cth: Kepala HRD PLN Persero ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Nama Perusahaan</label>
                                <input class="form-control" name="nama_perusahaan" placeholder="nama perusahaan tujuan ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="alamat perusahaan tujuan ..." autocomplete="OFF" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Periode Magang</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="date" class="form-control" name="tgl1" required>
                                    </div>
                                    <div class="col-md-2">sampai</div>
                                    <div class="col-md-5">
                                        <input type="date" class="form-control" name="tgl2" required>
                                    </div>
                                </div>
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