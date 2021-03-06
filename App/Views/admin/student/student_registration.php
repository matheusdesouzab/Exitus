<div id="student-registration">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <div class="col-lg-12 mb-4">
                <h5>Cadastra aluno(a)</h5>
            </div>

            <div class="col-lg-12">

                <div class="card mb-5 col-lg-12 pt-4 p-3 accordion" id="student-record-accordion">

                    <div class="registration-session-in-stages">
                        <div class="registration-by-content-step">
                            <div class="registration-connection-line-in-stages"></div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button" data-toggle="collapse" data-target="#student-registration-initial-data"><i class="fas fa-user-alt"></i></a>
                                <p>Dados iniciais</p>
                            </div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button collapsed" data-toggle="collapse" data-target="#student-registration-address-and-others"><i class="fas fa-home"></i></a>
                                <p>Endereço e outros</p>
                            </div>
                            <div class="registration-in-stages">
                                <a type="button" class="btn round-button collapsed" data-toggle="collapse" data-target="#student-registration-course-and-class"><i class="fas fa-clipboard-check"></i></a>
                                <p>Finalizando</p>
                            </div>
                        </div>
                    </div>

                    <hr class="col-lg-11 mx-auto">

                    <form class="was-validated" role="form">
                        <div class="row collapse show" id="student-registration-initial-data" data-parent="#student-record-accordion">
                            <div class="col-lg-10 mt-2 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-row mt-1">

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

                                    <div class="form-row mb-4">

                                        <div class="form-group col-md-5">
                                            <label for="inputCity">Nome da Mãe:</label>
                                            <input type="text" class="form-control is-valid" id="inputCity" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="inputCity">Nome do Pai:</label>
                                            <input type="text" class="form-control is-valid" id="inputCity" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputCity">PcD:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option>Não</option>
                                                <option>Sim</option>
                                            </select>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="row collapse" id="student-registration-address-and-others" data-parent="#student-record-accordion">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">CEP:</label>
                                            <input type="text" id="cep" class="form-control is-valid" id="inputCity" maxlength="9" required>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="inputCity">Munícipio:</label>
                                            <input type="text" id="municipio" class="form-control is-valid" id="inputCity" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Bairro:</label>
                                            <input type="text" id="bairro" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>



                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Endereço:</label>
                                            <input type="text" id="endereco" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputCity">UF:</label>
                                            <input type="text" id="uf" class="form-control is-valid" maxlength="2" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Contato:</label>
                                            <input type="text" id="telefone1" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>



                                    </div>

                                    <div class="form-row mb-3">

                                        <div class="form-group col-md-4">
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

                                        <div class="form-group col-md-8">
                                            <label for="">&nbsp;</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLangHTML" required>
                                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Arquivo">Selecionar foto do aluno(a)</label>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="row collapse" id="student-registration-course-and-class" data-parent="#student-record-accordion">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">

                                    <div class="form-row mt-3 mb-5">

                                        <div class="form-group col-md-8">
                                            <label for="inputCity">Turma</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option value=""></option>
                                                <option>1&deg; A - Técnico em Informática - Matutino - Sala: 03</option>
                                                <option>INFO-1M-B</option>
                                                <option>INFO-2V-A</option>
                                                <option>INFO-2V-B</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">&nbsp;</label>
                                            <a id="matricularAluno" class="btn btn-success w-100" href="#">Cadastra aluno (a)</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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
        </div>
    </div>

</div>

</div>