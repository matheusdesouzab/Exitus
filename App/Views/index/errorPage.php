<?php
require __DIR__ . '/../../config/variables.php';
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Página não encontrada </title>
    <link href="<?= $app_url ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $app_url ?>/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $app_url?>/assets/css/stylesheet.css">
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "<?= $app_url?>/assets/img/logo-components/logo.png"/>
</head>

<body id="errorPage">

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="<?= $app_url?>/assets/img/logo-components/logo-completa.png" alt=""></a>
    </nav>

    <div class="container-fluid">

        <div class="row">

           <div class="col-lg-12"><img class="mx-auto d-block mb-4" src="<?= $app_url?>/assets/img/illustrations/page_not_found.svg" alt=""></div> 

            <div class="col-lg-12 text-center"><h1 class="">Página não encontrada</h1></div>

            <p class="text-center col-lg-6 mx-auto col-12">A página que você está tentando acessar não existe, verifique se o endereço do site está correto. Caso o erro persista, entre em contato com a direção da sua escola para que o erro possa ser averiguado.</p>

        </div>

    </div>

</body>

<script src="<?= $app_url ?>/node_modules/jquery/dist/jquery.js"></script>

<script src="<?= $app_url ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="<?= $app_url ?>/node_modules/bootstrap/dist/js/bootstrap.js"></script>

</html>