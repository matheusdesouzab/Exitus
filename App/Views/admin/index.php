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

<body id="login">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-10 mx-auto container-login">

                <div class="row">

                    <div class="col-lg-5 sidebar-primary p-4">

                        <div class="row">

                            <h5 class="col-lg-12 text-white">Portal do Administrador</h5>

                        </div>

                    </div>

                    <div class="col-lg-7 sidebar-secondary">

                        <div class="row">

                            <form id="adminLogin" class="col-lg-9 mx-auto" action="/admin/login" method="POST">

                                <div class="form-row mt-2 form-body">

                                    <div class="form-group col-lg-10 mx-auto">
                                        <label for="name">Nome completo:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-10 mx-auto mt-4">
                                        <label for="accessCode">Código de acesso:</label>
                                        <input type="text" class="form-control" maxlength="7" id="accessCode" name="accessCode" placeholder="000.000">
                                    </div>

                                    <div class="form-group col-lg-10 mx-auto">
                                        <label for="exampleFormControlInput1">&nbsp;</label>
                                        <button class="w-100 btn">Entrar</button>
                                        <small class="text-center text-info d-block mt-3 font-weight-bold">Esqueceu a senha?</small>
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