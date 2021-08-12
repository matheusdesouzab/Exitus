<?php if (!isset($_SESSION)) session_start(); ?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Web Gest </title>
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/stylesheet.css">
</head>

<body id="studentPortal">

    <div class="container-fluid">

        <div id="pagina" class="row">

            <nav id="studentPortalNavbar" class="navbar navbar-expand-lg col-lg-12 d-flex justify-content-between">

                <b class="navbar-brand" href="#"><?= $_SESSION['Student']['class'] ?></b>

                <div class="navbar-nav d-flex justify-content-center" style="margin-left:-18vw">
                    <a class="nav-link active" href="/portal-aluno/sair">Mural</a>
                    <a class="nav-link" href="#">Boletim</a>
                    <a class="nav-link" href="#">Ranking</a>
                </div>

                <img class="" src="/assets/img/studentProfilePhotos/<?= $_SESSION['Student']['profilePhoto'] ?>" alt="" onerror="/assets/img/studentProfilePhotos/foto-vazia.jpg">

            </nav>

            <div class="col-lg-12">

                <div class="row mt-3">

                    <div class="col-lg-10 mx-auto card">

                    

                    </div>

                </div>

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