<div class="row mb-4 d-flex justify-content-center" id="main-accordion-student">

    <?php foreach ($this->view->studentProfile as $key => $student) { ?>

        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

        <div class="col-md-3 col-11 mx-auto modal-sidebar">

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">

                        <img class="mx-auto mb-2" src='<?= $student->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $student->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' data-toggle="modal" data-target="#profilePhotoModal">

                        <div class="col-lg-12 main-sheet d-block d-sm-none">
                            <div class="row p-3"><span class="col-lg-12"><?= $student->hierarchyFunction ?></span></div>
                        </div>

                        <div class="col-lg-12 main-sheet d-none d-sm-block">
                            <div class="row p-3">
                                <span class="col-lg-12"><?= $student->student_name ?></span>
                                <span class="col-lg-12"><?= $student->hierarchyFunction ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 container-list-group">

                            <nav>

                                <ul>

                                    <a href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-student">Seu perfil</a>
                                    <a href="#" data-toggle="collapse" aria-expanded="false" data-target="#accordion-settings-student">Configurações</a>

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

                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-8 card main-content col-11 mx-auto">

            <div class="row">

                <div class="col-lg-11 mx-auto collapse show" id="accordion-data-student" data-parent="#main-accordion-student">

                    <form id="studentModal<?= $student->student_id ?>" class="col-lg-12" action="">

                        <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-lg-8">Dados pessoais</h5>

                                </div>

                            </div>


                        </div>


                        <div class="input-group d-flex col-12 col-lg-11 mt-2 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nome:</span>
                            </div>
                            <input type="text" id="name" name="name" disabled class="form-control" value="<?= $student->student_name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>


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
                            <input id="accessCode" name="accessCode" type="text" disabled class="form-control" value="<?= $student->accessCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>


                        <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>


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


                        <h5 class="mt-5 mb-3 ml-4">Situacão</h5>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Situação atual na escola:</span>
                            </div>

                            <input id="tet" name="tet" type="text" disabled class="form-control" value="<?= $student->general_student_situation ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                    <?php } ?>

                    </form>


                </div>

                <div class="col-lg-11 mx-auto collapse" id="accordion-settings-student" data-parent="#main-accordion-student">


                    <div class="row">

                        <form class="col-lg-11 mx-auto" action="" id="formSettingsStudent">

                            <div class="form-row d-flex align-items-center">

                                <h5 class="col-lg-8 p-0">Configurações</h5>

                                <div class="col-lg-4 d-flex justify-content-end">

                                    <span idElement="#formSettingsStudent" formGroup="containerSettingsModal" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                    <span id="updateStudentPortalData" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                </div>

                            </div>



                            <div class="form-group mt-4 d-flex align-items-center">

                                <label class="col-lg-4 p-0" for="">Dados vinculados: </label>

                                <div class="col-lg-8">

                                    <select class="custom-select form-control" disabled name="enrollmentId">

                                        <option value="<?= $_SESSION['Student']['classId'] ?>"><?= $_SESSION['Student']['class'] ?></option>

                                        <?php foreach ($this->view->studentEnrollment as $key => $value) { ?>                                      

                                            <?php if($_SESSION['Student']['classId'] <> $value->class_id){ ?>

                                            <option value="<?= $value->enrollmentId ?>"><?= $value->acronym_series ?> ª <?= $value->ballot ?> - <?= $value->courseName ?> - <?= $value->shift ?></option>

                                        <?php }}?>

                                    </select>

                                </div>

                                

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>