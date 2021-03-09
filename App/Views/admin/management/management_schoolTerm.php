<div id="school-term-management">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="accordion-period">

            <div class="col-lg-12 mb-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão dos períodos letivos</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a href="#" class="font-weight-bold" id="collapseListSchoolTerm" aria-expanded="true" data-toggle="collapse" data-target="#list-terms"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Períodos</span></a>

                        <a href="#" class="collapsed font-weight-bold" id="collapseAddListSchoolTerm" aria-expanded="false" data-toggle="collapse" data-target="#add-school-term"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row d-flex justify-content-between mb-3">

                    <div class="col-lg-12">

                        <div class="collapse show" id="list-terms" data-parent="#accordion-period">
                            <div class="row">
                                <div id="containerListSchoolTerm" class="col-lg-12">
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="add-school-term" data-parent="#accordion-period">

                            <div class="row">

                                <div class="col-lg-12 card ">

                                    <form id="addSchoolTerm" class="col-11 mx-auto mt-3 mb-3" action="" method="POST">

                                        <div class="row mt-2">
                                            <div class="font-weight-bold col-lg-12">Período letivo do ano de <span id="schoolYear"></span> :</div>
                                        </div>

                                        <div class="form-row mt-4 mb-2">

                                            <input class="form-control schoolYear" name="schoolYear" value="" type="hidden">

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
                                                <a id="buttonAddSchoolTerm"  type="submit" class="btn btn-success w-100 text-center" href="#">Adicionar</a>
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