<div class="row mb-4 d-flex justify-content-center" id="main-accordion-student">

    <?php foreach ($this->view->studentProfile as $key => $student) { ?>

        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

        <div class="col-lg-3 col-11 mx-auto modal-sidebar">

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">

                        <img class="mx-auto mb-2" src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' data-toggle="modal" data-target="#profilePhotoModal">

                        <div class="col-lg-12 main-sheet d-block d-sm-none">
                            <div class="row p-3"><span class="col-lg-12"><?= $student->student_name ?> - <?= $student->acronym_series ?> <?= $student->ballot ?> - <?= $student->course ?> - <?= $student->shift ?></span></div>
                        </div>

                        <div class="col-lg-12 main-sheet d-none d-sm-block">
                            <div class="row p-3">
                                <span class="col-lg-12"><?= $student->student_name ?></span>
                                <span class="col-lg-12"><?= $student->acronym_series ?> <?= $student->ballot ?> - <?= $student->course ?> - <?= $student->shift ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 container-list-group">

                            <nav>

                                <ul>

                                    <a href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-student">Dados do aluno</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#student-exam">Avaliações</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-assessments">Boletim</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-assessments">Observações</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-assessments">Análise</a>

                                </ul>

                            </nav>

                        </div>

                    </div>

                </div>

                <div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="profilePhotoModal">Foto do perfil</h5>
                                <div class="row">
                                    <div class="col-lg-12"> <button type="button" class="close text-rig close-modal" data-toggle="modal" data-target="#profilePhotoModal">
                                            <span><i class="fas fa-times-circle text-dark mr-3 mt-2"></i></span>
                                        </button></div>
                                </div>
                            </div>

                            <div class="modal-body mb-3">

                                <div class="container-img col-lg-12 d-flex justify-content-center">

                                    <img class="mx-auto" src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" '>

                                </div>

                                <form id="formUpdateProfilePhoto" method="POST" enctype="multipart/form-data">

                                    <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" id="">

                                    <input type="hidden" id="id" value="<?= $student->student_id ?>" name="id">

                                    <input type="hidden" id="oldPhoto" name="oldPhoto" value="<?= $student->profilePhoto ?>">

                                    <div class="row">

                                        <div class="col-lg-12 mt-3 d-flex justify-content-end">

                                            <button id="updateImg" disabled class="btn btn-success">Atualizar foto</button>

                                        </div>

                                    </div>

                                </form>

                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-8 card main-content col-11 mx-auto">

            <div class="row">

                <div class="col-lg-11 mx-auto collapse show" id="accordion-data-student" data-parent="#main-accordion-student">

                    <form id="studentModal<?= $student->student_id ?>" class="col-lg-12" action="">

                        <input type="hidden" value="<?= $student->student_id ?>" name="studentId">
                        <input type="hidden" value="<?= $student->telephone_id ?>" name="telephoneId">
                        <input type="hidden" value="<?= $student->address_id ?>" name="addressId">

                        <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-lg-8">Dados do aluno</h5>

                                    <?php if (!isset($_SESSION)) session_start();

                                    if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) {

                                    ?>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span idElement="#studentModal<?= $student->student_id ?>" formGroup="containerListStudent" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                        <span idElement="#studentModal<?= $student->student_id ?>" routeUpdate="/admin/aluno/lista/perfil-aluno/atualizar" toastData="Dados atualizados" container="containerListStudent" routeList="/admin/aluno/lista/listagem" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                    </div>

                                    <?php } ?>

                                </div>

                            </div>


                        </div>


                        <div class="input-group d-flex col-12 col-lg-11 mt-2 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nome:</span>
                            </div>
                            <input type="text" id="name" name="name" disabled class="form-control" value="<?= $student->student_name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <?php 
                        
                        if (!isset($_SESSION)) session_start();

                        if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) { ?>

                        <div class="input-group d-flex justify-content-start col-12 col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nome da mãe:</span>
                            </div>
                            <input type="text" id="motherName" name="motherName" disabled class="form-control" value="<?= $student->student_mother ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nome do pai:</span>
                            </div>
                            <input type="text" id="fatherName" name="fatherName" disabled class="form-control" value="<?= $student->student_father ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CPF:</span>
                            </div>
                            <input type="text" onload="this.value = this.value.mask('000.000.000-00')" id="cpf" name="cpf" disabled class="form-control" value="<?= $student->student_cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                            </div>

                            <select id="sex" name="sex" disabled class="form-control custom-select">
                                <option value="<?= $student->student_sex_id ?>"><?= $student->student_sex ?></option>
                                <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                    <?php if ($sex->option_value != $student->student_sex_id) { ?>
                                        <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                            </div>
                            <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $student->student_nacionality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                            </div>
                            <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $student->student_naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                            </div>
                            <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $student->student_birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">PcD:</span>
                            </div>

                            <select id="pcd" name="pcd" disabled class="form-control custom-select">
                                <option value="<?= $student->student_pcd_id ?>"><?= $student->student_pcd ?></option>
                                <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                    <?php if ($pcd->option_value != $student->student_pcd_id) { ?>
                                        <option value="<?= $pcd->option_value ?>"><?= $pcd->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <?php } ?>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Tipo sanguíneo:</span>
                            </div>

                            <select id="bloodType" name="bloodType" disabled class="form-control custom-select">
                                <option value="<?= $student->blood_type_id ?>"><?= $student->blood_type ?></option>
                                <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                    <?php if ($bloodType->option_value != $student->blood_type_id) { ?>
                                        <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                            </div>
                            <input id="email" name="email" type="text" disabled class="form-control" value="<?= $student->email?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>

                        <?php 
                        
                        if (!isset($_SESSION)) session_start();

                        if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) { ?>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CEP:</span>
                            </div>
                            <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $student->student_zipCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">UF:</span>
                            </div>
                            <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $student->student_uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Município:</span>
                            </div>
                            <input type="text" id="county" name="county" disabled class="form-control" value="<?= $student->student_county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                            </div>
                            <input type="text" id="district" name="district" disabled class="form-control" value="<?= $student->student_district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                            </div>
                            <input type="text" id="address" name="address" disabled class="form-control" value="<?= $student->student_address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <?php } ?>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Telefone</span>
                            </div>
                            <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $student->telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <h5 class="mt-5 mb-3 ml-4">Curso e turma:</h5>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Situação do aluno:</span>
                            </div>
                            <input type="text" disabled class="form-control" value="<?= $student->student_situation ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Turma:</span>
                            </div>
                            <input type="text" disabled class="form-control" value="<?= $student->acronym_series ?> <?= $student->ballot ?> -  <?= $student->course ?> - <?= $student->shift ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                    <?php } ?>

                    </form>


                </div>

                <div class="col-lg-11 mx-auto collapse" id="student-exam" data-parent="#main-accordion-student">

                    <div class="col-lg-12 accordion" id="accordion-ratings">

                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-6">
                                        <h5>Avaliações</h5>
                                    </div>

                                    <div class="col-lg-6 collapse-options-container">

                                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#rating-list"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Avaliações</span></a>

                                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-reviews"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                                    </div>
                                </div>
                            </div>

                            

                            <div class="col-lg-12">

                                <div class="collapse show" id="rating-list" data-parent="#accordion-ratings">

                                    <form id="seekNoteExamStudent" class="mt-3 col-lg-12 text-dark" action="">

                                        <input value="<?= $this->view->studentProfile[0]->enrollmentId ?>" type="hidden" name="enrollmentId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-5">
                                                <label for="">Nome da avaliacão:</label>
                                                <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                            </div>

                                            <input type="hidden" value="<?= $this->view->studentProfile[0]->class_id ?>" name="classId">


                                            <div class="form-group col-lg-4">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClassId" class="form-control custom-select" name="disciplineClassId" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) { ?>

                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="">Unidade:</label>

                                                <select id="unity" class="form-control custom-select" name="unity" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                        <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                        </div>

                                    </form>

                                    <hr class="col-lg-11 mx-auto">

                                    <div class="table-responsive">

                                        <table class="table col-lg-12 col-sm-10 mx-auto table-borderless table-hover" id="note-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Avaliação</th>
                                                    <th scope="col">Disciplina</th>
                                                    <th scope="col">Resultado</th>
                                                </tr>
                                            </thead>
                                            <tbody containerListNote></tbody>
                                        </table>
                                    </div>

                                </div>



                                <div class="collapse card" id="add-reviews" data-parent="#accordion-ratings">

                                    <form id="addNote" class="col-lg-12" action="">

                                        <input value="<?= $this->view->studentProfile[0]->enrollmentId ?>" type="hidden" name="enrollmentId">
                                        <input value="<?= $this->view->studentProfile[0]->class_id ?>" type="hidden" name="classId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-12">
                                                <label for="">Avaliações disponíveis</label>

                                                <select id="examDescription" name="examDescription" class="form-control custom-select" required></select>
                                            
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-lg-2">
                                                <label for="">Nota:</label>
                                                <input class="form-control" value="0" name="noteValue" type="text" id="noteValue">
                                            </div>

                                            <div class="form-group col-lg-3 ml-auto">
                                                <label for="">&nbsp;</label>
                                                <button id="buttonAddNoteStudent" class="btn btn-success w-100">Adicionar</button>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
</div>