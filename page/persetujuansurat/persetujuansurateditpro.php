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
                <?php 
                    if (isset($_POST['submit'])){
                        $idkategori = $_POST['id_kategori'];
                        $nama       = $_POST['nama'];
                        $kode       = strtoupper($_POST['kode']);

                        $insert = mysqli_query($conn, "UPDATE tbl_kategorisurat SET
                                nama                = '$nama',
                                kode                = '$kode'
                                WHERE id_kategori   = '$idkategori'");
                        
                        if ($insert){
                            echo    '<div class="alert alert-success alert-dismissible" role="alert">'.
							            '<i class="fa fa-check-circle"></i> Data berhasil disimpan'.
                                    '</div>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=kategori'>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>