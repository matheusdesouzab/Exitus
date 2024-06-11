<?php 

require __DIR__ . '../../../../config/variables.php';

?>

<nav id="navbar-top" class="navbar fixed-top col-12 col-lg-10 col-sm-12 col-md-10 ml-auto shadow-sm navbar-expand">

	<a class="navbar-brand" id="bars" href="#" data-toggle="tooltip" data-placement="right" title="Explandir"><i class="fas fa-bars"></i></a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars"></i>
	</button>

	<a class="logo" href=""><img id="logo-exitus" src="<?= $app_url ?>/assets/img/logo-components/logo-completa.png" alt=""></a>


	<div class="collapse navbar-collapse" id="navbarText">

		<ul class="navbar-nav ml-auto d-flex align-items-center">

		<?php $photo = ($_SESSION['Teacher']['profilePhoto'] ? $_SESSION['Teacher']['profilePhoto'] : 'foto-vazia.jpg') ?>

			<li class="nav-item d-none d-md-block">			
				<img class="foto-perfil m-auto" src="<?= $app_url ?>/assets/img/teacherProfilePhotos/<?= $photo ?>" alt="">
			</li>

			<li class="nav-item ml-3 d-none d-md-block">
				<b><?= $_SESSION['Teacher']['name'] ?></b>
			</li>

			<li class="nav-item ml-4 mr-2 d-none d-md-block">
				<a href="/portal-docente/sair" data-toggle="tooltip" data-placement="bottom" title="Sair da conta"><i class="fas fa-sign-out-alt"></i></a>
			</li>

		</ul>
	</div>
</nav>