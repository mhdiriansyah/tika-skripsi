<?php 

        $mhs = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_mahasiswa"));
        $kategori_surat = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_kategorisurat"));
        $surat_konfirmasi = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_suratkonfirmasi"));

?>

<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Beranda</h3>
        <p class="panel-subtitle"></p>
    </div>
    <div class="panel-body">
        <div class="row">
        <?php if($role == 1){ ?>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-users"></i></span>
                    <p>
                        <span class="number"><?= $mhs ?></span>
                        <span class="title">Mahasiswa</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-bookmark"></i></span>
                    <p>
                        <span class="number"><?= $kategori_surat ?></span>
                        <span class="title">Kategori Surat</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= $surat_konfirmasi ?></span>
                        <span class="title">List Surat Masuk</span>
                    </p>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= jumMhsSurat('KSURAT001',$datauser['nim']) ?></span>
                        <span class="title">Surat Keterangan Kuliah</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= jumMhsSurat('KSURAT002',$datauser['nim']) ?></span>
                        <span class="title">Surat Magang</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= jumMhsSurat('KSURAT003',$datauser['nim']) ?></span>
                        <span class="title">Surat Riset</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= jumMhsSurat('KSURAT004',$datauser['nim']) ?></span>
                        <span class="title">Surat Rekomendasi</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= jumMhsSurat('KSURAT005',$datauser['nim']) ?></span>
                        <span class="title">Surat Keterangan Lulus</span>
                    </p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>