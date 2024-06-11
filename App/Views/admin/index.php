<?php

if (!isset($_SESSION)) session_start();

if (isset($_SESSION['Admin'])) header("Location: /admin/home");
if (isset($_SESSION['Teacher'])) header("Location: /portal-docente/home");
if (isset($_SESSION['Student'])) header("Location: /portal-aluno/home");

require __DIR__ . '/../../config/variables.php';
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Portal do admin</title>
    <link rel="shortcut icon" type="imagem/x-icon" href="<?= $app_url ?>/assets/img/logo.png" />
    <link rel="stylesheet" href="<?= $app_url ?>/assets/css/stylesheet.css">
    <link href="<?= $app_url ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $app_url ?>/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="imagem/x-icon" href="<?= $app_url ?>/assets/img/logo-components/logo.png" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body id="login">

    <div class="container-fluid" style="height: 100%">

        <div class="row">

            <div class="col-md-11 col-lg-10 mx-auto container-login">

                <div class="row">

                    <div class="col-md-6 sidebar-primary p-4 d-flex align-items-center">

                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-12 logo">
                                    <img src="<?= $app_url ?>/assets/img/logo-components/logo-completa.png" alt="">
                                </div>

                            </div>

                            <div class="row d-flex justify-content-center">

                                <img class="down-and-up" src="<?= $app_url ?>/assets/img/illustrations/admin.svg" alt="">

                                <div class="col-lg-12 mt-5">

                                    <div class="row">

                                        <div class="col-md-4">

                                            <div class="col-lg-12 portal portal-active text-white p-0 text-center">

                                                <a class="text-white btn p-2" href="/admin"><i class="fas fa-user-cog mr-3"></i> Portal do admin</a>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="col-lg-12 portal portal-disabled p-0 text-center">

                                                <a class="text-dark btn p-2" href="/portal-docente"><i class="fas fa-chalkboard-teacher mr-3"></i> Portal do docente</a>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="col-lg-12 portal portal-disabled p-0 text-center">

                                                <a class="text-dark btn p-2" href="/portal-aluno"><i class="fas fa-user mr-3"></i> Portal do aluno</a>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6 col-sm-12 sidebar-secondary d-flex align-items-center justify-content-center">

                        <div class="row">

                            <form id="adminLogin" class="col-sm-10 col-11 col-md-9 mx-auto" action="/admin/login" method="POST">

                                <div class="form-row mt-2 form-body">

                                    <div class="form-group col-md-10 mx-auto mt-3">
                                        <label for="name">Nome do usuário:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-white">
                                                <div class="input-group-text bg-white"><i class='fas fa-user'></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-10 mx-auto mt-4">
                                        <label for="accessCode">Código de acesso:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-white">
                                                <div class="input-group-text bg-white input-group-accessCode"><i class="fas fa-eye-slash"></i></div>
                                            </div>
                                            <input type="password" class="form-control" maxlength="30" id="accessCode" name="accessCode" placeholder="Código de acesso">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-10 mx-auto">
                                        <label for="exampleFormControlInput1">&nbsp;</label>
                                        <button class="w-100 btn">Entrar</button>
                                        <small class="text-center text-secondary d-block mt-3"></small>
                                    </div>


                                    <div class="form-group col-md-10 mx-auto">
                                        <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-warning text-center" role="alert">
                                                <i class="fas fa-exclamation-triangle mr-3"></i> <?= ucfirst(str_replace('-', ' ', $_GET['error'])) ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-lg-12 d-block d-sm-none">

                                        <div class="row">

                                            <div class="col-4">

                                                <div class="col-lg-12 portal portal-active p-0 text-center">

                                                    <a class="text-white btn p-2 w-100" href="/admin">Admin</a>

                                                </div>

                                            </div>

                                            <div class="col-4">

                                                <div class="col-lg-12 portal portal-disabled p-0 text-center">

                                                    <a class="text-dark btn p-2 w-100 border border-info" href="/portal-docente">Docente</a>

                                                </div>

                                            </div>

                                            <div class="col-4">

                                                <div class="col-lg-12 portal portal-disabled p-0 text-center">

                                                    <a class="text-dark w-100 btn p-2 border border-info" href="/portal-aluno">Aluno</a>

                                                </div>


                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</body>



<script src="<?= $app_url ?>/node_modules/jquery/dist/jquery.js"></script>

<script src="<?= $app_url ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="<?= $app_url ?>/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="<?= $app_url ?>/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script src="<?= $app_url ?>/assets/js/utilities/Tools.js"></script>

<script src="<?= $app_url ?>/assets/js/utilities/Validation.js"></script>

<script src="<?= $app_url ?>/assets/js/utilities/Application.js"></script>

<script src="<?= $app_url ?>/assets/js/utilities/Management.js"></script>

<script src="<?= $app_url ?>/assets/js/utilities/style.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="<?= $app_url ?>/assets/js/main.js"></script>

</html>