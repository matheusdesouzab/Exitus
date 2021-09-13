<div class="row mb-4 d-flex justify-content-around" id="main-accordion-class">

    <div class="col-lg-3 col-11 mx-auto modal-sidebar">

        <div class="row">

            <div class="col-lg-12 container-list-group">

                <div class="row">

                    <?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

                    <img class="mx-auto mb-2" src='<?= $this->view->Data[0]->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->Data[0]->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' data-toggle="modal" data-target="#profilePhotoModal">

                    <div class="col-lg-12 main-sheet d-none d-sm-block">
                        <div class="row p-3">
                            <span class="col-lg-12"><?= $this->view->Data[0]->teacher_name ?></span>
                            <span class="col-lg-12"><?= $this->view->Data[0]->hierarchyFunction ?></span>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <nav>

                        <ul>

                            <a class="collapse" href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-admin">Seu perfil</a>

                        </ul>

                    </nav>
                </div>
            </div>

            <!--  <div class="col-lg-12">

                <div class="row p-3 text-secondary main-sheet">

                    <div class="col-lg-12">

                        <div class="row">

                            999999999999

                        </div>
                    </div>

                </div>

            </div> -->

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

                        <img class="mx-auto" src='<?= $this->view->Data[0]->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->Data[0]->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" '>

                    </div>

                </div>


            </div>
        </div>
    </div>

    </div>

    


    <div class="col-lg-8 card main-content col-11 mx-auto">

        <div class="row">

            <?php foreach ($this->view->Data as $key => $teacher) { ?>

                <div class="col-lg-11 mx-auto collapse show" id="accordion-data-admin" data-parent="#main-accordion-class">

                    <form id="adminDate<?= $teacher->teacher_id ?>" class="col-lg-12" action="">

                        <input type="hidden" value="<?= $teacher->teacher_id ?>" name="id">
                        <input type="hidden" value="<?= $teacher->telephone_id_teacher?>" name="telephoneId">
                        <input type="hidden" value="<?= $teacher->teacher_address_id ?>" name="addressId">

                        <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-lg-8">Dados pessoais</h5>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span idElement="#adminDate<?= $teacher->teacher_id ?>" formGroup="containerSettingsModal" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                        <span idElement="#adminDate<?= $teacher->teacher_id ?>" routeUpdate="/portal-docente/perfil/atualizar" toastData="Dados atualizados" routeData="#adminDate<?= $teacher->teacher_id ?>" container="containerSettingsModal" routeList="/portal-docente/configuracoes" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                    </div>

                                </div>

                            </div>


                        </div>


                        <div class="input-group d-flex col-12 col-lg-11 mt-2 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nome:</span>
                            </div>
                            <input type="text" id="name" name="name" disabled class="form-control" value="<?= $teacher->teacher_name ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>


                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CPF:</span>
                            </div>
                            <input type="text" onload="this.value = this.value.mask('000.000.000-00')" id="cpf" name="cpf" disabled class="form-control" value="<?= $teacher->teacher_cpf ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

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

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                            </div>
                            <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $teacher->teacher_nationality ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                            </div>
                            <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $teacher->teacher_naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                            </div>
                            <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $teacher->teacher_birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

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

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Tipo sanguíneo:</span>
                            </div>

                            <select id="bloodType" name="bloodType" disabled class="form-control custom-select" style="pointer-events:none">
                                <option value="<?= $teacher->blood_type_id_teacher ?>"><?= $teacher->blood_type_teacher ?></option>
                                <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                    <?php if ($bloodType->option_value != $teacher->blood_type_id_teacher ) { ?>
                                        <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Código de acesso ao portal:</span>
                            </div>
                            <input id="accessCode" name="accessCode" type="text" disabled class="form-control" value="<?= $teacher->accessCode ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Hierarquia no sistema:</span>
                            </div>

                            <input id="hierarchyFunction" name="hierarchyFunction" type="text" disabled class="form-control" value="<?= $teacher->hierarchyFunction ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">

                        </div>


                        <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CEP:</span>
                            </div>
                            <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $teacher->teacher_zipCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">UF:</span>
                            </div>
                            <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $teacher->teacher_uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Município:</span>
                            </div>
                            <input type="text" id="county" name="county" disabled class="form-control" value="<?= $teacher->teacher_county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                            </div>
                            <input type="text" id="district" name="district" disabled class="form-control" value="<?= $teacher->teacher_district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                            </div>
                            <input type="text" id="address" name="address" disabled class="form-control" value="<?= $teacher->teacher_address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>


                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Telefone: </span>
                            </div>
                            <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $teacher->teacher_telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Email: </span>
                            </div>
                            <input id="email" name="email" type="text" disabled class="form-control" value="<?= $teacher->email ?>" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>



                    <?php } ?>

                    </form>



                </div>

        </div>

    </div>

</div>