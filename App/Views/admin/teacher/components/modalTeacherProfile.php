<div class="row mb-4 d-flex justify-content-center" id="main-accordion">

    <?php foreach ($this->view->teacherProfile as $key => $teacher) { ?>

        <?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

        <div class="col-lg-3 col-11 mx-auto modal-sidebar">

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">

                        <img class="mx-auto mb-3" src='<?= $teacher->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $teacher->teacher_profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"' data-toggle="modal" data-target="#profilePhotoModal">

                        <div class="col-lg-12 main-sheet">
                            <div class="row p-3"><span class="col-lg-12"><?= $teacher->teacher_name ?> - <?= count($this->view->subjectsThatTeacherTeaches) ?> disciplinas ativas</span></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 container-list-group">

                            <nav>

                                <ul>

                                    <a href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-teacher">Dados do docente</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-teacher-accordion">Turmas</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-assessments">Observações</a>

                                </ul>

                            </nav>

                        </div>


                    </div>

                </div>

                <div class="modal fade border border-dark" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModal" aria-hidden="true">
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

                            <div class="modal-body">

                                <div class="container-img col-lg-12 d-flex justify-content-center">

                                    <img class="mx-auto" src='<?= $teacher->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $teacher->teacher_profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" '>

                                </div>

                                <form id="formUpdateProfilePhoto" method="POST" enctype="multipart/form-data">

                                    <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" id="">

                                    <input type="hidden" id="id" value="<?= $teacher->teacher_id ?>" name="id">

                                    <input type="hidden" id="oldPhoto" name="oldPhoto" value="<?= $teacher->teacher_profile_photo ?>">

                                    <div class="row">

                                        <div class="col-lg-12 mt-3 d-flex justify-content-end">

                                            <button id="updateImg" disabled class="btn btn-success">Atualizar foto</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                            <div class="modal-footer d-flex justify-content-start">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retornar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-8 card main-content col-11 mx-auto">

            <div class="row">

                <div class="col-lg-11 mx-auto collapse show" id="accordion-data-teacher" data-parent="#main-accordion">

                <div class="row">

                    <form id="teacherModal<?= $teacher->teacher_id ?>" class="col-lg-12" action="">

                        <input type="hidden" value="<?= $teacher->teacher_id ?>" name="teacherId">
                        <input type="hidden" value="<?= $teacher->telephone_id_teacher ?>" name="telephoneId">
                        <input type="hidden" value="<?= $teacher->address_id_teacher ?>" name="addressId">
                        <input type="hidden" value="<?= $teacher->address_id_teacher ?>" name="classId">


                        <div class="row mb-3 ml-2 d-flex align-items-center">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-lg-8">Dados do docente</h5>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span idElement="#teacherModal<?= $teacher->teacher_id ?>" formGroup="containerListTeacher" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                        <span idElement="#teacherModal<?= $teacher->teacher_id ?>" routeUpdate="/admin/professor/lista/perfil-professor/atualizar" toastData="Dados atualizados" container="containerListTeacher" routeList="/admin/professor/lista/listagem" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="input-group d-flex col-12 col-lg-9 mt-2 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nome:</span>
                            </div>
                            <input type="text" id="name" name="name" disabled class="form-control" value="<?= $teacher->teacher_name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>


                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CPF:</span>
                            </div>
                            <input type="text" onload="this.value = this.value.mask('000.000.000-00')" id="cpf" name="cpf" disabled class="form-control" value="<?= $teacher->teacher_cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                            </div>

                            <select id="sex" name="sex" disabled class="form-control custom-select">
                                <option value="<?= $teacher->teacher_sex_id ?>"><?= $teacher->teacher_sex ?></option>
                                <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                    <?php if ($sex->option_value != $teacher->teacher_sex_id) { ?>
                                        <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                            </div>
                            <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $teacher->teacher_nacionality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                            </div>
                            <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $teacher->teacher_naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                            </div>
                            <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $teacher->teacher_birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email:</span>
                            </div>
                            <input type="email" id="email" name="email" disabled class="form-control" value="<?= $teacher->email ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">PcD:</span>
                            </div>

                            <select id="pcd" name="pcd" disabled class="form-control custom-select">
                                <option value="<?= $teacher->teacher_pcd_id ?>"><?= $teacher->teacher_pcd ?></option>
                                <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                    <?php if ($pcd->option_value != $teacher->teacher_pcd_id) { ?>
                                        <option value="<?= $pcd->option_value ?>"><?= $pcd->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Tipo sanguíneo:</span>
                            </div>

                            <select id="bloodType" name="bloodType" disabled class="form-control custom-select">
                                <option value="<?= $teacher->blood_type_id_teacher ?>"><?= $teacher->blood_type_teacher ?></option>
                                <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                    <?php if ($bloodType->option_value != $teacher->blood_type_id_teacher) { ?>
                                        <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>


                        <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CEP:</span>
                            </div>
                            <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $teacher->teacher_zipCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">UF:</span>
                            </div>
                            <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $teacher->teacher_uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Município:</span>
                            </div>
                            <input type="text" id="county" name="county" disabled class="form-control" value="<?= $teacher->teacher_county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                            </div>
                            <input type="text" id="district" name="district" disabled class="form-control" value="<?= $teacher->teacher_district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                            </div>
                            <input type="text" id="address" name="address" disabled class="form-control" value="<?= $teacher->teacher_address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Contato:</span>
                            </div>
                            <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $teacher->teacher_telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                    <?php } ?>

                    </form>
                    </div>


                </div>

            </div>

            <div class="col-lg-11 mx-auto collapse" id="class-teacher-accordion" data-parent="#main-accordion">

                <div class="row">

                    <?php if (count($this->view->subjectsThatTeacherTeaches) > 0) {

                        $classVector = [];

                        foreach ($this->view->subjectsThatTeacherTeaches as $key => $data) {

                            $class = [$data->series_acronym, $data->ballot, $data->course, $data->shift_name, $data->classroom_number, $data->class_id];

                            if (!in_array($class, $classVector)) {
                                array_push($classVector, $class);
                            }
                        }

                    ?>


                        <h5 class="col-lg-12 mb-3">Turmas vinculadas</h5>


                        <?php foreach ($classVector as $key => $data) { ?>

                            <div class="col-lg-11 card mt-2 mx-auto mb-3">

                                <div class="row d-flex pl-3 justify-content-space-between">

                                    <div class="col-lg-12">

                                        <div class="teacher-class-title"><?= $data[0] ?>ª <?= $data[1] ?> <?= $data[2] ?> <?= $data[3] ?> - Sala <?= $data[4] ?></div>

                                    </div>

                                    <div class="col-lg-12">

                                        <?php foreach ($this->view->subjectsThatTeacherTeaches as $key => $discipline) {

                                            if ($discipline->class_id == $data[5]) { ?>

                                                <span class="badge text-white p-2 mr-2"><?= $discipline->discipline_name ?></span>

                                        <?php }
                                        } ?>

                                    </div>

                                </div>

                            </div>

                        <?php }
                    } else { ?>

                        <div class="card col-lg-12 card-hover bg-white mb-3">

                            <div class="card-body">
                                <h5 class="card-title text-center"> Vincule uma disciplina a <?= $teacher->teacher_name ?></h5>
                                <p class="card-text d-flex justify-content-end"><a class="btn btn-success mt-3 w-30" href="/admin/gestao/turma">Turmas disponíveis</a></p>
                            </div>

                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>

</div>