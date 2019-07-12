<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Menolak Surat Keterangan</h3>
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
					Apakah jurusan menolak surat ini ?
                    <form action="?page=listsurattolak" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                        <a href="?page=listsurat" class="btn btn-primary">Tidak</a>
                    </form>
                </div>
                <?php 
                if (isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $update = mysqli_query($conn, "UPDATE tbl_suratkonfirmasi SET status_surat=0 WHERE id_suratkonfirmasi='$id'");
                    if ($update) {
                        echo    '<div class="alert alert-success" role="alert">'.
                                    '<i class="fa fa-check-circle"></i> Surat berhasil ditolak'.
                                '</div>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=listsurat'>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>