<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Hapus Persetujuan Surat</h3>
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
                <div class="alert alert-warning" role="alert">
					Apakah anda yakin ingin menghapus surat ini ?
                    <form action="?page=persetujuansurathapus" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="file" value="<?= $_GET['file'] ?>">
                        <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                        <a href="?page=persetujuansurat" class="btn btn-primary">Tidak</a>
                    </form>
                </div>
                <?php 
                if (isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $file = $_POST['file'];
                    unlink("file/surat/$file");
                    $delete = mysqli_query($conn, "DELETE FROM tbl_suratkonfirmasi WHERE id_suratkonfirmasi='$id'");
                    if ($delete) {
                        echo    '<div class="alert alert-success" role="alert">'.
                                    '<i class="fa fa-check-circle"></i> Data berhasil dihapus'.
                                '</div>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=persetujuansurat'>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>