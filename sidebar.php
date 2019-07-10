<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="?page=beranda" class=""><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-file"></i> <span>Manajemen</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <?php if ($role == 1) { ?>
                            <li><a href="?page=mahasiswa" class="">Data Mahasiswa</a></li>
                            <li><a href="?page=kategori" class="">Kategori Surat</a></li>
                            <li><a href="?page=listsurat" class="">Persetujuan Surat</a></li>
                            <?php } else { ?>
                            <li><a href="?page=surat" class="">Surat Ku</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>