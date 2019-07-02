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
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <i class="fa fa-info-circle"></i> Periksa kembali data-data dibawah ini. Jika ada <strong>NIM</strong> yang berstatus <strong>tidak terdaftar</strong>, akan secara otomatis tidak tertera pada surat yang diajukan.
                    Jika data sudah sesuai silahkan klik button proses :) 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if (isset($_POST['submit'])){
                        
                        $id = $_POST['id'];
                        $nim = $_POST['nim'];
                        $counter = $_POST['counter'];

                        switch($id){
                            case 'KSURAT002':
                                $arrNim = [];
                                if($counter>0){
                                    for($a=0;$a<$counter;$a++){
                                        $arrNim[] = $_POST["nim".$a.""];
                                    }
                                        array_unshift($arrNim,$nim);
                                } else {
                                    $arrNim[] = $nim;
                                }
                                    json_encode($arrNim);

                                    $temp = '<div class="table-responsive">';
                                    $temp .= '<table class="table table-bordered"><thead><tr>';
                                    $temp .= '<th>Nim</th><th>Status</th></tr></thead><tbody>';
                                    foreach($arrNim as $key => $value){
                                        $temp .= '<tr>';
                                        if (array_search($arrNim[$key], array_column($rowMahasiswa,'nim')) !== false){
                                            $temp .= '<td>'.$arrNim[$key].'</td>';
                                            $temp .= '<td><span class="label label-info">terdaftar</span></td>';                                            
                                        } else {
                                            $temp .= '<td>'.$arrNim[$key].'</td>';
                                            $temp .= '<td><span class="label label-danger">tidak terdaftar</span></td>';
                                        }
                                        $temp .= '</tr>';
                                    }
                                        $temp .= '<tr>';
                                        $temp .= '<td>Ditujukan Kepada</td><td>'.$_POST['ditujukan'].'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Perusahaan</td><td>'.$_POST['nama_perusahaan'].'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Alamat</td><td>'.$_POST['alamat'].'</td>';
                                        $temp .= '</tr>';
                                        $temp .= '<tr>';
                                        $temp .= '<td>Periode Magang</td><td>'.periodeTanggal($_POST['tgl1'],$_POST['tgl2']).'</td>';
                                        $temp .= '</tr>';
                                    $temp .= '</tbody></table></div>';
                                    echo $temp;
                            break;
                            case 'KSURAT003':
                                echo "KSURAT003";
                            break;
                            case 'KSURAT004':
                                echo "KSURAT004";
                            break;
                            case 'KSURAT005':
                                echo "KSURAT005";
                            break;
                            default:
                                echo "KSURAT002";
                            break;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>