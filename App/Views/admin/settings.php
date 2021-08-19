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

                    <h5 class="col-lg-12 mb-3">Controles</h5>

                    <form class="col-lg-12" action="">

                            <div class="form-group row border">
                                <div class="custom-control custom-switch">           
                                    <div class="col-lg-2"><input type="checkbox" class="custom-control-input" id="customSwitch1"></div>
                                    <label class="custom-control-label col-lg-12 border" for="customSwitch1">Abrir rematrícula</label> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-7" for="">Unidades liberadas para edição</label>

                                <select class="custom-select col-lg-5">

                                    <option value="<?= $this->view->unitControlCurrent[0]->option_value ?>"><?= $this->view->unitControlCurrent[0]->option_text ?></option>
                                    
                                    <?php foreach ($this->view->unitControlList as $key => $value) { ?>
                                        <?php if ($value->option_value != $this->view->unitControlCurrent[0]->option_value) { ?>
                                            <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                                    <?php }} ?>

                                </select>

                            </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>