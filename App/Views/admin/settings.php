<?php 
require __DIR__ . '../../../config/variables.php';
?>

<div class="row mb-4 d-flex justify-content-center" id="main-accordion-settings">

    <div class="col-lg-3 col-12 col-sm-4">

        <div class="col-lg-12 modal-sidebar">

            <div class="row p-3">

                <div class="col-lg-12">

                    <div class="row">

                        <?php $photoDir =  "$app_url/assets/img/adminProfilePhotos/" ?>

                        <img class="mx-auto" src='<?= $this->view->data[0]->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->data[0]->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' data-toggle="modal" <?= $this->view->modalType != 'data-and-config' ? 'data-target="#profilePhotoModal"' : '' ?>>

                        <div class="col-lg-10 mx-auto main-sheet">
                            <div class="row p-3">
                                <span class="col-lg-12"><?= $this->view->data[0]->name ?></span>
                                <span class="col-lg-12"><?= $this->view->data[0]->hierarchy_function ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 container-list-group p-0">

                            <nav>

                                <ul>

                                    <a class="collapse" href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-admin">
                                        <span class="box-icon"><i class="fas fa-user"></i></span> Dados gerais</a>


                                    <?php if ($this->view->modalType == 'data-and-config' && $_SESSION['Admin']['hierarchyFunction'] == 1) {

                                    ?>

                                        <a class="collapse show" href="#" data-toggle="collapse" aria-expanded="false" data-target="#accordion-settings">
                                            <span class="box-icon"><i class="fas fa-cogs"></i></span> Configurações</a>


                                    <?php } ?>

                                    <?php if ($this->view->modalType == 'data-and-config') { ?>

                                        
                                        <a class="collapse" href="#" data-toggle="collapse" aria-expanded="false" data-target="#accordion-interface-admin">
                                            <span class="box-icon"><i class="fas fa-magic"></i></span> Interface</a>

                                    <?php } ?>

                                </ul>

                            </nav>
                        </div>
                    </div>
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

                            <img data-toggle="tooltip" data-placement="left" title="Para editar a foto de perfil do administrador, clique na área da imagem" class="mx-auto" src='<?= $this->view->data[0]->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->data[0]->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' style="border-radius: 50%; cursor: pointer">

                        </div>

                        <form id="formUpdateProfilePhoto" method="POST" enctype="multipart/form-data">

                            <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*">

                            <input type="hidden" id="id" value="<?= $this->view->data[0]->id ?>" name="id">

                            <input type="hidden" id="oldPhoto" name="oldPhoto" value="<?= $this->view->data[0]->profile_photo ?>">

                            <div class="row">

                                <div class="col-lg-12 mt-3 d-flex justify-content-end">

                                    <button id="updateImgAdmin" type='submit' disabled class="btn btn-success">Atualizar foto</button>

                                </div>

                            </div>

                        </form>

                    </div>


                </div>
            </div>
        </div>

    </div>


    <div class="col-lg-9 col-sm-8 col-12 mx-auto">

        <div class="col-lg-12 card main-content">

            <div class="row">

                <?php if ($this->view->modalType == 'data-and-config') { ?>

                    <div class="col-11 mx-auto collapse" id="accordion-settings" data-parent="#main-accordion-settings">

                        <div class="row">

                            <form class="col-lg-11 mx-auto" action="" id="formSettings">

                                <div class="form-row d-flex align-items-center">

                                    <h5 class="col-8 p-0">Configurações</h5>

                                    <div class="col-4 d-flex justify-content-end">

                                        <span idElement="#formSettings" formGroup="containerSettingsModal" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit"></i></span>

                                        <span idElement="#formSettings" routeUpdate="/admin/configuracoes/atualizar" toastData="Configurações atualizadas" routeData="#formSettings" container="containerSettingsModal" routeList="/admin/configuracoes" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="top" title="Atualizar"><i class="fas fa-check"></i></span>

                                    </div>

                                </div>

                                <div class="form-group mt-4 d-flex align-items-center">

                                    <label class="col-lg-5 p-0" for="">Rematrículas: </label>

                                    <div class="col-lg-7">

                                        <select class="custom-select form-control" disabled name="controlRematrug">

                                            <option value="<?= $this->view->currentStatusRematrium[0]->option_value ?>"><?= $this->view->currentStatusRematrium[0]->option_text ?></option>

                                            <?php foreach ($this->view->registrationControlOptions as $key => $value) { ?>

                                                <?php if ($value->option_value != $this->view->currentStatusRematrium[0]->option_value) { ?>

                                                    <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>


                                </div>

                                <div class="form-group d-flex align-items-center p-0">

                                    <label class="col-lg-5 p-0" for="">Unidades liberadas para edição:</label>

                                    <div class="col-lg-7">

                                        <select class="custom-select form-control" disabled name="controlUnity">

                                            <option value="<?= $this->view->unitControlCurrent[0]->option_value ?>"><?= $this->view->unitControlCurrent[0]->option_text ?></option>

                                            <?php foreach ($this->view->unitControlList as $key => $value) { ?>
                                                <?php if ($value->option_value != $this->view->unitControlCurrent[0]->option_value) { ?>
                                                    <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                <?php } ?>

                <?php foreach ($this->view->data as $key => $admin) { ?>

                    <div class="col-lg-11 mx-auto collapse show" id="accordion-data-admin" data-parent="#main-accordion-settings">

                        <form id="adminDate<?= $admin->id ?>" class="col-lg-12" action="">

                            <input type="hidden" value="<?= $admin->id ?>" name="adminId">
                            <input type="hidden" value="<?= $admin->telephone_id ?>" name="telephoneId">
                            <input type="hidden" value="<?= $admin->address_id ?>" name="addressId">

                            <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                                <div class="col-lg-12">

                                    <div class="row d-flex align-items-center">

                                        <h5 class="col-8">Dados pessoais</h5>

                                        <div class="col-4 d-flex justify-content-end">

                                            <span idElement="#adminDate<?= $admin->id ?>" formGroup="containerSettingsModal" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit"></i></span>

                                            <span idElement="#adminDate<?= $admin->id ?>" routeUpdate="/admin/configuracoes/perfil/atualizar" toastData="Dados atualizados" routeData="#adminDate<?= $admin->id ?>" container="containerSettingsModal" routeList="/admin/configuracoes" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="top" title="Atualizar"><i class="fas fa-check"></i></span>

                                        </div>

                                    </div>

                                </div>


                            </div>


                            <div class="input-group d-flex col-12 col-lg-11 mt-2 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nome:</span>
                                </div>
                                <input type="text" id="name" name="name" disabled class="form-control" value="<?= $admin->name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>


                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">CPF:</span>
                                </div>
                                <input type="text" onload="this.value = this.value.mask('000.000.000-00')" id="cpf" name="cpf" disabled class="form-control" value="<?= $admin->cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                                </div>

                                <select id="sex" name="sex" disabled class="form-control custom-select">
                                    <option value="<?= $admin->sex_id ?>"><?= $admin->sex ?></option>
                                    <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                        <?php if ($sex->option_value != $admin->sex_id) { ?>
                                            <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                                </div>
                                <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $admin->nationality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                                </div>
                                <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $admin->naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                                </div>
                                <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $admin->birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">PcD:</span>
                                </div>

                                <select id="pcd" name="pcd" disabled class="form-control custom-select">
                                    <option value="<?= $admin->pcd_id ?>"><?= $admin->pcd ?></option>
                                    <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                        <?php if ($pcd->option_value != $admin->pcd_id) { ?>
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
                                    <option value="<?= $admin->blood_type_id ?>"><?= $admin->blood_type ?></option>
                                    <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                        <?php if ($bloodType->option_value != $admin->blood_type_id) { ?>
                                            <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Código de acesso ao portal:</span>
                                </div>
                                <input id="accessCode" name="accessCode" type="password" disabled class="form-control" value="<?= $admin->access_code ?>" maxlength="30" aria-label="Username" aria-describedby="addon-wrapping">
                                <div class="input-group-append">
                                    <div class="input-group-text input-group-accessCode"><i class="fas fa-eye-slash"></i></div>
                                </div>
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Hierarquia no sistema:</span>
                                </div>


                                <select id="hierarchyFunction" name="hierarchyFunction" disabled class="form-control custom-select">
                                    <option value="<?= $admin->hierarchy_function_id ?>"><?= $admin->hierarchy_function ?></option>

                                    <?php

                                    if ($this->view->adminCurrentHierarchy == 1) {

                                        foreach ($this->listHierarchyFunction as $key => $value) { ?>
                                            <?php if ($value->option_value != $admin->hierarchy_function_id) { ?>
                                                <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                                    <?php }
                                        }
                                    } ?>
                                </select>

                            </div>


                            <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Situação da conta:</span>
                                </div>

                                <select id="accountState" name="accountState" disabled class="form-control custom-select">
                                    <option value="<?= $admin->account_state_id ?>"><?= $admin->account_state ?></option>
                                    <?php foreach ($this->view->accountStates as $key => $account) { ?>
                                        <?php if ($account->option_value != $admin->account_state_id) { ?>
                                            <option value="<?= $account->option_value ?>"><?= $account->option_text ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </div>


                            <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">CEP:</span>
                                </div>
                                <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $admin->zip_code ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">UF:</span>
                                </div>
                                <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $admin->uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Município:</span>
                                </div>
                                <input type="text" id="county" name="county" disabled class="form-control" value="<?= $admin->county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                                </div>
                                <input type="text" id="district" name="district" disabled class="form-control" value="<?= $admin->district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                                </div>
                                <input type="text" id="address" name="address" disabled class="form-control" value="<?= $admin->address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>


                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Telefone: </span>
                                </div>
                                <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $admin->telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>

                            <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Email: </span>
                                </div>
                                <input id="email" name="email" type="text" disabled class="form-control" value="<?= $admin->email ?>" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>



                        <?php } ?>

                        </form>

                    </div>

                    <div class="col-11 mx-auto collapse" id="accordion-interface-admin" data-parent="#main-accordion-settings">

                        <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-8 p-0">Interface do portal</h5>

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-11 ml-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="nightMode" portal="Admin">
                                <label class="custom-control-label" for="nightMode">Modo Noturno</label>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>

        </div>

    </div>

</div>