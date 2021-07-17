<nav id="navbar-top" class="navbar fixed-top col-12 col-lg-10 col-sm-12 col-md-9 ml-auto shadow-sm navbar-expand-sm">

	<a class="navbar-brand" id="bars" href="#"><i class="fas fa-bars"></i></a>
	<a class="navbar-brand bars-xs" href="#"><i class="fas fa-bars"></i></a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav ml-auto">

			<li class="nav-item">
				<div class="">
					<img src="/assets/img/teacherProfilePhotos/<?= $_SESSION['Admin']['profilePhoto'] ?>" alt="" onerror="/assets/img/teacherProfilePhotos/foto-vazia.jpg">
				</div>

			</li>
		</ul>
	</div>
</nav>