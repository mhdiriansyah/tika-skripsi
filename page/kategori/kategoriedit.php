<?php 
    $g = mysqli_query($conn, "SELECT * FROM tbl_kategorisurat WHERE id_kategori='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Edit Kategori Surat</h3>
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
                <form action="?page=kategorieditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <a class="btn btn-success"><i class="fa fa-file"></i> <?= $data['id_kategori'] ?></a>
                                <input type="hidden" name="id_kategori" value="<?= $data['id_kategori'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Nama Surat</label>
                                <input type="text" class="form-control" name="nama" placeholder="masukkan nama surat" autocomplete="OFF" value="<?= $data['nama'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Kode Surat</label>
                                <input type="text" maxlength="3" class="form-control kapital" name="kode" placeholder="masukkan kode surat (maks: 3 karatker)" autocomplete="OFF" value="<?= $data['kode'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Keterangan Surat</label>
                                <textarea class="form-control" name="keterangan" placeholder="masukkan keterangan surat" autocomplete="OFF"><?= $data['ket'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>File Contoh Surat</label>
                                <p><?= $data['file'] ?></p>
                                <input type="hidden" name="fileold" value="<?= $data['file'] ?>">
                                <input type="file" class="form-control" name="file" value="<?= $data['ket'] ?>">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="simpan">
        <a href="?page=kategori" class="btn btn-default">kembali</a>
    </div>
    </form>
</div>