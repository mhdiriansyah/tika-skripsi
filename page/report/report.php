<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Report Data</h3>
                    <p class="panel-subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form action="./pdf/report.php" method="post" target="_blank" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div clas="form-group">
                                <label>Kategori Surat</label>
                                <select class="form-control" name="ksurat">
                                <option style="display:none;">-- pilih salah satu --</option>
                                <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM tbl_kategorisurat");
                                    while($datas = mysqli_fetch_array($sql)){
                                        echo '<option value="'.$datas['id_kategori'].'">'.$datas['nama'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div clas="form-group">
                                <label>Status Surat</label>
                                <select class="form-control" name="ssurat">
                                <option style="display:none;">-- pilih salah satu --</option>
                                <option value="1">Sudah di ACC</option> 
                                <option value="2">Belum di ACC</option>                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" name="submit" style="margin-top: 25px;" class="btn btn-primary btn-block" value="Proses">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>