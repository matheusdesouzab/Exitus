<?php

if (!isset($_SESSION)) session_start();

if (isset($_SESSION['Admin'])) header("Location: /admin/gestao/turmas");
if (isset($_SESSION['Teacher'])) header("Location: /portal-docente/home");
if (isset($_SESSION['Student'])) header("Location: /portal-aluno/home");

?>


<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="/assets/css/stylesheet.css">
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

</head>

<body id="login">

    <div class="container-fluid bg-white" style="height: 100%">

        <div class="row">

            <div class="col-md-11 col-lg-10 mx-auto container-login">

                <div class="row">

                    <div class="col-md-6 sidebar-primary p-4 d-flex align-items-center">

                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-12 logo">
                                    <h5 class='text-white'>Logo do site</h5>
                                </div>

                            </div>

                            <div class="row d-flex justify-content-center">

                                <img class="down-and-up" src="/assets/img/undraw_connection_b-38-q.svg" alt="">

                                <div class="col-lg-12 mt-5">

                                    <div class="row">

                                        <div class="col-md-4">

                                            <div class="col-lg-12 card portal portal-active">

                                                <div class="row d-flex align-items-center">

                                                    <a href="/admin" class="col-lg-12 name-portal text-center text-white"><i class="fas fa-user-cog mr-3"></i> Portal do admin</a>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="col-lg-12 card portal portal-disabled">

                                                <div class="row d-flex align-items-center">

                                                    <a href="/portal-docente" class="col-lg-12 name-portal text-center text-dark"><i class="fas fa-chalkboard-teacher mr-3"></i> Portal do docente</a>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="col-lg-12 card portal portal-disabled">

                                                <div class="row d-flex align-items-center">

                                                    <a href="/portal-aluno" class="col-lg-12 name-portal text-center text-dark"><i class="fas fa-user mr-3"></i> Portal do aluno</a>

                                                </div>

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
                                        <label for="name">Usuário:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                                    </div>

                                    <div class="form-group col-md-10 mx-auto mt-4">
                                        <label for="accessCode">Código de acesso:</label>
                                        <input type="text" class="form-control" maxlength="7" id="accessCode" name="accessCode" placeholder="000.000">
                                    </div>

                                    <div class="form-group col-md-10 mx-auto">
                                        <label for="exampleFormControlInput1">&nbsp;</label>
                                        <button class="w-100 btn">Entrar</button>
                                        <small class="text-center text-secondary d-block mt-3">Esqueceu sua senha?</small>
                                    </div>


                                    <div class="form-group col-md-10 mx-auto">
                                        <?php if(isset($_GET['error'])){ ?>
                                            <small class="text-center text-danger font-weight-bold d-block mt-3"><i class="fas fa-exclamation-circle mr-3"></i> Dados incorretos</small>
                                        <?php } ?>
                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="/node_modules/jquery/dist/jquery.js"></script>

    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script src="/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

    <script src="/assets/js/utilities/Tools.js"></script>

    <script src="/assets/js/utilities/Validation.js"></script>

    <script src="/assets/js/utilities/Application.js"></script>

    <script src="/assets/js/utilities/Management.js"></script>

    <script src="/assets/js/utilities/style.js"></script>

    <script src="/assets/js/main.js"></script>

</body>

</html>