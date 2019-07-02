<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Manajemen Surat Ku</h3>
                    <p class="panel-subtitle"></p>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-info"><i class="fa fa-file"></i> Lihat Surat Ku</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissible" role="alert">
            <i class="fa fa-info-circle"></i> Berikut ini adalah contoh-contoh dari <strong> Surat Keterangan </strong> yang bisa diajukan di portal ini. selalu ikuti intruksi dan aturannya ya.. :)
        </div>
    </div>
</div>
<div class="row">
<?php
    $sql = mysqli_query($conn, "SELECT * FROM tbl_kategorisurat");
    while($datas = mysqli_fetch_array($sql)){
?>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $datas['nama'] ?></h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body" style="display: block;">
            <p><?= $datas['ket'] ?></p>
            <?= getFile($datas['file']) ?>
            </div>
            <div class="panel-footer">
                <a href="?page=surat<?= $datas['kode'] ?>&id=<?=$datas['id_kategori'] ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Buat Surat</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>