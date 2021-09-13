<div class="row mb-4 d-flex justify-content-around" id="main-accordion-settings">

    <div class="col-lg-3 col-11 mx-auto modal-sidebar">

        <div class="row">

            <div class="col-lg-12 container-list-group">

                <div class="row">

                    <?php $photoDir =  "/assets/img/adminProfilePhotos/" ?>

                    <img class="mx-auto mb-2" src='<?= $this->view->Data[0]->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->Data[0]->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' data-toggle="modal" data-target="#profilePhotoModal">

                    <div class="col-lg-12 main-sheet d-none d-sm-block">
                        <div class="row p-3">
                            <span class="col-lg-12"><?= $this->view->Data[0]->name ?></span>
                            <span class="col-lg-12"><?= $this->view->Data[0]->hierarchyFunction ?></span>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <nav>

                        <ul>

                            <a class="collapse" href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-data-admin">Seu perfil</a>

                            <a class="collapse show" href="#" data-toggle="collapse" aria-expanded="false" data-target="#accordion-settings">Configurações</a>

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

                    <form id="formUpdateProfilePhoto" method="POST" enctype="multipart/form-data">

                        <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" id="">

                        <input type="hidden" id="id" value="<?= $this->view->Data[0]->id ?>" name="id">

                        <input type="hidden" id="oldPhoto" name="oldPhoto" value="<?= $this->view->Data[0]->profilePhoto ?>">

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

    


    <div class="col-lg-8 card main-content col-11 mx-auto">

        <div class="row">

            <div class="col-lg-11 mx-auto collapse" id="accordion-settings" data-parent="#main-accordion-settings">

                <div class="row">

                    <form class="col-lg-11 mx-auto" action="" id="formSettings">

                        <div class="form-row d-flex align-items-center">

                            <h5 class="col-lg-8 p-0">Configurações</h5>

                            <div class="col-lg-4 d-flex justify-content-end">

                                <span idElement="#formSettings" formGroup="containerSettingsModal" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                <span idElement="#formSettings" routeUpdate="/admin/configuracoes/atualizar" toastData="Configurações atualizadas" routeData="#formSettings" container="containerSettingsModal" routeList="/admin/configuracoes" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

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

            <?php foreach ($this->view->Data as $key => $admin) { ?>

                <div class="col-lg-11 mx-auto collapse show" id="accordion-data-admin" data-parent="#main-accordion-settings">

                    <form id="adminDate<?= $admin->id ?>" class="col-lg-12" action="">

                        <input type="hidden" value="<?= $admin->id ?>" name="id">
                        <input type="hidden" value="<?= $admin->telephoneId ?>" name="telephoneId">
                        <input type="hidden" value="<?= $admin->addressId ?>" name="addressId">

                        <div class="row mb-3 mt-2 ml-2 d-flex align-items-center">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-lg-8">Dados pessoais</h5>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span idElement="#adminDate<?= $admin->id ?>" formGroup="containerSettingsModal" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                        <span idElement="#adminDate<?= $admin->id ?>" routeUpdate="/admin/configuracoes/perfil/atualizar" toastData="Dados atualizados" routeData="#adminDate<?= $admin->id ?>" container="containerSettingsModal" routeList="/admin/configuracoes" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

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
                                <option value="<?= $admin->sexId ?>"><?= $admin->sex ?></option>
                                <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                    <?php if ($sex->option_value != $admin->sexId) { ?>
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
                            <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $admin->birthDate ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">PcD:</span>
                            </div>

                            <select id="pcd" name="pcd" disabled class="form-control custom-select">
                                <option value="<?= $admin->pcdId ?>"><?= $admin->pcd ?></option>
                                <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                    <?php if ($pcd->option_value != $admin->pcdId) { ?>
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
                                <option value="<?= $admin->bloodTypeId ?>"><?= $admin->bloodType ?></option>
                                <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                    <?php if ($bloodType->option_value != $admin->bloodTypeId) { ?>
                                        <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Código de acesso ao portal:</span>
                            </div>
                            <input id="accessCode" name="accessCode" type="text" disabled class="form-control" value="<?= $admin->accessCode ?>" aria-label="Username" aria-describedby="addon-wrapping" style="pointer-events:none">
                        </div>

                        <div class="input-group d-flex justify-content-start col-lg-9 flex-nowrap">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Hierarquia no sistema:</span>
                            </div>

                            <select id="hierarchyFunction" name="hierarchyFunction" disabled class="form-control custom-select">
                                <option value="<?= $admin->hierarchyFunctionId ?>"><?= $admin->hierarchyFunction ?></option>
                                <?php foreach ($this->listHierarchyFunction as $key => $value) { ?>
                                    <?php if ($value->option_value != $admin->hierarchyFunctionId) { ?>
                                        <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                                <?php }
                                } ?>
                            </select>

                        </div>


                        <h5 class="mt-5 mb-3 ml-4">Endereço e contato:</h5>

                        <div class="input-group d-flex justify-content-start col-lg-11 flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">CEP:</span>
                            </div>
                            <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $admin->zipCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
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
                            <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $admin->telephoneNumber ?>" aria-label="Username" aria-describedby="addon-wrapping">
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

        </div>

    </div>

</div>