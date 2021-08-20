<div class="row mb-4 d-flex justify-content-around" id="main-accordion-class">

    <div class="col-lg-3 col-11 mx-auto">

        <div class="row card">

            <div class="col-lg-12 container-list-group">

                <div class="row">

                    <nav>

                        <ul>

                            <a class="collapse show" href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-settings">Controles</a>

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

    </div>

    <div class="col-lg-8 card main-content col-11 mx-auto">

        <div class="row">

            <div class="col-lg-11 show mx-auto collapse" id="accordion-settings" data-parent="#main-accordion-class">

                <div class="row">

                    <form class="col-lg-11 mx-auto" action="" id="formSettings">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="row d-flex align-items-center">

                                    <h5 class="col-lg-8 mb-3 p-0">Controles</h5>

                                    <div class="col-lg-4 d-flex justify-content-end">

                                        <span idElement="#formSettings" formGroup="containerSettingsModal" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                       <span idElement="#formSettings" routeUpdate="/admin/configuracoes/atualizar" toastData="Dados atualizados" routeData="#formSettings" container="containerSettingsModal" routeList="/admin/configuracoes" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span> 

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" disabled class="custom-control-input" id="customSwitch1" checked>
                                <label class="custom-control-label" for="customSwitch1">Liberar rematrícula para os alunos</label>
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center p-0">

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

        </div>

    </div>

</div>