<section id="schoolTerm">

    <div class="row main-container ">

        <div class="col-lg-11 mx-auto accordion" id="accordion-school-term">

            <div class="row d-flex align-items-center mt-3 mb-1">

                <div class="col-lg-6">

                    <div class="col-lg-12">
                        <h5>Gestão dos períodos letivos</h5>
                    </div>

                </div>

                <div class="col-lg-6 collapse-options-container ">

                    <a href="#" class="font-weight-bold" id="collapseListSchoolTerm" aria-expanded="true" data-toggle="collapse" data-target="#list-terms">
                        <span class="mr-2"><i class="fas fa-boxes mr-2"></i> Períodos</span>
                    </a>

                    <a href="#" class="collapsed font-weight-bold" id="collapseAddSchoolTerm" aria-expanded="false" data-toggle="collapse" data-target="#add-school-term">
                        <span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span>
                    </a>

                </div>

                <nav class="col-lg-12" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Gestão geral</a></li>
                        <li class="breadcrumb-item active">Período letivo</li>
                    </ol>
                </nav>
            </div>



            <div class="col-lg-12">

                <div class="row d-flex justify-content-between mb-3">

                    <div class="col-lg-12">

                        <div class="collapse show" id="list-terms" data-parent="#accordion-school-term">
                            <div class="row">
                                <div containerListSchoolTerm class="col-lg-12">
                                    <?php require '../App/Views/admin/management/components/schoolTermsList.php' ?>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="add-school-term" data-parent="#accordion-school-term">

                            <div class="row">

                                <div class="col-lg-12 card ">

                                    <form id="addSchoolTerm" class="col-11 mx-auto mt-3 mb-3">

                                        <div class="row mt-2">
                                            <div class="font-weight-bold col-lg-12">Adicionar novo período letivo:</div>
                                        </div>

                                        <div class="form-row mt-4 mb-2">

                                            <div class="form-group col-lg-2">
                                                <label for="schoolYear">Ano:</label>
                                                <select name="schoolYear" id="schoolYear" class="form-control custom-select" required></select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="startDate">Data de início:</label>
                                                <input name="startDate" class="form-control" value="" type="date" id="startDate">
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="endDate">Data de fim:</label>
                                                <input name="endDate" class="form-control" value="" type="date" id="endDate">
                                            </div>


                                            <div class="form-group col-lg-2">

                                                <label for="schoolTermSituationAdd">Situação:</label>

                                                <select name="schoolTermSituationAdd" id="schoolTermSituationAdd" class="form-control custom-select" required>

                                                    <?php foreach ($this->view->listSchoolTermStates as $i => $situation) { ?>
                                                        <option value="<?= $situation->option_value ?>"><?= $situation->option_text ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label>&nbsp;</label>
                                                <a id="buttonAddSchoolTerm" type="submit" class="btn btn-success w-100 text-center" href="#">Adicionar</a>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>