<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Upload Surat Selesai dari Jurusan</h3>
                    <p class="panel-subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form action="?page=listsurataccperusahaan" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Upload</label>
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="proses">
        <a href="?page=listsurat" class="btn btn-default">kembali</a>
    </div>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <?php

        if (isset($_POST['submit'])){
            $id            = $_POST['id'];
            $nama_file     = $_FILES['file']['name'];
            $loc_file      = $_FILES['file']['tmp_name'];
            $type_file     = $_FILES['file']['type'];
            $x             = explode('.',$nama_file);
            $extension     = strtolower(end($x));
            $newfilename   = 'SURAT_FINAL_'.$id.".".$extension;
            $date          = date('Y-m-d');

            move_uploaded_file($loc_file,"file/final/$newfilename");

            $update = mysqli_query($conn, "UPDATE tbl_suratkonfirmasi SET
                                status_surat                = 3,
                                acc_at                      = '$date',
                                file_surat_final            = '$newfilename'
                                WHERE kd_suratkonfirmasi    = '$id'");

            if ($update){
                echo '<div class="alert alert-success alert-dismissible" role="alert">'.
                    '<i class="fa fa-check-circle"></i> Upload berhasil'.
                '</div>';
                echo "<meta http-equiv='refresh' content='1;
                url=?page=listsurat'>";
            }
        }
        ?>
    </div>
</div>