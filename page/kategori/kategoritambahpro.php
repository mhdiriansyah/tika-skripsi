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
                <?php 
                    if (isset($_POST['submit'])){
                        $idkategori    = $_POST['id_kategori'];
                        $nama          = $_POST['nama'];
                        $kode          = strtoupper($_POST['kode']);
                        $ket           = (!empty($_POST['keterangan'])) ? $_POST['keterangan'] : NULL;

                        //file upload
                        $nama_file     = $_FILES['file']['name'];
                        $loc_file      = $_FILES['file']['tmp_name'];
                        $type_file     = $_FILES['file']['type'];
                        $cek           = array('png','jpg','jpeg','docx','pdf');
                        $x             = explode('.',$nama_file);
                        $extension     = strtolower(end($x));

                        (!empty($nama_file)) ? $filename = $idkategori.".".$extension : $filename = NULL;

                        $insert = mysqli_query($conn, "INSERT INTO tbl_kategorisurat SET
                                id_kategori     = '$idkategori',
                                nama            = '$nama',
                                kode            = '$kode',
                                file            = '$filename',
                                ket             = '$ket'");
                        
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