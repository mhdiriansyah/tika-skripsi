<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Upload Bukti Surat Balasan</h3>
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
                <form action="?page=persetujuanupload" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Upload</label>
                                <input type="text" name="id" value="<?= $_GET['id'] ?>">
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="proses">
        <a href="?page=persetujuansurat" class="btn btn-default">kembali</a>
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
        $newfilename   = 'BUKTI_'.$id.".".$extension;

        move_uploaded_file($loc_file,"file/$newfilename");

        $update = mysqli_query($conn, "UPDATE tbl_suratkonfirmasi SET
                            file_upload                 = '$newfilename'
                            WHERE id_suratkonfirmasi    = '$id'");

        if ($update){
            echo '<div class="alert alert-success alert-dismissible" role="alert">'.
                '<i class="fa fa-check-circle"></i> Upload berhasil'.
            '</div>';
            echo "<meta http-equiv='refresh' content='1;
            url=?page=persetujuansurat'>";
        }
    }
    ?>
    </div>
</div>