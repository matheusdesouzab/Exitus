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

                                <a type="button" class="btn round-button collapsed" data-toggle="collapse" data-target="#student-registration-class"><i class="fas fa-clipboard-check"></i></a>

                                <p>Finalizando</p>

                            </div>

                        </div>
                    </div>

                    <hr class="col-lg-11 mx-auto">

                    <form class="" id="addStudent" role="form" enctype="multipart/form-data" method="POST" action="/admin/aluno/cadastro/inserir">
                        <div class="row collapse show" id="student-registration-initial-data" data-parent="#student-record-accordion">
                            <div class="col-lg-10 mt-2 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-row mt-1">

                                        <div class="form-group col-md-5">
                                            <label for="name">Nome Completo:</label>
                                            <input type="text" value="" class="form-control" id="name" name="name" placeholder="" maxlength="120" required>
                                        </div>

                                        <div id="cpfField" class="form-group col-md-4">
                                            <label for="cpf">CPF:</label>
                                            <input type="text" id="cpf" value="" minlength="14" name="cpf" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-3">

                                            <label for="sex">Sexo:</label>

                                            <select id="sex" name="sex" class="form-control custom-select is-valid">

                                                <?php foreach ($this->view->availableSex as $key => $sex) { ?>

                                                    <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="birthDate">Data Nascimento:</label>
                                            <input name="birthDate" id="birthDate" type="date" max="2006-01-31" min="1940-01-31" class="form-control" id="birthDate" placeholder="" required>
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

                                    <div class="form-row mb-4">

                                        <div class="form-group col-md-5">
                                            <label for="motherName">Nome da Mãe:</label>
                                            <input type="text" class="form-control" value="" name="motherName" id="motherName" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="fatherName">Nome do Pai:</label>
                                            <input type="text" class="form-control" value="" name="fatherName" id="fatherName" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-2">

                                            <label for="pcd">PcD:</label>

                                            <select id="pcd" name="pcd" class="form-control custom-select is-valid">

                                                <?php foreach ($this->view->pcd as $key => $pcd) { ?>

                                                    <option value="<?= $pcd->option_value ?>"><?= $pcd->option_text ?></option>

                                                <?php } ?>

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

                                        <div id="zipCodeField" class="form-group col-md-3">
                                            <label for="zipCode">CEP:</label>
                                            <input type="text" id="zipCode" value="" class="form-control" name="zipCode" minlength="9" required>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="county">Munícipio:</label>
                                            <input type="text" id="county" class="form-control" value="" name="county" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="district">Bairro:</label>
                                            <input type="text" id="district" value="" class="form-control" name="district" placeholder="" required>
                                        </div>


                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="address">Endereço:</label>
                                            <input type="text" id="address" value="" class="form-control" name="address" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="uf">UF:</label>
                                            <input type="text" id="uf" class="form-control" value="" maxlength="2" name="uf" placeholder="" required>
                                        </div>

                                        <div id="telephoneField" class="form-group col-md-4">
                                            <label for="telephone">Contato:</label>
                                            <input type="tel" id="telephone" value="" class="form-control" name="telephoneNumber" placeholder="" required>

                                        </div>

                                    </div>

                                    <div class="form-row mb-3">

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
                                                <label class="custom-file-label" for="profilePhoto" data-browse="Arquivo">Selecionar uma foto para o perfil do aluno</label>

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

                        <div class="row collapse" id="student-registration-class" data-parent="#student-record-accordion">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">

                                    <div class="form-row mt-3 mb-5">

                                        <div class="form-group col-md-8">
                                            <label for="class">Turma</label>
                                            <select id="class"  name="class" class="form-control custom-select is-valid">                                       

                                            <?php

                                            foreach ($this->view->availableClass as $i => $class) {

                                                $totalVacancies = $class->class_capacity - $class->student_total;


                                                $newName = $class->series_acronym . ' ' . $class->ballot . ' - ' . $class->course . ' - ' . $class->shift . ' - Sala: ' . $class->classroom_number . ' - ' . 'Vagas: ' . $totalVacancies;

                                            ?>
                                                <?php if ($totalVacancies >= 1) { ?>

                                                    <option value="<?= $class->id_class ?>"><?= $newName ?></option>

                                                <?php } ?>

                                            <?php } ?>

                                        </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">&nbsp;</label>
                                            <button id="buttonAddStudent" disabled class="btn btn-success w-100">Cadastra aluno (a)</button>
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
    </div>

</section>