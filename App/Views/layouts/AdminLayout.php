<?php

/* $url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], '/') + 1);

$title = preg_split('/(?=[A-Z])/', $url);

$title = count($title) >= 2 ? $title[1] . ' ' . $title[2] : $title; */

?>

<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Web Gest </title>

	<link rel="stylesheet" href="/assets/css/stylesheet.css">
	<link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
	<link href="/node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body id="admin">

	<div class="container-fluid">

		<div class="row">

			<div class="col-lg-2 col-md-3 col-sm-2 panel-side">
				<?php require '../App/Views/admin/components/painelLeft.php' ?>
			</div>

			<div id="pagina" class="col-12 col-md-9 col-lg-10 col-sm-12">

				<?php require '../App/Views/admin/components/navbar.php' ?>

				<div class="toast" id="toastContainer">
					<div class="toast-header text-white">
						<strong class="text-center mx-auto toast-data"></strong>
					</div>
				</div>


				<?= $this->content() ?>

				<?php require '../App/Views/admin/components/navbarBottom.php' ?>

			</div>
		</div>
	</div>



</body>

<script src="/node_modules/jquery/dist/jquery.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="/node_modules/chart.js/dist/Chart.min.js"></script>

<script src="/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script src="/assets/js/request.js"></script>

<script src="/assets/js/Validation.js"></script>

<script src="/assets/js/style.js"></script>

<script src="/assets/js/main.js"></script>

</html>