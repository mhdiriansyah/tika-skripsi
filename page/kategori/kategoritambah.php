<?php 
    $get_id = mysqli_query($conn, "SELECT id_kategori FROM tbl_kategorisurat WHERE SUBSTRING(id_kategori,1,6)='KSURAT'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_kategori,-3,3) as hasil FROM tbl_kategorisurat WHERE SUBSTRING(id_kategori,1,6)='KSURAT' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "KSURAT001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "KSURAT".str_pad($kode,3,"0",STR_PAD_LEFT); 
    }    
?>
<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Tambah Kategori Surat</h3>
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
                <form action="?page=kategoritambahpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <a class="btn btn-success"><i class="fa fa-file"></i> <?= $id_k ?></a>
                                <input type="hidden" name="id_kategori" value="<?= $id_k ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Nama Surat</label>
                                <input type="text" class="form-control" name="nama" placeholder="masukkan nama surat" autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Kode Surat</label>
                                <input type="text" maxlength="3" class="form-control kapital" name="kode" placeholder="masukkan kode surat (maks: 3 karatker)" autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Keterangan Surat</label>
                                <textarea class="form-control" name="keterangan" placeholder="masukkan keterangan surat" autocomplete="OFF"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>File Contoh Surat</label>
                                <input type="file" class="form-control" name="file">
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