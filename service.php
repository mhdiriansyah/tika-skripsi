<?php

//get user data when login ---------------
$user       = $_SESSION['username'];
$password   = $_SESSION['password'];
$role       = $_SESSION['role'];
if ($role == 1){
    $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$user'");
    $datauser = mysqli_fetch_array($sql); 
    $nama = $datauser['username'];
    $photo = 'assets/img/admin.png';
} else {
    $sql = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$user'");
    $datauser = mysqli_fetch_array($sql);
    $nama = $datauser['nama_lengkap'];
    $photo = 'assets/img/no-photo.png';
}

$rowMahasiswa = [];
$q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
while($data=mysqli_fetch_array($q)){
    $isi['nim'] = $data['nim'];
    $rowMahasiswa[] = $isi;
}
    json_encode($rowMahasiswa);

function getStatus($id,$params){
    if ($id == 'KSURAT002'){
        switch ($params) {
            case 1:
                $nil = '<span class="label label-info"><i class="fa fa-check"></i> telah di acc jurusan</span>';
                break;
            case 2:
                $nil = '<span class="label label-warning"><i class="fa fa-spinner fa-pulse"></i> diproses</span>';
                break;
            case 3:
                $nil = '<span class="label label-primary"><i class="fa fa-check"></i> sudah di acc perusahaan</span><br>'.
                        '<span class="label label-success"><i class="fa fa-check"></i> sudah dapat diambil</span>';
            break;
            default:
                $nil = '<span class="label label-danger"><i class="fa fa-remove"></i> ditolak</span>';
                break;
        }
    } else {
        switch ($params) {
            case 1:
                $nil = '<span class="label label-success"><i class="fa fa-check"></i> sudah dapat diambil</span>';
                break;
            case 2:
                $nil = '<span class="label label-warning"><i class="fa fa-spinner fa-pulse"></i> diproses</span>';
                break;
            default:
                $nil = '<span class="label label-danger"><i class="fa fa-remove"></i> ditolak</span>';
                break;
        }
    }
    return $nil;
}

function keteranganSurat($params){
    if(!empty($params)){
        $temp = $params;
    } else {
        $temp = '<span class="label label-warning">belum ada keterangan</span>';
    }
    return $temp;
}

function getFileSurat($params){
    if(!empty($params)){
        $temp = '<a class="btn btn-info btn-block" href="file/surat/'.$params.'" target="_blank" title="lihat file">'.$params.'</a><br>';
        $temp .= '<embed src="file/surat/'.$params.'" type="application/pdf"   height="300px" width="100%">';
    } else {
        $temp = '<span class="label label-warning">belum ada file</span>';
    }
    return $temp;
}

function getFile($params){
    if(!empty($params)){
        $temp = '<a class="btn btn-info btn-block" href="file/'.$params.'" target="_blank" title="lihat file">'.$params.'</a><br>';
        $temp .= '<embed src="file/'.$params.'" type="application/pdf"   height="300px" width="100%">';
    } else {
        $temp = '<span class="label label-warning">belum ada file</span>';
    }
    return $temp;
}

function periodeTanggal($a,$b,$c){
    switch($c){
        case 1;
            if(!empty($a) && !empty($b)){
                $temp = date('d M Y',strtotime($a)).' sampai '.date('d M Y',strtotime($b));
            } else {
                $temp = 'tidak ada tanggal';
            }
        break;
        default:
            if(!empty($a) && !empty($b)){
                $temp = date('d M Y',strtotime($a)).' s/d '.date('d M Y',strtotime($b));
            } else {
                $temp = 'tidak ada tanggal';
            }
        break;
    }
    return $temp;
}

function tanggal_indo($tanggal){
	$bulan = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$split = explode('-', $tanggal);
	return $split[2].' '.$bulan[(int)$split[1]].' '.$split[0];
}

function jumSuratPengajuan($params){
    include 'lib/koneksi.php';
    $count = 0;
    $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi");
    while($data=mysqli_fetch_array($q)){
        if (in_array($params, json_decode($data['data']))){
            $count++;
        }
    }
    if ($count > 0){
        $nil = '<span class="label label-success">'.$count.' surat pengajuan</span>';
    } else {
        $nil = '<span class="label label-danger">belum ada</span>';
    }
    return $nil;
}

function jumSurat($params){
    include 'lib/koneksi.php';
    $count = 0;
    $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi");
    while($data=mysqli_fetch_array($q)){
        if (in_array($params, json_decode($data['data']))){
            $count++;
        }
    }
    return $count;
}

function jumMhsSurat($id,$params){
    include 'lib/koneksi.php';
    $count = 0;
    $q = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi WHERE id_kategori='$id'");
    while($data=mysqli_fetch_array($q)){
        if (in_array($params, json_decode($data['data']))){
            $count++;
        }
    }
    return $count;
}

function reminderChangePassword($role, $nim){
    include "lib/koneksi.php";
    $temp = '';
    if ($role == 2){
        $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'");
        $data = mysqli_fetch_array($q);
        if (strcmp($nim,$data['password']) == 0){
            $temp = '<div class="alert alert-danger alert-dismissible" role="alert">'.
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                        '<i class="fa fa-info-circle"></i> Untuk prosedur keamanan, segera lalukan perubahan <strong>Password</strong> anda pada menu <a href="?page=profil">profilku</a>'.
                    '</div>';
        }
    }
    return $temp;
}


?>