<?php

function tgl_indo($tanggal){
	$bulan = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function durationDate($a,$b){
    $date1 = new DateTime($a);
    $date2 = new DateTime($b);
    $diff = $date1->diff($date2);
    $nil = round(($diff->days/30));
    return $nil;
}

function periodDate($a,$b){
    $bulan = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $split = explode('-', $a);
    $split2 = explode('-', $b);
    $temp = $bulan[(int)$split[1]].' s/d '.$bulan[(int)$split2[1]].' '.date('Y', strtotime($a));
    return $temp;
}