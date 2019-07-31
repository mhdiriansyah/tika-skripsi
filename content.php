<?php 
if (isset($_GET['page'])) $page=$_GET['page'];
else $page="beranda";

if ($page == "beranda")                 include("page/beranda.php");
elseif ($page == "logout")              include("page/logout.php");

    // -------------------------- kategori --------------------------
    elseif ($page == "kategori")                     include("page/kategori/kategori.php");
    elseif ($page == "kategoritambah")               include("page/kategori/kategoritambah.php");
    elseif ($page == "kategoritambahpro")            include("page/kategori/kategoritambahpro.php");
    elseif ($page == "kategoriedit")                 include("page/kategori/kategoriedit.php");
    elseif ($page == "kategorieditpro")              include("page/kategori/kategorieditpro.php");
    elseif ($page == "kategorihapus")                include("page/kategori/kategorihapus.php");

    // -------------------------- mahasiswa --------------------------
    elseif ($page == "mahasiswa")                    include("page/mahasiswa/mahasiswa.php");
    elseif ($page == "mahasiswatambah")              include("page/mahasiswa/mahasiswatambah.php");
    elseif ($page == "mahasiswatambahpro")           include("page/mahasiswa/mahasiswatambahpro.php");
    elseif ($page == "mahasiswaedit")                include("page/mahasiswa/mahasiswaedit.php");
    elseif ($page == "mahasiswaeditpro")             include("page/mahasiswa/mahasiswaeditpro.php");
    elseif ($page == "mahasiswahapus")               include("page/mahasiswa/mahasiswahapus.php");

    // -------------------------- persetujuan surat --------------------------
    elseif ($page == "persetujuansurat")             include("page/persetujuansurat/persetujuansurat.php");
    elseif ($page == "persetujuansurattambah")       include("page/persetujuansurat/persetujuansurattambah.php");
    elseif ($page == "persetujuansurattambahpro")    include("page/persetujuansurat/persetujuansurattambahpro.php");
    elseif ($page == "persetujuansuratedit")         include("page/persetujuansurat/persetujuansuratedit.php");
    elseif ($page == "persetujuansurateditpro")      include("page/persetujuansurat/persetujuansurateditpro.php");
    elseif ($page == "persetujuansurathapus")        include("page/persetujuansurat/persetujuansurathapus.php");
    elseif ($page == "persetujuanupload")            include("page/persetujuansurat/persetujuanupload.php");

    // -------------------------- list surat --------------------------
    elseif ($page == "listsurat")                    include("page/listsurat/listsurat.php");
    elseif ($page == "listsuratlihat")               include("page/listsurat/listsuratlihat.php");
    elseif ($page == "listsuratacc")                 include("page/listsurat/listsuratacc.php");
    elseif ($page == "listsurattolak")               include("page/listsurat/listsurattolak.php");
    elseif ($page == "listsuratmhs")                 include("page/listsurat/listsuratmhs.php");
    elseif ($page == "listsurataccperusahaan")       include("page/listsurat/listsurataccperusahaan.php");

    // -------------------------- surat --------------------------
    elseif ($page == "surat")                        include("page/surat/surat.php");
    elseif ($page == "surattambah")                  include("page/surat/surattambah.php");
    elseif ($page == "surattambahpro")               include("page/surat/surattambahpro.php");
    elseif ($page == "suratedit")                    include("page/surat/suratedit.php");
    elseif ($page == "surateditpro")                 include("page/surat/surateditpro.php");
    elseif ($page == "surathapus")                   include("page/surat/surathapus.php");
    elseif ($page == "suratSKL")                     include("page/surat/suratSKL.php");
    elseif ($page == "suratSKK")                     include("page/surat/suratSKK.php");
    elseif ($page == "suratSR")                      include("page/surat/suratSR.php");
    elseif ($page == "suratSRK")                     include("page/surat/suratSRK.php");
    elseif ($page == "suratSM")                      include("page/surat/suratSM.php");
    elseif ($page == "suratkonfirmasi")              include("page/surat/suratkonfirmasi.php");

    // -------------------------- profil --------------------------
    elseif ($page == "profil")                       include("page/profil/profil.php");
    elseif ($page == "profiledit")                   include("page/profil/profiledit.php");

    // -------------------------- report --------------------------
    elseif ($page == "report")                       include("page/report/report.php");


    else "Halaman tidak ditemukan";
?>