<section id="class">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="class-accordion">

            <div class="row mt-3 page-header">

                <div class="col-11 col-lg-12 mx-auto">

                    <div class="row d-flex align-items-center">

                        <h5 class="col-sm-6">Gestão das turmas</h5>

                        <div class="col-sm-6">

                            <div class="row collapse-options-container">

                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" id="collapseListClass" data-target="#class-list">
                                <span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Turmas</span>
                            </a>

                            <a class="collapsed font-weight-bold" aria-expanded="false" id="collapseAddClass" data-toggle="collapse" data-target="#add-class">
                                <span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span>
                            </a>

                            </div>

                        </div>

                        <nav class="col-lg-12" aria-label="breadcrumb">
                            <ol class="breadcrumb p-0 mt-2">
                                <li class="breadcrumb-item"><a href="/admin/gestao">Gestão geral</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Turmas</li>
                            </ol>
                        </nav>

                    </div>

                </div>
            </div>


            <div class="col-lg-12 col-11 mx-auto card mb-4">

                <div class="collapse show" id="class-list" data-parent="#class-accordion">
                    <div class="row">
                        <div class="col-lg-11 mx-auto">

                            <form id="seekClass" class="mt-3 mb-3 text-dark" action="">

                                <div class="form-row mt-3">

                                    <div class="form-group col-6 col-sm-4">

                                        <label for="course">Curso</label>

                                        <select id="course" name="course" class="form-control custom-select">

                                            <option value="0">Todos</option>

                                            <?php foreach ($this->view->availableCourse as $key => $course) { ?>

                                                <option value="<?= $course->option_value ?>"><?= $course->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-6 col-sm-2">

                                        <label for="series">Série:</label>

                                        <select id="series" name="series" class="form-control custom-select">

                                            <option value="0">Todas</option>

                                            <?php foreach ($this->view->availableSeries as $key => $series) { ?>

                                                <option value="<?= $series->option_value ?>"><?= $series->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-6 col-sm-3">

                                        <label for="shift">Turno</label>

                                        <select id="shift" name="shift" class="form-control custom-select">

                                            <option value="0">Todos</option>

                                            <?php foreach ($this->view->availableShift as $key => $shift) { ?>

                                                <option value="<?= $shift->option_value ?>"><?= $shift->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-6 col-sm-3">

                                        <label for="shift">Período Letivo</label>

                                        <select id="schoolTerm" name="schoolTerm" class="form-control custom-select">

                                            <option value="0">Todos</option>

                                            <?php foreach ($this->view->allSchoolTerm as $key => $schoolTerm) { ?>

                                                <option value="<?= $schoolTerm->option_value ?>"><?= $schoolTerm->option_text ?> - <?= $schoolTerm->situation ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                            </form>

                            <hr class="">

                            <div class="table-responsive">

                                <table class="table table-borderless table-hover" id="classe-table">

                                    <thead>
                                        <tr>
                                            <th scope="col">Nome da turma</th>
                                            <th scope="col">Sala</th>
                                            <th scope="col">Total de alunos</th>
                                            <th scope="col">Período letivo</th>

                                        </tr>
                                    </thead>

                                    <tbody containerListClass>
                                        <?php require '../App/Views/admin/management/components/classList.php' ?>
                                    </tbody>

                                </table>
                            </div>


                            <div class="modal fade simple-modal" id="modalExam" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:100000">
                                <div class="modal-dialog modal-lg modal-dialog-centered" id="">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalExam">
                                                    <span aria-hidden="true"><i class="fas fa-times-circle text-info mr-3 mt-2"></i></span>
                                                </button></div>
                                        </div>
                                        <div class="modal-body">
                                            <div containerModalExam class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade simple-modal" id="modalLack" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:100000">
                                <div class="modal-dialog modal-lg modal-dialog-centered" id="">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#profileClasseModal">
                                                    <span aria-hidden="true"><i class="fas fa-times-circle text-info mr-3 mt-2"></i></span>
                                                </button></div>
                                        </div>
                                        <div class="modal-body">
                                            <div containerModalLack class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade modal-profile" id="profileStudentModal" data-backdrop="static" data-keyboard="false" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:1000000">

                                <div class="modal-dialog modal-full">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#profileStudentModal">
                                                    <span aria-hidden="true"><i class="fas fa-times-circle text-info mr-3 mt-2"></i></span>
                                                </button></div>
                                        </div>

                                        <div containerStudentProfileModal class="modal-body"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade modal-profile" id="profileClassModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">

                                <div class="modal-dialog modal-full">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#profileClasseModal">
                                                    <span aria-hidden="true"><i class="fas fa-times-circle text-info mr-3 mt-2"></i></span>
                                                </button></div>
                                        </div>

                                        <div containerClasseProfileModal class="modal-body"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade simple-modal" id="modalNote" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:100000">
                                <div class="modal-dialog modal-lg modal-dialog-centered" id="">
                                    <div class="modal-content" style="border-radius: 10px">
                                        <div class="row">
                                            <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#profileClasseModal">
                                                    <span aria-hidden="true"><i class="fas fa-times-circle text-info mr-3 mt-2"></i></span>
                                                </button></div>
                                        </div>
                                        <div class="modal-body">
                                            <div containerModalNote class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>









                        </div>
                    </div>
                </div>

                <div class="collapse" id="add-class" data-parent="#class-accordion">

                    <div class="row">

                        <div class="col-lg-12">

                            <form class="col-lg-12" id="addClass" action="">

                                <div class="font-weight-bold col-lg-12 mt-3">Adicionar nova turma:</div>

                                <hr class="col-lg-11 ml-3">

                                <div class="form-row col-lg-12 mb-2">

                                    <div class="form-group col-lg-2">

                                        <label for="series">Série:</label>

                                        <select id="series" name="series" class="form-control custom-select">

                                            <?php foreach ($this->view->availableSeries as $key => $series) { ?>

                                                <option value="<?= $series->option_value ?>"><?= $series->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-2">

                                        <label for="ballot">Cédula:</label>

                                        <select id="ballot" name="ballot" class="form-control custom-select">

                                            <?php foreach ($this->view->availableBallot as $key => $ballot) { ?>

                                                <option value="<?= $ballot->option_value ?>"><?= $ballot->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-5">

                                        <label for="course">Curso:</label>

                                        <select id="course" name="course" class="form-control custom-select">

                                            <?php foreach ($this->view->availableCourse as $key => $course) { ?>

                                                <option value="<?= $course->option_value ?>"><?= $course->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-3">

                                        <label for="shift">Turno:</label>

                                        <select id="shift" name="shift" class="form-control custom-select">

                                            <?php foreach ($this->view->availableShift as $key => $shift) { ?>

                                                <option value="<?= $shift->option_value ?>"><?= $shift->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-row col-lg-12 mb-3 ">

                                    <div class="form-group col-lg-2">

                                        <label for="classRoom">Sala:</label>

                                        <select id="classRoom" name="classRoom" class="form-control custom-select" required>

                                            <?php foreach ($this->view->availableClassRoom as $key => $classRoom) { ?>

                                                <option value="<?= $classRoom->option_value ?>"><?= $classRoom->option_text ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-3">

                                        <label for="schoolTerm">Ano letivo:</label>

                                        <select id="schoolTerm" name="schoolTerm" class="form-control custom-select">

                                            <?php foreach ($this->view->activeScheduledSchoolTerm as $key => $schoolTerm) { ?>

                                                <option value="<?= $schoolTerm->option_value ?>"><?= $schoolTerm->option_text ?> - <?= $schoolTerm->situation ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>


                                    <div class="form-group ml-auto col-lg-3">
                                        <label for="">&nbsp;</label>
                                        <a id="buttonAddClass" class="btn btn-success w-100 text-center disabled" href="#">Adicionar nova turma</a>
                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>