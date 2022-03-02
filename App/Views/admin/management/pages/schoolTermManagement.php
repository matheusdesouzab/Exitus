<section id="schoolTerm">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="accordion-school-term">

            <div class="row mt-3 page-header">

                <div class="col-11 col-lg-12 mx-auto">

                    <div class="row d-flex align-items-center">

                        <h5 class="col-sm-6">Gestão dos períodos letivos</h5>

                        <div class="col-sm-6">

                            <div class="row collapse-options-container">                     

                            <a href="#" class="font-weight-bold" id="collapseListSchoolTerm" aria-expanded="true" data-toggle="collapse" data-target="#list-terms">
                                <span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i>Períodos</span>
                            </a>

                            <a href="#" class="collapsed font-weight-bold" id="collapseAddSchoolTerm" aria-expanded="false" data-toggle="collapse" data-target="#add-school-term">
                                <span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span>
                            </a>

                            </div>

                        </div>

                        <nav class="col-lg-12 col-11 p-0" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/gestao">Gestão geral</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Período letivo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 col-11 mx-auto">

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

                                    <div class="col-lg-12">

                                        <form id="addSchoolTerm" class="card">

                                            <div class="font-weight-bold col-lg-11 mt-3">Adicionar novo período letivo</div>

                                            <hr class="col-lg-11 ml-3">

                                            <div class="form-row col-lg-12 mb-2 mt-1">

                                                <div class="form-group col-sm-6 col-lg-2">
                                                    <label for="schoolYear">Ano:</label>
                                                    <select name="schoolYear" id="schoolYear" class="form-control custom-select" required></select>
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-3">
                                                    <label for="startDate">Data de início:</label>
                                                    <input name="startDate" class="form-control" value="" type="date" id="startDate">
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-3">
                                                    <label for="endDate">Data de fim:</label>
                                                    <input name="endDate" class="form-control" value="" type="date" id="endDate">
                                                </div>


                                                <div class="form-group col-sm-4 col-lg-2">

                                                    <label for="schoolTermSituationAdd">Situação:</label>

                                                    <select name="schoolTermSituationAdd" id="schoolTermSituationAdd" class="form-control custom-select" required>

                                                        <?php foreach ($this->view->listSchoolTermStates as $i => $situation) { ?>
                                                            <option value="<?= $situation->option_value ?>"><?= $situation->option_text ?></option>
                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <div class="form-group col-sm-4 col-lg-2">
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

    </div>

</section>