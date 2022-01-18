<?php

if (!isset($_SESSION)) session_start();

isset($_SESSION['Admin']) ? '' : header('Location: /admin');

?>

<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Exitus - Portal do admin </title>
	<link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/stylesheet.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "/assets/img/logo.png"/>
</head>

<body id="admin">

	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-2 col-md-2 panel-side">
				<?php require '../App/Views/admin/components/painelLeft.php' ?>
			</div>

			<div id="pagina" class="col-12 col-md-10 ml-auto col-sm-12">

				<?php require '../App/Views/admin/components/navbar.php' ?>

				<div class="toast" id="toastContainer">
					<div class="toast-header text-white">
						<strong class="text-center mx-auto toast-data"></strong>
					</div>
				</div>


				<?= $this->content() ?>

				<div class="modal fade modal-profile" id="settingsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">

					<div class="modal-dialog modal-full">
						<div class="modal-content">
							<div class="row">
								<div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#settingsModal">
										<span aria-hidden="true"><i class="fas fa-times-circle text-dark mr-3 mt-2"></i></span>
									</button></div>
							</div>

							<div containerSettingsModal class="modal-body"></div>
						</div>
					</div>
				</div>

				<?php require '../App/Views/admin/components/navbarBottom.php' ?>
	
			</div>
		</div>
	</div>



</body>

<script src="/node_modules/jquery/dist/jquery.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="/node_modules/chart.js/dist/Chart.min.js"></script>

<script src="/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script src="/node_modules/jquery.countdown-2.2.0/jquery.countdown.js"></script>

<script src="/assets/js/utilities/Tools.js"></script>

<script src="/assets/js/utilities/Validation.js"></script>

<script src="/assets/js/utilities/Application.js"></script>

<script src="/assets/js/utilities/Management.js"></script>

<script src="/assets/js/utilities/style.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="/assets/js/utilities/chartJs/config.js"></script> 

<script src="/assets/js/utilities/chartJs/admin.js"></script> 

<script src="https://unpkg.com/jspdf-autotable@3.5.23/dist/jspdf.plugin.autotable.js"></script>

<script src="/assets/js/main.js"></script>


</html>