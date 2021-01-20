




    <div class="login container p-0 " style="margin-top: 50px;">

        <div class="col-lg-11 border-0 col-md-10 mx-auto">
            <div class="row border-0  linhapai">
                <div class="setorA col-lg-5" style="padding:0px;border-radius:15px;border-top-right-radius: 30px;">

                    <div class="row">
                        <div class="col-lg-12 p-3 ml-3">
                            <h5 class="text-white">WebGest <b>Admin</b></h5>
                        </div>
                    </div>

                    <!--  <div class="row border border-danger">
                    <div class="col-lg-12"><img class="d-block mx-auto" src="../img/vetor2.png" style="width: 100%;height:350px"></div>
                </div>  -->

                    <!--     -->

                </div>
                <div class="col-lg-7   setorB " style="background:#fff;border-radius:15px;">
                    <div class=" p-4   col-lg-8 mx-auto text-dark bg-white" style="border-radius: 15px">
                        <div class="linha-xs  row">
                            <div class="col-lg-12 p-2 ml-3">
                                <h5 class="text-primary">WebGest <b>Admin</b></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-2">Login</h5>
                            <p class="card-text">
                                <form class="" method="POST" action="/autenticar">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="email">Email</label>
                                            <input name="email" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="email">Senha</label>
                                            <input name="senha" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-row mt-2">
                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-primary w-100 text-white font-weight-bold">Iniciar</button>
                                            <?php if ((isset($_GET['login'])) && ($_GET['login'] == 'restrita')){ ?>
                                                <div class="small text-center text-info font-weight-bold mt-3">Página restrita</div>
                                            <?php } ?>
                                            <?php if ((isset($_GET['login'])) && ($_GET['login'] == 'erro')) { ?>
                                                <div class="small text-center text-info font-weight-bold mt-3">Dados incorretos</div>
                                            <?php } ?>
                                        </div>
                                    </div>


                                </form>



                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    <div id="rodape">

        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>

    </div>




