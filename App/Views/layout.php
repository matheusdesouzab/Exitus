<?php session_start(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Web-Gest</title>

	<link rel="stylesheet" href="/assets/css/stylesheet.css">
	<link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script defer src="/fontawesome/js/all.js"></script>

</head>

<body>

	<div class="container-fluid" >
		<div class="row">
			<div class="col-lg-2 col-sm-2 sider-painel">
				<?php require '../App/Views/app/componentes/painelLeft.php' ?>
			</div>
			<div id="pagina" class="col-lg-10 col-sm-10  sider-pagina">
				<?php require '../App/Views/app/componentes/navbar.php' ?>
				<?= $this->content() ?>
			</div>
		</div>
	</div>

</body>

<script src="/node_modules/jquery/dist/jquery.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<!-- <script src="/node_modules/chart.js/dist/Chart.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script src="/assets/js/estilo.js"></script>

<script src="/assets/js/ajax.js"></script>



</html>