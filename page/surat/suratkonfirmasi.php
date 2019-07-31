<div class="panel panel-headline">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left">
                    <h3 class="panel-title">Konfirmasi Surat</h3>
                    <p class="panel-subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=persetujuansurat" class="btn btn-success"><i class="fa fa-file"></i> Lihat daftar surat</a>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <i class="fa fa-info-circle"></i> Periksa kembali data-data dibawah ini. Jika ada <strong>NIM</strong> yang berstatus <strong>tidak terdaftar</strong> dan <strong> kuota sudah melebihi kapasitas</strong>, akan secara otomatis tidak tertera pada surat yang diajukan.
                    Jika data sudah sesuai silahkan klik button proses :) 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if (isset($_POST['submit'])){
                        
                        $id = $_POST['id'];
                        $counter = $_POST['counter'];
                        $nim = $_POST['nim'];

                        switch($id){
                            case 'KSURAT002': // sudah
                                $arrNim = [];
                                $arrData = [];
                                if($counter>0){
                                    for($a=0;$a<$counter;$a++){
                                        $arrNim[] = $_POST["nim".$a.""];
                                    }
                                        array_unshift($arrNim,$nim);
                                } else {
                                    $arrNim[] = $nim;
                                }
                                    $arrNim = array_unique($arrNim);
                                    $arrNim = array_values($arrNim);
                                    json_encode($arrNim);

                                foreach($arrNim as $key => $value){
                                    if (array_search($value, array_column($rowMahasiswa, 'nim')) !== false){
                                        $hit1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi WHERE id_kategori='$id' AND status_surat=0 AND nim='$value'"));
                                        $hit2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi WHERE id_kategori='$id' AND status_surat=3 AND nim='$value'"));
                                        if ($hit1 >= 2 || $hit2 == 1){
                                            $isi['nim'] = $value;
                                            $isi['status'] = '<span class="label label-warning">kuota sudah melebihi kapasitas</span>';
                                            $isi['code'] = 2;
                                        } else {
                                            $isi['nim'] = $value;
                                            $isi['status'] = '<span class="label label-info">terdaftar</span>';
                                            $isi['code'] = 1;
                                        }
                                    } else {
                                        $isi['nim'] = $value;
                                        $isi['status'] = '<span class="label label-danger">tidak terdaftar</span>';
                                        $isi['code'] = 0;
                                    }
                                    $isiData[] = $isi;
                                }
                                    $isiku['ditujukan'] = (string) $_POST['ditujukan'];
                                    $isiku['nama_perusahaan'] = (string) $_POST['nama_perusahaan'];
                                    $isiku['alamat_perusahaan'] = (string) $_POST['alamat'];
                                    $isiku['periode_awal'] = (string) date('d-m-Y', strtotime($_POST['tgl1']));
                                    $isiku['periode_akhir'] = (string) date('d-m-Y', strtotime($_POST['tgl2']));
                                    $isiKet[] = $isiku;

                                    $arrayData = json_encode($isiData);
                                    $arrayKet = json_encode($isiKet);

                                    $dArray = json_decode($arrayData);
                                    $kArray = json_decode($arrayKet);

                                    $count = 0;
                                    foreach($dArray as $value) {
                                        if($value->code == 1){
                                            $count++;
                                        }
                                    }

                                    $temp = '<div class="table-responsive">';
                                    $temp .= '<table class="table table-bordered"><thead><tr><th>Nim</th><th>Status</th></tr></thead><tbody>';
                                    foreach($dArray as $row){
                                        $temp .= '<tr>';
                                        $temp .= '<td>'.$row->nim.'</td>';
                                        $temp .= '<td>'.$row->status.'</td>';
                                        $temp .= '</tr>';
                                    }
                                        $temp .= '<tr>';
                                        $temp .= '<td>Ditujukan</td><td>'.$kArray[0]->ditujukan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Nama Perusahaan</td><td>'.$kArray[0]->nama_perusahaan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alamat Perusahaan/Perihal</td><td>'.$kArray[0]->alamat_perusahaan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Periode Magang</td><td>'.periodeTanggal($kArray[0]->periode_awal,$kArray[0]->periode_akhir,0).'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '</tbody></table></div>';
                                    echo $temp;
                            break;
                            case 'KSURAT003': //sudah
                                $arrNim = [];
                                $arrData = [];
                                if($counter>0){
                                    for($a=0;$a<$counter;$a++){
                                        $arrNim[] = $_POST["nim".$a.""];
                                    }
                                        array_unshift($arrNim,$nim);
                                } else {
                                    $arrNim[] = $nim;
                                }
                                    json_encode($arrNim);

                                foreach($arrNim as $key => $value){
                                    if (array_search($arrNim[$key], array_column($rowMahasiswa, 'nim')) !== false){
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-info">terdaftar</span>';
                                    } else {
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-danger">tidak terdaftar</span>';
                                    }
                                    $isiData[] = $isi;
                                }
                                    $isiku['ditujukan'] = (string) $_POST['ditujukan'];
                                    $isiku['nama_perusahaan'] = (string) $_POST['nama_perusahaan'];
                                    $isiku['alamat_perusahaan'] = (string) $_POST['alamat'];
                                    $isiKet[] = $isiku;

                                    $arrayData = json_encode($isiData);
                                    $arrayKet = json_encode($isiKet);

                                    $dArray = json_decode($arrayData);
                                    $kArray = json_decode($arrayKet);

                                    $count = count($dArray);

                                    $temp = '<div class="table-responsive">';
                                    $temp .= '<table class="table table-bordered"><thead><tr><th>Nim</th><th>Status</th></tr></thead><tbody>';
                                    foreach($dArray as $row){
                                        $temp .= '<tr>';
                                        $temp .= '<td>'.$row->nim.'</td>';
                                        $temp .= '<td>'.$row->status.'</td>';
                                        $temp .= '</tr>';
                                    }
                                        $temp .= '<tr>';
                                        $temp .= '<td>Ditujukan</td><td>'.$kArray[0]->ditujukan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Nama Perusahaan</td><td>'.$kArray[0]->nama_perusahaan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alamat Perusahaan</td><td>'.$kArray[0]->alamat_perusahaan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '</tbody></table></div>';
                                    echo $temp;
                            break;
                            case 'KSURAT004': //sudah
                                $arrNim = [];
                                $arrData = [];
                                if($counter>0){
                                    for($a=0;$a<$counter;$a++){
                                        $arrNim[] = $_POST["nim".$a.""];
                                    }
                                        array_unshift($arrNim,$nim);
                                } else {
                                    $arrNim[] = $nim;
                                }
                                    json_encode($arrNim);

                                foreach($arrNim as $key => $value){
                                    if (array_search($arrNim[$key], array_column($rowMahasiswa, 'nim')) !== false){
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-info">terdaftar</span>';
                                    } else {
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-danger">tidak terdaftar</span>';
                                    }
                                    $isiData[] = $isi;
                                }
                                    $isiku['tempat'] = (string) $_POST['tempat'];
                                    $isiku['tgl_lahir'] = (string) date('d-m-Y', strtotime($_POST['tgl']));
                                    $isiku['alamat'] = (string) $_POST['alamat'];
                                    $isiku['alasan'] = (string) $_POST['alasan'];
                                    $isiKet[] = $isiku;

                                    $arrayData = json_encode($isiData);
                                    $arrayKet = json_encode($isiKet);

                                    $dArray = json_decode($arrayData);
                                    $kArray = json_decode($arrayKet);

                                    $count = count($dArray);

                                    $temp = '<div class="table-responsive">';
                                    $temp .= '<table class="table table-bordered"><thead><tr><th>Nim</th><th>Status</th></tr></thead><tbody>';
                                    foreach($dArray as $row){
                                        $temp .= '<tr>';
                                        $temp .= '<td>'.$row->nim.'</td>';
                                        $temp .= '<td>'.$row->status.'</td>';
                                        $temp .= '</tr>';
                                    }
                                        $temp .= '<tr>';
                                        $temp .= '<td>Tempat, Tgl Lahir</td><td>'.$kArray[0]->tempat.', '.$kArray[0]->tgl_lahir.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alamat</td><td>'.$kArray[0]->alamat.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alasan/Perihal</td><td>'.$kArray[0]->alasan.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '</tbody></table></div>';
                                    echo $temp;
                            break;
                            case 'KSURAT005': //sudah
                                $arrNim = [];
                                $arrData = [];
                                if($counter>0){
                                    for($a=0;$a<$counter;$a++){
                                        $arrNim[] = $_POST["nim".$a.""];
                                    }
                                        array_unshift($arrNim,$nim);
                                } else {
                                    $arrNim[] = $nim;
                                }
                                    json_encode($arrNim);

                                foreach($arrNim as $key => $value){
                                    if (array_search($arrNim[$key], array_column($rowMahasiswa, 'nim')) !== false){
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-info">terdaftar</span>';
                                    } else {
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-danger">tidak terdaftar</span>';
                                    }
                                    $isiData[] = $isi;
                                }
                                    $isiku['alamat'] = (string) $_POST['alamat'];
                                    $isiku['judul_skripsi'] = (string) $_POST['judul'];
                                    $isiKet[] = $isiku;

                                    $arrayData = json_encode($isiData);
                                    $arrayKet = json_encode($isiKet);

                                    $dArray = json_decode($arrayData);
                                    $kArray = json_decode($arrayKet);

                                    $count = count($dArray);

                                    $temp = '<div class="table-responsive">';
                                    $temp .= '<table class="table table-bordered"><thead><tr><th>Nim</th><th>Status</th></tr></thead><tbody>';
                                    foreach($dArray as $row){
                                        $temp .= '<tr>';
                                        $temp .= '<td width="300">'.$row->nim.'</td>';
                                        $temp .= '<td>'.$row->status.'</td>';
                                        $temp .= '</tr>';
                                    }   
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alamat</td><td>'.$kArray[0]->alamat.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Judul Skripsi</td><td>'.$kArray[0]->judul_skripsi.'</td>';
                                        $temp .= '</tr>';
                                        
                                        $temp .= '</tbody></table></div>';
                                    echo $temp;
                            break;
                            default: //sudah
                                $arrNim = [];
                                $arrData = [];
                                if($counter>0){
                                    for($a=0;$a<$counter;$a++){
                                        $arrNim[] = $_POST["nim".$a.""];
                                    }
                                        array_unshift($arrNim,$nim);
                                } else {
                                    $arrNim[] = $nim;
                                }
                                    json_encode($arrNim);

                                foreach($arrNim as $key => $value){
                                    if (array_search($arrNim[$key], array_column($rowMahasiswa, 'nim')) !== false){
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-info">terdaftar</span>';
                                    } else {
                                        $isi['nim'] = $arrNim[$key];
                                        $isi['status'] = '<span class="label label-danger">tidak terdaftar</span>';
                                    }
                                    $isiData[] = $isi;
                                }
                                    $isiku['tempat'] = (string) $_POST['tempat'];
                                    $isiku['tgl_lahir'] = (string) date('d-m-Y', strtotime($_POST['tgl']));
                                    $isiku['alamat'] = (string) $_POST['alamat'];
                                    $isiKet[] = $isiku;

                                    $arrayData = json_encode($isiData);
                                    $arrayKet = json_encode($isiKet);

                                    $dArray = json_decode($arrayData);
                                    $kArray = json_decode($arrayKet);

                                    $count = count($dArray);

                                    $temp = '<div class="table-responsive">';
                                    $temp .= '<table class="table table-bordered"><thead><tr><th>Nim</th><th>Status</th></tr></thead><tbody>';
                                    foreach($dArray as $row){
                                        $temp .= '<tr>';
                                        $temp .= '<td>'.$row->nim.'</td>';
                                        $temp .= '<td>'.$row->status.'</td>';
                                        $temp .= '</tr>';
                                    }
                                        $temp .= '<tr>';
                                        $temp .= '<td>Tempat, Tgl Lahir</td><td>'.$kArray[0]->tempat.', '.$kArray[0]->tgl_lahir.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alamat</td><td>'.$kArray[0]->alamat.'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '</tbody></table></div>';
                                    echo $temp;
                            break;
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="./pdf/cetak.php" method="post" target="_blank" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <textarea style="display:none;" name="arrData"><?= $arrayData ?></textarea>
                    <textarea style="display:none;" name="arrKet"><?= $arrayKet ?></textarea>
                    <?php if ($count > 0){ ?>
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Proses">
                    <?php } else { ?>
                    <a href="?page=surat" class="btn btn-danger btn-block">Kembali</a>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>