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
                        $nim        = $_POST['nim'];
                        $nama       = $_POST['nama_lengkap'];
                        $email      = $_POST['email'];
                        $ipk        = $_POST['ipk'];
                        $semester   = strtoupper($_POST['semester']);
                        $password   = $_POST['password'];
                    
                        $insert = mysqli_query($conn, "INSERT INTO tbl_mahasiswa SET
                                nim             = '$nim',
                                nama_lengkap    = '$nama',
                                email           = '$email',
                                ipk             = $ipk,
                                semester        = $semester,
                                password        = '$password'");
                        
                        if ($insert){
                            echo    '<div class="alert alert-success alert-dismissible" role="alert">'.
							            '<i class="fa fa-check-circle"></i> Data berhasil disimpan'.
                                    '</div>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=mahasiswa'>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>