<section id="student-registration">

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

                    <form class="was-validated" id="addStudent" role="form" enctype="multipart/form-data" method="POST" action="/admin/aluno/cadastro/inserir">
                        <div class="row collapse show" id="student-registration-initial-data" data-parent="#student-record-accordion">
                            <div class="col-lg-10 mt-2 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-row mt-1">

                                        <div class="form-group col-md-5">
                                            <label for="name">Nome Completo:</label>
                                            <input type="text" value="<?= isset($this->view->atributes['name']) ? $this->view->atributes['name'] : ''  ?>" class="form-control is-valid" id="name" name="name" placeholder="" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="cpf">CPF:</label>
                                            <input type="text" id="cpf" value="<?= isset($this->view->atributes['cpf']) ? $this->view->atributes['cpf'] : ''  ?>" minlength="14" name="cpf" class="form-control is-valid" placeholder="" required>

                                            <?php if (isset($this->view->incorrectAttributes) && in_array('cpf', $this->view->incorrectAttributes)) { ?>
                                                <small class="text-danger text-center">
                                                    Formato do CPF inválido
                                                </small>
                                            <?php } ?>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="sex">Sexo:</label>
                                            <select id="sex" value='2' name="sex" class="form-control custom-select is-valid"></select>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="birthDate">Data Nascimento:</label>
                                            <input name="birthDate" value="<?= isset($this->view->atributes['birthDate']) ? $this->view->atributes['birthDate'] : '' ?>" type="date" max="2006-01-31" min="1940-01-31" class="form-control is-valid" id="birthDate" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="naturalness">Naturalidade:</label>
                                            <input name="naturalness" value="<?= isset($this->view->atributes['naturalness']) ? $this->view->atributes['naturalness'] : '' ?>" type="text" class="form-control is-valid" id="naturalness" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="nationality">Nacionalidade:</label>
                                            <input type="text" name="nationality" value="<?= isset($this->view->atributes['nationality']) ? $this->view->atributes['nationality'] : '' ?>" class="form-control is-valid" id="nationality" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="form-row mb-4">

                                        <div class="form-group col-md-5">
                                            <label for="motherName">Nome da Mãe:</label>
                                            <input type="text" class="form-control is-valid" value="<?= isset($this->view->atributes['motherName']) ? $this->view->atributes['motherName'] : '' ?>" name="motherName" id="motherName" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="fatherName">Nome do Pai:</label>
                                            <input type="text" class="form-control is-valid" value="<?= isset($this->view->atributes['fatherName']) ? $this->view->atributes['fatherName'] : '' ?>" name="fatherName" id="fatherName" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="pcd">PcD:</label>
                                            <select id="pcd" name="pcd" class="form-control custom-select is-valid">
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
                                            <label for="zipCode">CEP:</label>
                                            <input type="text" id="zipCode" value="<?= isset($this->view->atributes['zipCode']) ? $this->view->atributes['zipCode'] : '' ?>" class="form-control is-valid" name="zipCode" minlength="9" required>

                                            <?php if (isset($this->view->incorrectAttributes) && in_array('zipCode', $this->view->incorrectAttributes)) { ?>
                                                <small class="text-danger text-center">
                                                    Formato do CEP inválido
                                                </small>
                                            <?php } ?>

                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="county">Munícipio:</label>
                                            <input type="text" id="county" class="form-control is-valid" value="<?= isset($this->view->atributes['county']) ? $this->view->atributes['county'] : '' ?>" name="county" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="district">Bairro:</label>
                                            <input type="text" id="district" value="<?= isset($this->view->atributes['district']) ? $this->view->atributes['district'] : '' ?>" class="form-control is-valid" name="district" placeholder="" required>
                                        </div>



                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="address">Endereço:</label>
                                            <input type="text" id="address" value="<?= isset($this->view->atributes['address']) ? $this->view->atributes['address'] : '' ?>" class="form-control is-valid" name="address" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="uf">UF:</label>
                                            <input type="text" id="uf" class="form-control is-valid" value="<?= isset($this->view->atributes['uf']) ? $this->view->atributes['uf'] : '' ?>" maxlength="2" name="uf" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="telephone">Contato:</label>
                                            <input type="tel" id="telephone" value="<?= isset($this->view->atributes['telephoneNumber']) ? $this->view->atributes['telephoneNumber'] : '' ?>" class="form-control is-valid" name="telephoneNumber" placeholder="" required>

                                            <?php if (isset($this->view->incorrectAttributes) && in_array('telephoneNumber', $this->view->incorrectAttributes)) { ?>
                                                <small class="text-danger text-center">
                                                    Formato do telefone inválido
                                                </small>
                                            <?php } ?>

                                        </div>

                                    </div>

                                    <div class="form-row mb-3">

                                        <div class="form-group col-md-4">
                                            <label for="bloodType">Tipo sanguíneo:</label>
                                            <select id="bloodType" name="bloodType" class="form-control custom-select is-valid"></select>
                                        </div>


                                        <div class="form-group col-md-8">
                                            <label for="">&nbsp;</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="profilePhoto" id="profilePhoto">
                                                <label class="custom-file-label" for="profilePhoto" data-browse="Arquivo">Aperte para selecionar uma foto para o perfil do aluno</label>

                                                <?php if (isset($this->view->incorrectAttributes) && in_array('imagem', $this->view->incorrectAttributes)) { ?>
                                                    <small class="text-danger text-center">
                                                        Formato da Imagem Invalido ( Permitidos : jpeg - jpg - png )
                                                    </small>
                                                <?php } ?>

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
                                            <label for="class">Turma</label>
                                            <select id="class" class4 name="class" class="form-control custom-select is-valid"></select>
                                        </div>

                                        <select id="class" name="schoolTerm" class="d-none"></select>

                                        <div class="form-group col-md-4">
                                            <label for="">&nbsp;</label>
                                            <button id="buttonAddStudent" class="btn btn-success w-100">Cadastra aluno (a)</button>
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

</section>