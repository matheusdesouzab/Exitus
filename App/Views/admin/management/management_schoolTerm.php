<div id="term-management">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="accordion-period">

            <div class="col-lg-12 mb-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão dos períodos letivos</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-terms"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Períodos</span></a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-school-term"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row d-flex justify-content-between mb-3">

                    <div class="col-lg-12">

                        <div class="collapse show" id="list-terms" data-parent="#accordion-period">
                            <div class="row">
                                <div class="col-lg-12">

                                    <?php foreach ($this->view->listSchoolTerm as $idSchoolTerm => $schoolTerm) { ?>

                                        <form class="card mb-3" action="">

                                            <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                                                <div class="col-lg-8 font-weight-bold">Ano letivo <?= $schoolTerm['school_year'] ?></div>

                                                <div class="col-lg-4 d-flex justify-content-end mt-2">

                                                    <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                                                    <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>


                                                </div>

                                            </div>

                                            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Período letivo:</label>
                                                    <input class="form-control" disabled value="<?= $schoolTerm['school_year'] ?>" type="text" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de início:</label>
                                                    <input class="form-control" disabled value="<?= $schoolTerm['start_date'] ?>" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de fim:</label>
                                                    <input class="form-control" disabled value="<?= $schoolTerm['end_date'] ?>" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Situação:</label>
                                                    <input class="form-control" disabled value="<?= $schoolTerm['situation_school_term'] ?>" type="text" name="" id="">
                                                </div>

                                            </div>

                                        </form>


                                    <?php } ?>




                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="add-school-term" data-parent="#accordion-period">

                            <div class="row">

                                <div class="col-lg-12 card ">

                                    <form id="addSchoolTerm" class="col-11 mx-auto mt-3 mb-3" action="" method="POST">

                                        <div class="row mt-2">
                                            <div class="font-weight-bold col-lg-12">Período letivo do ano de <?= $this->view->lastSchoolTerm[0]['school_year'] + 1 ?>:</div>
                                        </div>

                                        <div class="form-row mt-4 mb-2">

                                            <input class="form-control" name="schoolYear" value="<?= $this->view->lastSchoolTerm[0]['school_year'] + 1 ?>" type="hidden">

                                            <div class="form-group col-lg-3">
                                                <label for="">Data de início:</label>
                                                <input name="startDate" class="form-control" value="" type="date" id="">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="">Data de fim:</label>
                                                <input name="endDate" class="form-control" value="" type="date" id="">
                                            </div>


                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Situação:</label>
                                                <select name="schoolTermSituation" id="inputState" class="form-control custom-select" required>

                                                    <?php foreach ($this->view->listSchoolTermSituation as $key => $TermSituation) { ?>
                                                        <option value="<?= $TermSituation['id_situacao_periodo_letivo'] ?>"><?= $TermSituation['situacao_periodo_letivo'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="">&nbsp;</label>
                                                <a id="buttonAddSchoolTerm" type="submit" class="btn btn-success w-100 text-center" href="#">Adicionar</a>
                                            </div>



                                        </div>



                                    </form>

                                    <div class="modal fade" id="addSchoolTermModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="modal-title font-weight-bold"></div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                    </div>
                                                    <div class="col-lg-12 mb-5 container-icon d-flex justify-content-center">

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>


        </div>



    </div>

</div>

</div>


</div>