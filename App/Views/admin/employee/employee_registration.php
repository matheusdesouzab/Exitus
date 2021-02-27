<div id="employee-registration">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <div class="col-lg-12 mb-4">
                <h5>Cadastra funcionário(a)</h5>
            </div>

            <div class="col-lg-12">

                <div class="card col-lg-12 pt-4 p-3 accordion" id="employee-registration-accordion">

                    <div class="registration-session-in-stages mx-auto">
                        <div class="registration-by-content-step">
                            <div class="registration-connection-line-in-stages"></div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button" data-toggle="collapse" data-target="#employee-registration-initial-data"><i class="fas fa-user-alt"></i></a>
                                <p>Dados iniciais</p>
                            </div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button collapsed" data-toggle="collapse" data-target="#employee-registration-address-and-contact"><i class="fas fa-home"></i></a>
                                <p>Endereço e contato</p>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <form class="was-validated" role="form">
                        <div class="row collapse show" id="employee-registration-initial-data" data-parent="#employee-registration-accordion">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-row mt-2">

                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">Nome Completo:</label>
                                            <input type="text" class="form-control is-valid" id="inputEmail4" placeholder="" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">CPF:</label>
                                            <input type="text" id="cpf" class="form-control is-valid" placeholder="Somente números" maxlength="14" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputState">Sexo:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option selected></option>
                                                <option>Masculino</option>
                                                <option>Feminino</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Data Nascimento:</label>
                                            <input type="date" class="form-control is-valid" id="inputAddress" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Naturalidade:</label>
                                            <input type="text" class="form-control is-valid" id="inputAddress2" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Nacionalidade:</label>
                                            <input type="text" class="form-control is-valid" id="inputAddress2" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="form-row mb-5">

                                        <div class="form-group col-md-6">
                                            <label for="">Foto do perfil:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input is-valid" id="customFileLangHTML" required>
                                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Arquivo">Selecionar foto do professor(a)</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputState">Cargo:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option selected></option>
                                                <option>Professor</option>
                                                <option>Vígia</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Tipo sanguíneo:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option value=""></option>
                                                <option>A+</option>
                                                <option>A-</option>
                                                <option>B+</option>
                                                <option>B-</option>
                                                <option>AB+</option>
                                                <option>AB-</option>
                                                <option>O+</option>
                                                <option>O-</option>
                                            </select>
                                        </div>

                                    </div>




                                </div>
                            </div>
                        </div>

                        <div class="row collapse" id="employee-registration-address-and-contact" data-parent="#employee-registration-accordion">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">CEP:</label>
                                            <input type="text" id="cep" class="form-control is-valid" id="inputCity" maxlength="9" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Munícipio:</label>
                                            <input type="text" id="municipio" class="form-control is-valid" id="inputCity" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Bairro:</label>
                                            <input type="text" id="bairro" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputCity">UF:</label>
                                            <input type="text" id="uf" class="form-control is-valid" id="inputCity" required placeholder="Sigla" maxlength="2">
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Endereço:</label>
                                            <input type="text" id="endereco" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Telefone 1:</label>
                                            <input type="text" id="telefone1" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Telefone 2:</label>
                                            <input type="text" id="telefone2" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="form-group col-md-3 mt-3 mb-5 mx-auto">
                                            <a id="matricularAluno" class="btn btn-success w-100" href="#">Finalizar cadastro</a>
                                        </div>
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