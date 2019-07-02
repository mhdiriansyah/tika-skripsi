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
                        $idkategori    = $_POST['id_kategori'];
                        $nama          = $_POST['nama'];
                        $kode          = strtoupper($_POST['kode']);
                        $ket           = (!empty($_POST['keterangan'])) ? $_POST['keterangan'] : NULL;

                        //file upload
                        $fileold       = $_POST['fileold'];
                        $nama_file     = $_FILES['file']['name'];
                        $loc_file      = $_FILES['file']['tmp_name'];
                        $type_file     = $_FILES['file']['type'];
                        $cek           = array('png','jpg','jpeg','docx','pdf');
                        $x             = explode('.',$nama_file);
                        $extension     = strtolower(end($x));

                        if (!empty($nama_file)){
                            if (in_array($extension,$cek) === TRUE){
                                $newfilename = $idkategori.".".$extension;
                                if (!empty($fileold)){
                                    unlink("file/$fileold");
                                }
                                move_uploaded_file($loc_file,"file/$newfilename");

                                $insert = mysqli_query($conn, "UPDATE tbl_kategorisurat SET
                                    nama                = '$nama',
                                    kode                = '$kode',
                                    file                = '$newfilename',
                                    ket                 = '$ket'
                                    WHERE id_kategori   = '$idkategori'");
                            }
                        } else {
                            $insert = mysqli_query($conn, "UPDATE tbl_kategorisurat SET
                                nama                = '$nama',
                                kode                = '$kode',
                                ket                 = '$ket'
                                WHERE id_kategori   = '$idkategori'");
                        }
                        
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