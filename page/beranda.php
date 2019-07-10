<?php 

    if ($role == 1){
        $mhs = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_mahasiswa"));
        $kategori_surat = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_kategorisurat"));
        $surat_konfirmasi = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_suratkonfirmasi"));
    } else {
        $surat_active = 0;
        $surat_finish = 0;
        $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi WHERE status_surat=0");
        while($datas = mysqli_fetch_array($q)){
            if (in_array($datauser['nim'], json_decode($datas['data']))){
                $surat_active++;
            }
        }
        $r = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi WHERE status_surat=1");
        while($datas = mysqli_fetch_array($r)){
            if (in_array($datauser['nim'], json_decode($datas['data']))){
                $surat_finish++;
            }
        }
    }

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
                        <span class="number"><?= $surat_active ?></span>
                        <span class="title">Surat Diproses</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-envelope"></i></span>
                    <p>
                        <span class="number"><?= $surat_finish ?></span>
                        <span class="title">Surat Selesai</span>
                    </p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>