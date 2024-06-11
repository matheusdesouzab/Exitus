<?php
require __DIR__ . '/../../config/variables.php';
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bem vindo ao Exitus</title>
    <link href="<?= $app_url ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $app_url ?>/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $app_url ?>/assets/css/stylesheet.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="<?= $app_url ?>/assets/img/logo-components/logo.png" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body id="index">

    <div class="container-fluid p-0 area">

       <!-- <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>  -->

        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">
            <a class="navbar-brand" href="#"><img data-aos-duration="2000" data-aos="zoom-in" src="<?= $app_url ?>/assets/img/logo-components/logo-completa-branca.png" alt=""></a>
        </nav>

        <div class="row">

            <p class="text-center text-white col-lg-12 title" data-aos="fade-up" data-aos-duration="2000">Bem vindo ao Exitus, escolha seu tipo de acesso: </p>

            <div class="col-lg-10 mx-auto box">

                <div class="row d-flex justify-content-around">

                    <div class="box-card" data-aos="zoom-in-right" data-aos-duration="3000">
                        <div class="card">
                            <div class="card-title">Admin</div>
                            <div class="card-img mb-3"><img src="<?= $app_url ?>/assets/img/illustrations/admin.svg" alt=""></div>
                            <a href="/admin"><i class="fas fa-sign-in-alt mr-2"></i> Acessar</a>
                        </div>
                    </div>

                    <div class="box-card" data-aos="zoom-out" data-aos-duration="2500">
                        <div class="card">
                            <div class="card-title">Docente</div>
                            <div class="card-img"><img src="<?= $app_url ?>/assets/img/illustrations/teacher.svg" alt=""></div>
                            <a href="/portal-docente"><i class="fas fa-sign-in-alt mr-2"></i> Acessar</a>
                        </div>
                    </div>

                    <div class="box-card" data-aos="zoom-in-left" data-aos-duration="3000">
                        <div class="card">
                            <div class="card-title">Aluno</div>
                            <div class="card-img"><img src="<?= $app_url ?>/assets/img/illustrations/students.svg" alt=""></div>
                            <a href="/portal-aluno"><i class="fas fa-sign-in-alt mr-2"></i> Acessar</a>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="col-lg-12 mx-auto box">

                <div class="d-flex justify-content-center align-items-center">

                    <p>Copyright © 2022 | Todos os Direitos Reservados</p>

                </div>

            </footer>

        </div>

    </div>

</body>

<script src="<?= $app_url ?>/node_modules/jquery/dist/jquery.js"></script>

<script src="<?= $app_url ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="<?= $app_url ?>/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script type="">AOS.init()</script>

</html>