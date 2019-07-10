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

function getStatus($params){
    switch ($params) {
        case 1:
            $nil = '<span class="label label-warning">sedang diproses</span>';
            break;
        case 2:
            $nil = '<span class="label label-info">sudah dicetak menunggu konfirmasi</span>';
            break;
        default:
            $nil = '<span class="label label-success">selesai diproses</span>';
            break;
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
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


?>