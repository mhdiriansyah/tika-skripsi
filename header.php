<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="index.html"><img src="assets/img/sisuka.png" alt="Klorofil Logo" class="img-responsive logo"></a>
	</div>
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($_SESSION['role'] == 1){ ?>
				<li class="dropdown" id="isinotifikasi">
				<?php } ?>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $photo ?>" class="img-circle" alt="Avatar"> <span><?= $nama ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
					<ul class="dropdown-menu">
						<?php if ($role == 2){ ?>
						<li><a href="?page=profil"><i class="fa fa-user"></i> <span>Profilku</span></a></li>
						<?php } ?>
						<li><a href="?page=logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>