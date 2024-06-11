<?php 

require __DIR__ . '../../../../../config/variables.php';

?>

<div class="row mb-4 d-flex justify-content-center" id="main-accordion">

    <?php foreach ($this->view->teacherProfile as $key => $teacher) { ?>

        <?php $photoDir =  "$app_url/assets/img/teacherProfilePhotos/" ?>

        <div class="col-lg-3 col-12 col-sm-4">

            <div class="col-lg-12 modal-sidebar">

                <div class="row p-3">

                    <div class="col-lg-12">

                        <div class="row">

                            <img class="mx-auto" src='<?= $teacher->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $teacher->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"' data-toggle="modal" data-target="#profilePhotoModal">

                            <div class="col-lg-10 col-11 main-sheet mx-auto">
                                <div class="row p-3"><span class="col-lg-12"><?= $teacher->name ?> - <?= count($this->view->subjectsThatTeacherTeaches) ?> disciplinas ativas</span></div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12 container-list-group p-0">

                                <nav>

                                    <ul>

                                        <a href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-teacher">
                                            <span class="box-icon"><i class="fas fa-user"></i></span> Dados do docente
                                        </a>

                                        <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-teacher-accordion">
                                            <span class="box-icon"><i class="fas fa-chalkboard-teacher"></i></span> Turmas
                                        </a>

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

                                        <img class="mx-auto" src='<?= $teacher->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $teacher->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" '>

                                    </div>

                                    <form class="" id="formUpdateProfilePhoto" method="POST" enctype="multipart/form-data">

                                        <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" id="">

                                        <input type="hidden" id="id" value="<?= $teacher->id ?>" name="id">

                                        <input type="hidden" id="oldPhoto" name="oldPhoto" value="<?= $teacher->profile_photo ?>">

                                        <div class="row">

                                            <div class="col-lg-12 mt-3 d-flex justify-content-end">

                                                <button id="updateImg" type="submit" disabled class="btn btn-success">Atualizar foto</button>

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

        </div>

        <div class="col-lg-9 col-sm-8 col-12 mx-auto">

            <div class="col-lg-12 card main-content">

                <div class="row">

                    <div class="col-lg-11 mx-auto collapse show" id="accordion-data-teacher" data-parent="#main-accordion">

                        <div class="row">

                            <form id="teacherModal<?= $teacher->id ?>" class="col-lg-12" action="">

                                <input type="hidden" value="<?= $teacher->id ?>" name="teacherId">
                                <input type="hidden" value="<?= $teacher->telephone_id ?>" name="telephoneId">
                                <input type="hidden" value="<?= $teacher->address_id ?>" name="addressId">


                                <div class="row mb-3 ml-2 d-flex align-items-center">

                                    <div class="col-lg-12">

                                        <div class="row d-flex align-items-center">

                                            <h5 class="col-8">Dados do docente</h5>

                                            <div class="col-4 d-flex justify-content-end">

                                                <span idElement="#teacherModal<?= $teacher->id ?>" formGroup="containerListTeacher" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit"></i></span>

                                                <span idElement="#teacherModal<?= $teacher->id ?>" routeUpdate="/admin/professor/lista/perfil-professor/atualizar" toastData="Dados atualizados" routeData="#teacherModal<?= $teacher->id ?>" container="containerTeacherProfileModal" routeList="/admin/professor/lista/perfil-professor" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="top" title="Atualizar"><i class="fas fa-check"></i></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <div class="input-group d-flex col-12 col-lg-9 mt-2 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Nome:</span>
                                    </div>
                                    <input type="text" id="name" name="name" disabled class="form-control" value="<?= $teacher->name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>


                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">CPF:</span>
                                    </div>
                                    <input type="text" onload="this.value = this.value.mask('000.000.000-00')" id="cpf" name="cpf" disabled class="form-control" value="<?= $teacher->cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                                    </div>

                                    <select id="sex" name="sex" disabled class="form-control custom-select">
                                        <option value="<?= $teacher->sex_id ?>"><?= $teacher->sex ?></option>
                                        <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                            <?php if ($sex->option_value != $teacher->sex_id) { ?>
                                                <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                        <?php }
                                        } ?>
                                    </select>

                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                                    </div>
                                    <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $teacher->nationality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                                    </div>
                                    <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $teacher->naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                                    </div>
                                    <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $teacher->birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
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
                                        <option value="<?= $teacher->pcd_id ?>"><?= $teacher->pcd ?></option>
                                        <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                            <?php if ($pcd->option_value != $teacher->pcd_id) { ?>
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
                                        <option value="<?= $teacher->blood_type_id ?>"><?= $teacher->blood_type ?></option>
                                        <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                            <?php if ($bloodType->option_value != $teacher->blood_type_id) { ?>
                                                <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                        <?php }
                                        } ?>
                                    </select>

                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Situação da conta:</span>
                                    </div>

                                    <select id="accountState" name="accountState" disabled class="form-control custom-select">
                                        <option value="<?= $teacher->account_state_id ?>"><?= $teacher->account_state ?></option>
                                        <?php foreach ($this->view->accountStates as $key => $account) { ?>
                                            <?php if ($account->option_value != $teacher->account_state_id) { ?>
                                                <option value="<?= $account->option_value ?>"><?= $account->option_text ?></option>
                                        <?php }
                                        } ?>
                                    </select>

                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Data de cadastro no cólegio:</span>
                                    </div>
                                    <input id="" name="" type="text" disabled class="form-control" value="<?= date("d/m/Y - H:i:s", strtotime($teacher->initial_enrollment_date)) ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Código de acesso ao portal:</span>
                                    </div>
                                    <input id="accessCode" name="accessCode" type="password" disabled class="form-control" value="<?= $teacher->access_code ?>" maxlength="30" aria-label="Username" aria-describedby="addon-wrapping">
                                    <div class="input-group-append">
                                        <div class="input-group-text input-group-accessCode"><i class="fas fa-eye-slash"></i></div>
                                    </div>
                                </div>


                                <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">CEP:</span>
                                    </div>
                                    <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $teacher->zip_code ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">UF:</span>
                                    </div>
                                    <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $teacher->uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Município:</span>
                                    </div>
                                    <input type="text" id="county" name="county" disabled class="form-control" value="<?= $teacher->county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                                    </div>
                                    <input type="text" id="district" name="district" disabled class="form-control" value="<?= $teacher->district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                                    </div>
                                    <input type="text" id="address" name="address" disabled class="form-control" value="<?= $teacher->address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>

                                <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Contato:</span>
                                    </div>
                                    <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $teacher->telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>



                            <?php } ?>

                            </form>
                        </div>


                    </div>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-teacher-accordion" data-parent="#main-accordion">

                    <div class="col-lg-12 mb-3">

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


                                <div class="col-lg-12 p-0">
                                    <h5 class='mt-2'>Turmas vinculadas</h5>
                                </div>


                                <?php foreach ($classVector as $key => $data) { ?>

                                    <div class="col-lg-12 card mt-2 mb-3 p-2 pl-3">

                                        <div class="row d-flex justify-content-space-between">

                                            <div class="col-lg-5">

                                                <div class="teacher-class-title"><?= $data[0] ?>ª <?= $data[1] ?> <?= $data[2] ?> <?= $data[3] ?> - Sala <?= $data[4] ?></div>

                                            </div>

                                            <div class="col-lg-7">

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

                                <h5>Docente não está vinculado a nenhuma turma</h5>

                                <div class="col-lg-12 mt-3">

                                    <img class="link_discipline d-block mx-auto" src="<?= $app_url ?>/assets/img/illustrations/link_discipline.svg" alt="">

                                </div>

                                <div class="col-lg-12 d-flex justify-content-center mt-4">

                                    <a href="/admin/gestao/turma" class="btn btn-success">Ir para turmas</a>

                                </div>

                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>
        </div>

</div>