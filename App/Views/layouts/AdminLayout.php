<?php 

if (!isset($_SESSION)) session_start();

isset($_SESSION['Admin']) ? '' : header('Location: /admin');

isset($_SESSION['Teacher']) ? header('Location: /portal-docente/turma') : '';

?>

<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Web Gest </title>	
	<link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/stylesheet.css">
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

				<?php /* require '../App/Views/admin/components/navbarBottom.php' */ ?>

			</div>
		</div>
	</div>



</body>

<script src="/node_modules/jquery/dist/jquery.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="/node_modules/chart.js/dist/Chart.min.js"></script>

<script src="/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script src="/assets/js/utilities/Tools.js"></script>

<script src="/assets/js/utilities/Validation.js"></script>

<script src="/assets/js/utilities/Application.js"></script>

<script src="/assets/js/utilities/Management.js"></script>

<script src="/assets/js/utilities/style.js"></script>


<script src="/assets/js/main.js"></script>


</html>