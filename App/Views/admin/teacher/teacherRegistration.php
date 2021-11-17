<section id="teacher-registration">

    <div class="row main-container">

        <h5 class="col-11 mx-auto mb-4 mt-3 p-0">Cadastrar docente</h5>

        <div class="card col-lg-11 col-11 mx-auto mb-4" id="teacher-record-accordion">

            <div class="registration-in-stages mb-2 accordion">

                <div class="registration-header-by-step mt-2">

                    <div class="row">

                        <div class="connection-line"></div>

                        <div class="container-option">

                            <a type="button" class="" data-toggle="collapse" data-target="#teacher-registration-initial-data"><span>1</span></a>

                            <p>Dados pessoais</p>

                        </div>

                        <div class="container-option">

                            <a type="button" class="collapsed" data-toggle="collapse" data-target="#teacher-registration-address-and-others"><span>2</span></a>

                            <p>Localidade e outros</p>

                        </div>

                        <div class="container-option">

                            <a type="button" class="collapsed" data-toggle="collapse" data-target="#teacher-registration-finishing"><span>3</span></a>

                            <p>Finalizando</p>

                        </div>

                    </div>

                </div>

                <form class="mt-3" id="addTeacher" role="form" enctype="multipart/form-data" method="POST">

                    <div class="row collapse show" id="teacher-registration-initial-data" data-parent="#teacher-record-accordion">
                        <div class="col-lg-11 mx-auto">
                            <div class="col-md-12">
                                <div class="form-row mt-2">

                                    <div class="form-group col-md-5">
                                        <label for="name">Nome Completo:</label>
                                        <input id="name" name="name" type="text" class="form-control" maxlength="120" placeholder="" maxlength="120" required>
                                    </div>

                                    <div id="cpfField" class="form-group col-md-4">
                                        <label for="cpf">CPF:</label>
                                        <input type="text" id="cpf" value="" minlength="14" name="cpf" class="form-control" placeholder="" required>
                                    </div>

                                    <div class="form-group col-md-3">

                                        <label for="sex">Sexo:</label>

                                        <select id="sex" name="sex" class="form-control is-valid custom-select">

                                            <?php foreach ($this->view->availableSex as $key => $sex) { ?>

                                                <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="birthDate">Data Nascimento:</label>
                                        <input name="birthDate" id="birthDate" type="date" class="form-control"  placeholder="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="naturalness">Naturalidade:</label>
                                        <input name="naturalness" name="naturalness" type="text" class="form-control" id="naturalness" placeholder="" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="nationality">Nacionalidade:</label>
                                        <input type="text" name="nationality" id="nationality" value="" class="form-control" id="nationality" placeholder="" required>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">

                                        <label for="bloodType">Tipo sanguíneo:</label>

                                        <select id="bloodType" name="bloodType" class="form-control custom-select is-valid">

                                            <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>

                                                <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div id="photoField" class="form-group col-md-8">
                                        <label for="">&nbsp;</label>
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input form-control" name="profilePhoto" id="profilePhoto">
                                            <label class="custom-file-label" for="profilePhoto" data-browse="Arquivo">Selecionar uma foto para o perfil do professor</label>

                                        </div>
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="">&nbsp;</label>
                                        <a type="button" class="btn btn-success w-100 p-2" data-toggle="modal" data-target="#profilePhotoModal">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-lg-12 d-flex justify-content-end">
                                        <a type="button" data-toggle="collapse" data-target="#teacher-registration-address-and-others" class="btn text-white mt-2 collapsed" href="">Proximo <i class="fas fa-angle-right"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row collapse" id="teacher-registration-address-and-others" data-parent="#teacher-record-accordion">
                        <div class="col-lg-10 mx-auto">
                            <div class="col-md-12">

                                <div class="form-row mt-3">

                                    <div id="zipCodeField" class="form-group col-md-3">
                                        <label for="zipCode">CEP:</label>
                                        <input type="text" id="zipCode" value="" class="form-control" name="zipCode" minlength="9" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="county">Munícipio:</label>
                                        <input type="text" id="county" class="form-control" name="county" required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="district">Bairro:</label>
                                        <input type="text" id="district" class="form-control" name="district" placeholder="" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="uf">UF:</label>
                                        <input type="text" id="uf" name="uf" class="form-control" required placeholder="Sigla" maxlength="2">
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-5">
                                        <label for="address">Endereço:</label>
                                        <input type="text" id="address" name="address" class="form-control" id="address" placeholder="" required>
                                    </div>

                                    <div id="telephoneField" class="form-group col-md-4">
                                        <label for="telephoneNumber">Contato:</label>
                                        <input type="tel" id="telephoneNumber" value="" class="form-control" name="telephoneNumber" placeholder="(00) 00000-0000" required>
                                    </div>

                                    <div class="form-group col-md-3">

                                        <label for="pcd">PcD:</label>

                                        <select id="pcd" name="pcd" class="form-control custom-select is-valid">

                                            <?php foreach ($this->view->pcd as $key => $pcd) { ?>

                                                <option value="<?= $pcd->option_value ?>"><?= $pcd->option_text ?></option>
                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="form-row">

                                    <div id="emailField" class="form-group col-md-12">
                                        <label for="email">Email do docente:</label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="" required>
                                    </div>

                                </div>

                                <div class="form-row d-flex justify-content-end">

                                    <div class="form-group mr-2">
                                        <a type="button" data-toggle="collapse" data-target="#teacher-registration-initial-data" class="btn bg-secondary text-white mt-2 collapsed" href=""><i class="fas fa-angle-left mr-3"></i> Voltar</a>
                                    </div>

                                    <div class="form-group">
                                        <a type="button" class="collapsed btn text-white mt-2 collapsed" data-toggle="collapse" data-target="#teacher-registration-finishing" href="">Proximo <i class="fas fa-angle-right ml-3"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row collapse" id="teacher-registration-finishing" data-parent="#teacher-record-accordion">

                        <div class="col-lg-10 col-11 mx-auto">

                            <div class="row">

                                <h5 class="mt-2 col-lg-12 col-11 mx-auto p-0">Finalizando o cadastro <span givenName></span></h5>

                                <div class="col-lg-12 col-11 mx-auto">

                                    <div class="row">

                                        <div containerRegistrationSuccess class="col-lg-12">

                                            <div class="row">

                                                <p class="col-lg-12 mb-4 p-0">Todos os campos foram preenchidos de forma correta <i class="fas text-success fa-check-circle ml-2"></i></p>

                                                <p class="col-lg-12 p-0 font-weight-bold"><i class="fas text-info fa-info-circle mr-2"></i> Informe ao professor seu código de acesso ao portal</p>

                                                <p accessCode class="card col-lg-5 mx-auto font-weight-bold text-center mt-4 mb-3"></p>

                                            </div>

                                        </div>

                                        <div containerRegistrationError class="col-lg-12 p-0">

                                            <p class="col-lg-12 mb-4 p-0">Verifique se todos os campos foram preenchidos de forma correta <i class="fas text-info fa-info-circle mr-2"></i></p>

                                        </div>

                                    </div>


                                </div>

                                <input type="hidden" name="accessCode" id="accessCode" value="">

                                <div class="col-lg-12 col-11 mx-auto p-0">

                                    <div class="row d-flex justify-content-between">

                                        <a type="button" data-toggle="collapse" data-target="#teacher-registration-address-and-others" class="btn bg-secondary text-white collapsed ml-3" href=""><i class="fas fa-angle-left mr-3"></i> Voltar</a>

                                        <button id="buttonAddTeacher" disabled class="btn btn-success">Cadastrar docente</button>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
            </div>

            <div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profilePhotoModal">Foto selecionada</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-img col-lg-12 d-flex justify-content-center"><img alt="Selecione uma foto" class="mx-auto rounded-circle" src="" id="visualizarimagem" style="width:300px; height: 300px; object-position:top; object-fit: cover;"></div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar ao cadastro</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>

    </div>

</section>