<nav id="navbar-top" class="navbar fixed-top col-12 col-lg-10 col-sm-12 col-md-9 ml-auto shadow-sm navbar-expand-sm">

	<a class="navbar-brand" id="bars" href="#"><i class="fas fa-bars"></i></a>
	<a class="navbar-brand bars-xs" href="#"><i class="fas fa-bars"></i></a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars"></i>
	</button>


	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav ml-auto">

			<li class="nav-item">
				<div class="foto-usuario">
					<img src="/assets/img/foto-perfil-1.png" alt="">
				</div>

			</li>

			<?php session_start() ?>

			<li class="nav-item dropdown mr-5">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?= $_SESSION['teacher_name'] ?>
				</a>
				<?php session_abort() ?>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Configurações</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Encerra sessão</a>
				</div>
			</li>
		</ul>
	</div>
</nav>