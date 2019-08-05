<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Acc Jurusan Surat Magang</h3>
                    <p class="panel-subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
					Apakah anda menyetujui surat ini ?
                    <form action="?page=listsuratacc1" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                        <a href="?page=kategori" class="btn btn-primary">Tidak</a>
                    </form>
                </div>
                <?php 
                if (isset($_POST['submit'])){
                    $id     = $_POST['id'];
                    $update = mysqli_query($conn, "UPDATE tbl_suratkonfirmasi SET status_surat=1 WHERE kd_suratkonfirmasi='$id'");
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
    </div>
</div>