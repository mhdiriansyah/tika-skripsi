<?php 
    include "lib/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM tbl_suratkonfirmasi
                                JOIN tbl_kategorisurat ON tbl_suratkonfirmasi.id_kategori=tbl_kategorisurat.id_kategori
                                WHERE status_surat=2 AND view_admin=0 
                                GROUP BY kd_suratkonfirmasi 
                                ORDER BY created_at DESC");
    $count = mysqli_num_rows($sql);
?>
<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
    <i class="lnr lnr-alarm"></i>
    <?php 
        if ($count>0){
            echo '<span class="badge bg-danger">'.$count.'</span>';
        }
    ?>
</a>
<ul class="dropdown-menu notifications">
    <?php 
        if ($count==0){
        echo '<li><a class="notification-item">belum ada notifikasi</a></li>';  
        }
    ?>
    <?php while($data = mysqli_fetch_array($sql)){ ?>
    <li><a href="?page=listsuratlihat&id=<?= $data['kd_suratkonfirmasi'] ?>" class="notification-item"><span class="badge bg-warning">new</span> Pengajuan <?= $data['nama'] ?> Baru</a></li>
    <?php } ?>
</ul>