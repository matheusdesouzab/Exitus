<?php session_start(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Web-Gest</title>

	<link rel="stylesheet" href="/assets/css/stylesheet.css">
	<link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-sm-2 side-painel">
				<?php require '../App/Views/adm/componentes/painelLeft.php' ?>
			</div>
			<div id="pagina" class="col-lg-10 col-sm-10 side-pagina">
				<?php require '../App/Views/adm/componentes/navbar.php' ?>
				<?= $this->content() ?>
			</div>
		</div>
	</div>

</body>

<script src="/node_modules/jquery/dist/jquery.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="/node_modules/chart.js/dist/Chart.min.js"></script>

<script src="/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script src="/assets/js/estilo.js"></script>

<script src="/assets/js/ajax.js"></script>

</html>