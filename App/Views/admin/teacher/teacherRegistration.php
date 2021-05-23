<div id="teacher-registration">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <div class="col-lg-12 mb-4">
                <h5>Cadastrar professor(a)</h5>
            </div>

            <div class="col-lg-12">

                <div class="card col-lg-12 pt-4 p-3 accordion" id="teacher-registration-accordion">

                    <div class="registration-session-in-stages mx-auto">
                        <div class="registration-by-content-step">
                            <div class="registration-connection-line-in-stages"></div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button" data-toggle="collapse" data-target="#teacher-registration-initial-data"><i class="fas fa-user-alt"></i></a>
                                <p>Dados iniciais</p>
                            </div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button collapsed" data-toggle="collapse" data-target="#teacherAddressOthers"><i class="fas fa-home"></i></a>
                                <p>Endereço e outros</p>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <form class="" id="addTeacher" role="form" enctype="multipart/form-data" method="POST" action="/admin/professor/cadastro/inserir">
                        <div class="row collapse show" id="teacher-registration-initial-data" data-parent="#teacher-registration-accordion">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-row mt-2">

                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">Nome Completo:</label>
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
                                            <label for="inputAddress">Data Nascimento:</label>
                                            <input name="birthDate" max="2006-01-31" id="birthDate" type="date" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Naturalidade:</label>
                                            <input name="naturalness" id="naturalness" type="text" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Nacionalidade:</label>
                                            <input name="nationality" id="nationality" type="text" class="form-control" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="form-row mb-5">

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
                                                <input type="file" class="custom-file-input form-control" name="profilePhoto" id="profilePhoto">
                                                <label class="custom-file-label" for="profilePhoto" data-browse="Arquivo">Selecionar uma foto para o perfil do professor</label>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label for="">&nbsp;</label><br>
                                            <a type="button" class="btn btn-success w-100 p-2" data-toggle="modal" data-target="#profilePhotoModal">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row collapse" id="teacherAddressOthers" data-parent="#teacher-registration-accordion">
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
                                            <label for="inputCity">UF:</label>
                                            <input type="text" id="uf" name="uf" class="form-control" required placeholder="Sigla" maxlength="2">
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-5">
                                            <label for="inputCity">Endereço:</label>
                                            <input type="text" id="address" name="address" class="form-control" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Telefone:</label>
                                            <input type="text" id="telephone" name="telephoneNumber" class="form-control" placeholder="" required>
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
                                    <div class="form-row mt-3">
                                        <div class="form-group col-md-3 mt-3 mb-5 mx-auto">
                                            <button id="buttonAddTeacher" disabled class="btn btn-success w-100">Cadastra professor (a)</button>
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
        </div>



        <div class="modal fade" id="matriculaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Situação da matricula
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        </div>
                        <div class="col-lg-12 d-flex justify-content-center">
                            <!-- <i class="fas fa-check-circle"></i> -->
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="col-lg-12 modal-text">
                            <p>Aluno não matriculado!</p>
                            <p>INFO-1M-B chegou ao limite de alunos! </p>
                        </div>
                        <div class="col-lg-12 alternative-modal-links mt-5 d-flex justify-content-around mb-4">

                            <a class="btn btn-primary" href="">Lista de Alunos <i class="fas fa-arrow-alt-circle-left ml-2"></i></a>
                            <a class="btn btn-info" data-dismiss="modal" href=""><i class="fas fa-arrow-alt-circle-right mr-2"></i> Retornar a sessão</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>