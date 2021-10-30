<div class="row mb-4 d-flex justify-content-around" id="main-accordion-student">

    <?php foreach ($this->view->studentDataGeneral as $key => $student) { ?>

        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

        <div class="col-md-3 col-11 mx-auto">

            <div class="col-lg-12 modal-sidebar">

                <div class="row p-3">

                    <div class="col-lg-12">

                        <div class="row">

                            <img class="mx-auto mb-3" src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' data-toggle="modal" data-target="#profilePhotoModal">

                            <div class="col-lg-12 main-sheet d-block d-sm-none">
                                <div class="row p-3"><span class="col-lg-12"><?= $student->student_name ?> - <?= $this->view->studentDataEnrollment[0]->acronym_series ?> <?= $this->view->studentDataEnrollment[0]->ballot ?> - <?= $this->view->studentDataEnrollment[0]->course ?> - <?= $this->view->studentDataEnrollment[0]->shift ?></span></div>
                            </div>

                            <div class="col-lg-10 mx-auto main-sheet d-none d-sm-block">
                                <div class="row pb-3">
                                    <span class="col-lg-12"><?= $student->student_name ?></span>

                                    <?php if ($this->view->schoolTermActive[0]->option_value ==  $this->view->studentDataEnrollment[0]->schoolTermSituation) { ?>

                                        <span class="col-lg-12"><?= $this->view->studentDataEnrollment[0]->acronym_series ?> <?= $this->view->studentDataEnrollment[0]->ballot ?> - <?= $this->view->studentDataEnrollment[0]->course ?> - <?= $this->view->studentDataEnrollment[0]->shift ?></span>

                                    <?php } else { ?>

                                        <span class="col-lg-12"><?= $student->general_student_situation ?></span>

                                    <?php } ?>

                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 container-list-group mt-3 p-0">

                                <nav>

                                    <ul>

                                        <a href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-student"><i class="fas fa-user mr-3"></i> Dados do aluno</a>

                                        <?php if ($this->view->schoolTermActive[0]->option_value == $this->view->studentDataEnrollment[0]->schoolTermSituation) { ?>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#student-exam"><i class="fas fa-paste mr-3"></i> Avaliações</a>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-bulletin"><i class="fas fa-book-open mr-3"></i> Boletim</a>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-lack"><i class="fas fa-tasks mr-3"></i> Faltas</a>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-disciplineFinalData"><i class="fab fa-buffer mr-3"></i> Média final</a>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-student-profile-average"><i class="fas fa-poll mr-3"></i> Médias gerais</a>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-observation"> <i class="fas fa-file-alt mr-3"></i> Observações</a>

                                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-settings"> <i class="fas fa-sync-alt mr-2"></i> Troca de turma</a>

                                        <?php } ?>


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

                                                <button id="updateImg" type='submit' disabled class="btn btn-success">Atualizar foto</button>

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

        <div class="col-md-9 col-11 mx-auto">

            <div class="col-lg-12 card main-content">

                <div class="row">

                    <div class="col-lg-11 mx-auto collapse show" id="accordion-data-student" data-parent="#main-accordion-student">

                        <form id="studentModal<?= $student->student_id ?>" class="" action="">

                            <input type="hidden" value="<?= $student->student_id ?>" name="id">
                            <input type="hidden" value="<?= $student->telephone_id ?>" name="telephoneId">
                            <input type="hidden" value="<?= $student->address_id ?>" name="addressId">
                            <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">

                            <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                                <div class="col-lg-12 p-0">

                                    <div class="row d-flex align-items-center">

                                        <h5 class="col-lg-8">Dados do aluno</h5>

                                        <?php if (!isset($_SESSION)) session_start();

                                        if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) {

                                        ?>

                                            <?php if ($this->view->schoolTermActive[0]->option_value == $this->view->studentDataEnrollment[0]->schoolTermSituation) { ?>

                                                <div class="col-lg-4 d-flex justify-content-end">

                                                    <span idElement="#studentModal<?= $student->student_id ?>" formGroup="containerListStudent" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                                    <span idElement="#studentModal<?= $student->student_id ?>" routeUpdate="/admin/aluno/lista/perfil-aluno/atualizar" toastData="Dados atualizados" routeData="#studentModal<?= $student->student_id ?>" container="containerStudentProfileModal" routeList="/admin/aluno/lista/perfil-aluno" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                                </div>

                                        <?php }
                                        } ?>

                                    </div>

                                </div>


                            </div>

                            <div class="row">

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

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Código de acesso ao portal:</span>
                                    </div>
                                    <input id="accessCode" name="accessCode" type="text" disabled class="form-control" value="<?= $student->accessCode ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
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
                                        <span class="input-group-text" id="addon-wrapping">Telefone: </span>
                                    </div>
                                    <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $student->telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Email: </span>
                                    </div>
                                    <input id="email" name="email" type="text" disabled class="form-control" value="<?= $student->email ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>


                                <h5 class="mt-5 mb-3 ml-4">Status do aluno:</h5>

                                <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Situação atual na escola:</span>
                                    </div>

                                    <select id="situationStudentGeneral" name="situationStudentGeneral" disabled class="form-control custom-select">
                                        <option value="<?= $student->general_student_situation_id ?>"> <?= $student->general_student_situation ?> </option>
                                        <?php foreach ($this->view->generalSituationStudent as $key => $value) { ?>
                                            <?php if ($value->option_value != $student->general_student_situation_id) { ?>
                                                <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                                        <?php }
                                        } ?>
                                    </select>


                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Situação atual no período letivo:</span>
                                    </div>

                                    <select id="situationStudent" name="situationStudent" disabled class="form-control custom-select">
                                        <option value="<?= $this->view->studentDataEnrollment[0]->student_situation_id ?>"><?= $this->view->studentDataEnrollment[0]->student_situation ?></option>
                                        <?php foreach ($this->view->studentSituation as $key => $value) { ?>
                                            <?php if ($value->option_value != $this->view->studentDataEnrollment[0]->student_situation_id) { ?>
                                                <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                                        <?php }
                                        } ?>
                                    </select>


                                </div>

                            </div>



                        <?php } ?>

                        </form>


                    </div>

                    <div class="col-lg-11 mx-auto collapse" id="student-exam" data-parent="#main-accordion-student">

                        <div class="accordion" id="accordion-ratings">

                            <div class="col-lg-12 mb-3">

                                <div class="row d-flex align-items-center p-0">

                                    <div class="col-lg-6 p-0">
                                        <h5 class='mt-2'>Avaliações</h5>
                                    </div>

                                    <div class="col-lg-6 p-0">

                                        <div class="row collapse-options-container">

                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#rating-list"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Avaliações</span></a>

                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-reviews"><span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span></a>

                                        </div>

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12 p-0">

                                <div class="collapse show" id="rating-list" data-parent="#accordion-ratings">

                                    <form id="seekNoteExamStudent" class="mt-3 text-dark" action="">

                                        <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-5">
                                                <label for="">Nome da avaliacão:</label>
                                                <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                            </div>

                                            <input type="hidden" value="<?= $this->view->studentDataEnrollment[0]->class_id ?>" name="classId">


                                            <div class="form-group col-lg-4">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

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

                                        <table class="table col-lg-12 col-sm-10 mx-auto table-borderless table-hover table-striped" id="note-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Descrição</th>
                                                    <th class="text-center" scope="col">Resultado</th>
                                                </tr>
                                            </thead>
                                            <tbody containerListNote></tbody>
                                        </table>
                                    </div>

                                </div>



                                <div class="collapse card" id="add-reviews" data-parent="#accordion-ratings">

                                    <form id="addNote" class="col-lg-12" action="">

                                        <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">
                                        <input value="<?= $this->view->studentDataEnrollment[0]->class_id ?>" type="hidden" name="classId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-12">
                                                <label for="">Avaliações disponíveis:</label>

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

                    <div class="col-lg-11 mx-auto collapse" id="class-profile-disciplineFinalData" data-parent="#main-accordion-student">

                        <div class="accordion" id="accordion-disciplineFinalData">

                            <div class="col-lg-12 mb-3">

                                <div class="row d-flex align-items-center p-0">

                                    <div class="col-lg-5 p-0">
                                        <h5 class='mt-2'>Médias finais</h5>
                                    </div>

                                    <div class="col-lg-7 p-0">

                                        <div class="row collapse-options-container">

                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#disciplineFinalData-list"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Médias</span></a>

                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-disciplineFinalData"><span><i class="fas fa-plus mr-2"></i> Adicionar</span></a>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 p-0">

                                <div class="collapse show" id="disciplineFinalData-list" data-parent="#accordion-disciplineFinalData">

                                    <div class="" containerDisciplineAverageList></div>

                                </div>

                                <div class="collapse card" id="add-disciplineFinalData" data-parent="#accordion-disciplineFinalData">

                                    <form id="addDisciplineFinalData" class="col-lg-12" action="">

                                        <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">
                                        <input value="" type="hidden" name="average" id="average">

                                        <div class="form-row">

                                            <div class="form-group col-lg-6">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClass" class="form-control custom-select" name="disciplineClass">

                                                    <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-6">

                                                <label for="">Situação:</label>

                                                <input id="situation" disabled class="form-control" name="situation">

                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-lg-6">

                                                <label for="">Legenda: </label>

                                                <select class="form-control custom-select" name="subtitle" id="subtitle" required>

                                                    <?php foreach ($this->view->listSubtitles as $key => $subtitle) { ?>

                                                        <option value="<?= $subtitle->option_value ?>"> <?= $subtitle->option_text ?> </option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-3 ml-auto">
                                                <label for="">&nbsp;</label>
                                                <a id="buttonAddDisciplineFinalData" class="btn btn-success w-100">Adicionar</a>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-11 mx-auto collapse" id="class-profile-observation" data-parent="#main-accordion-student">

                        <div class="accordion" id="accordion-observation">

                            <div class="col-lg-12 mb-3">

                                <div class="row d-flex align-items-center p-0">

                                    <div class="col-lg-5 p-0">
                                        <h5 class='mt-2'>Observações</h5>
                                    </div>

                                    <div class="col-lg-7 p-0">

                                        <div class="row collapse-options-container">

                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#observation-list"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Observações</span></a>

                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-observation"><span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span></a>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 p-0">

                                <div class="collapse show" id="observation-list" data-parent="#accordion-observation">

                                    <div containerObservation></div>

                                </div>

                                <div class="collapse card" id="add-observation" data-parent="#accordion-observation">

                                    <form id="addObservation" class="col-lg-12" action="">

                                        <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-12">
                                                <label for="">Descrição da observação</label>
                                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-lg-5">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                    <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="">Unidade:</label>

                                                <select id="unity" class="form-control custom-select" name="unity" required>

                                                    <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                        <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>


                                            <div class="form-group col-lg-3 ml-auto">
                                                <label for="">&nbsp;</label>
                                                <a id="buttonAddObservationStudent" class="btn btn-success w-100">Adicionar</a>
                                            </div>



                                        </div>

                                    </form>

                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="col-11 mx-auto collapse" id="class-profile-bulletin" data-parent="#main-accordion-student">

                        <div containerBulletin></div>

                    </div>

                    <div class="col-lg-11 mx-auto collapse" id="class-profile-lack" data-parent="#main-accordion-student">

                        <div class="accordion" id="accordion-lack">

                            <div class="col-lg-12 mb-3">

                                <div class="row d-flex align-items-center p-0">

                                    <div class="col-lg-5 p-0">
                                        <h5 class="mt-2">Faltas do aluno</h5>
                                    </div>

                                    <div class="col-lg-7 col-12 p-0">

                                        <div class="row collapse-options-container">

                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#lack-list"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Faltas</span></a>

                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-lack"><span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span></a>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 p-0">

                                <div class="collapse show" id="lack-list" data-parent="#accordion-lack">

                                    <form id="seekLackStudent" class="mt-3  text-dark" action="">

                                        <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-5">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

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

                                            <div class="form-group col-lg-4">

                                                <label for="">Ordenar por:</label>

                                                <select id="orderBy" class="form-control custom-select" name="orderBy" required>

                                                    <option value="DESC">Maiores faltas</option>
                                                    <option value="ASC">Menores faltas</option>

                                                </select>

                                            </div>

                                        </div>

                                    </form>

                                    <div class="table-responsive">

                                        <hr class="">

                                        <table class="table col-lg-12 col-sm-10 mx-auto table-borderless table-hover" id="lack-table">

                                            <thead>

                                                <tr>
                                                    <th class="text-left" scope="col">Disciplina</th>
                                                    <th scope="col">Unidade</th>
                                                    <th scope="col">Faltas</th>
                                                </tr>

                                            </thead>

                                            <tbody containerListLack></tbody>

                                        </table>

                                    </div>




                                </div>

                                <div class="collapse card" id="add-lack" data-parent="#accordion-lack">

                                    <form id="addLack" action="" class="col-lg-12">

                                        <input value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" type="hidden" name="enrollmentId">
                                        <input type="hidden" value="<?= $this->view->studentDataEnrollment[0]->class_id ?>" name="classId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-6">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                    <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-3">

                                                <label for="">Unidade:</label>
                                                <select id="unity" class="form-control custom-select" name="unity" required>

                                                    <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                        <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-3">

                                                <label for="">Faltas:</label>
                                                <input type="text" class="form-control" name="totalLack" id="totalLack">

                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-lg-3 ml-auto">
                                                <label for="">&nbsp;</label>
                                                <a id="buttonAddLackStudent" class="btn btn-success w-100 disabled">Adicionar</a>
                                            </div>

                                        </div>



                                    </form>

                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="col-lg-11 mx-auto collapse" id="class-student-profile-average" data-parent="#main-accordion-student">

                        <div class="col-lg-12 mb-3">

                            <div class="row">

                                <div class="col-lg-12 p-0">
                                    <h5 class='mt-2'>Média do aluno</h5>
                                </div>

                                <div class='col-lg-12 p-0'>

                                    <form id="seekAverageStudentProfile" class="text-dark mt-3 accordion" action="">

                                        <input type="hidden" value="<?= $this->view->studentDataEnrollment[0]->enrollmentId ?>" name="enrollmentId">
                                        <input type="hidden" value="<?= $this->view->studentDataEnrollment[0]->class_id ?>" name="classId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-4">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="">Unidade:</label>

                                                <select id="unity" class="form-control custom-select" name="unity" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                        <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>



                                            <div class="form-group col-lg-4">

                                                <label for="">Status da média:</label>

                                                <select id="noteStatus" class="form-control custom-select" name="noteStatus" required>

                                                    <option value="0">Todos os status</option>
                                                    <option value="Aprovado">Aprovado</option>
                                                    <option value="Reprovado">Reprovado</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="">&nbsp;</label>

                                                <div>
                                                    <a class="btn btn-light w-100 p-2" href="" data-toggle="collapse" data-target="#activate-advanced-search-accordion" aria-expanded="true" aria-controls="activate-advanced-search-accordion"><i class="fas fa-filter"></i></a>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="activate-advanced-search-accordion" class="collapse" data-parent="#seekAverageStudentProfile">

                                            <div class="form-row">

                                                <div class="form-group col-lg-3">

                                                    <label for="">Ordenar por:</label>

                                                    <select id="orderBy" class="form-control custom-select" name="orderBy" required>

                                                        <option value="highestGrade">Maior média</option>
                                                        <option value="lowestGrade">Menor média</option>
                                                        <option value="alphabetical">Ordem Alfabética</option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-3">

                                                    <label for="">Tipo da média:</label>

                                                    <select id="averageType" class="form-control custom-select" name="averageType" required>

                                                        <option value="averageUnity">Média unidade</option>
                                                        <option value="averageEnd">Média final</option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                                <div containerStudentsProfileAverage class="col-lg-12 table-responsive p-0">

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-lg-11 mx-auto collapse" id="class-profile-settings" data-parent="#main-accordion-student">

                        <div class="col-lg-12 mb-3">

                            <div class="row">

                                <div class="col-lg-12 p-0">

                                    <div class="row d-flex align-items-center">

                                        <h5 class="col-lg-8">Troca de turma</h5>

                                        <?php if (!isset($_SESSION)) session_start();

                                        if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) {

                                        ?>

                                            <?php if ($this->view->schoolTermActive[0]->option_value == $this->view->studentDataEnrollment[0]->schoolTermSituation) { ?>

                                                <div class="col-lg-4 d-flex justify-content-end">

                                                    <span id="activateButtonSwitchClasses" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                                </div>

                                        <?php }
                                        } ?>

                                    </div>

                                </div>

                                <div class="col-lg-12 p-0">

                                    <form class="mt-2 p-3 border mt-3" id="switchClasses" action="">

                                        <div class="form-row col-lg-12">

                                            <div class="form-group col-lg-9">

                                                <label for="series">Turma de destino:</label>

                                                <select id="series" name="series" class="form-control custom-select">

                                                    <?php foreach ($this->view->classesWhereStudentEnrolledSameYear as $key => $value) {

                                                        if ($value->studentCapacity > 0) { ?>

                                                            <option value="<?= $value->classId ?>"><?= $value->series ?> ª <?= $value->ballot ?> - <?= $value->course ?> - <?= $value->shift ?> - <?= $value->schoolYear ?> - Vagas: <?= $value->studentCapacity - $value->studentTotal ?></option>

                                                    <?php }
                                                    } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-3">

                                                <label for="">&nbsp; </label><br>

                                                <a id="buttonSwitchClasses" class="btn btn-success w-100 disabled" href="#">Realizar troca</a>

                                            </div>

                                        </div>

                                </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
            </div>