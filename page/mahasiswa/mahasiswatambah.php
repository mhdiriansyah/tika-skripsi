<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Tambah Data Mahasiswa</h3>
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
                <form action="?page=mahasiswatambahpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>NIM Mahasiswa</label>
                                <input class="form-control" type="text" name="nim" placeholder="masukkan nim mahasiswa ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Nama Lengkap Mahasiswa</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="masukkan nama lengkap mahasiswa ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="masukkan email mahasiswa ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>IPK</label>
                                <input type="text" class="form-control" name="ipk" placeholder="masukkan ipk mahasiswa ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Semester</label>
                                <input type="number" class="form-control" name="semester" placeholder="masukkan semester mahasiswa ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div clas="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" placeholder="masukkan password untuk akun mahasiswa ..." autocomplete="OFF" required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="submit" name="submit" class="btn btn-primary" value="simpan">
        <a href="?page=mahasiswa" class="btn btn-default">kembali</a>
    </div>
    </form>
</div>