<div id="class">

    <div class="row main-container">

        <div class="col-lg-12 accordion" id="class-accordion">

            <div class="col-lg-11 mx-auto mb-4 mt-3">

                <div class="row d-flex align-items-center">

                    <div class="col-lg-6">
                        <h5>Gestão das turmas</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" id="collapseListClass" data-target="#class-list">
                            <span class="mr-2"><i class="fas fa-boxes mr-2"></i> Turmas</span>
                        </a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" id="collapseAddClass" data-toggle="collapse" data-target="#add-class">
                            <span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span>
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row mb-3">

                    <div class="col-lg-11 mx-auto">
                        <div class="collapse show card" id="class-list" data-parent="#class-accordion">
                            <div class="row">
                                <div class="col-lg-11 mx-auto">

                                    <form id="seekClass" class="mt-3 mb-3 text-dark" action="">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-4">

                                                <label for="course">Curso</label>

                                                <select id="course" name="course" class="form-control custom-select">

                                                    <option value="0">Todos</option>

                                                    <?php foreach ($this->view->availableCourse as $key => $course) { ?>

                                                        <option value="<?= $course->option_value ?>"><?= $course->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-4">

                                                <label for="series">Série:</label>

                                                <select id="series" name="series" class="form-control custom-select">

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->availableSeries as $key => $series) { ?>

                                                        <option value="<?= $series->option_value ?>"><?= $series->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-4">

                                                <label for="shift">Turno</label>

                                                <select id="shift" name="shift" class="form-control custom-select">

                                                    <option value="0">Todos</option>

                                                    <?php foreach ($this->view->availableShift as $key => $shift) { ?>

                                                        <option value="<?= $shift->option_value ?>"><?= $shift->option_text ?></option>

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
                                                    <th scope="col">Total de alunos</th>
                                                    <th scope="col">Período letivo</th>
                                                    <th scope="col">Média da turma</th>
                                                </tr>
                                            </thead>

                                            <tbody containerListClass>
                                                <?php require '../App/Views/admin/management/components/classList.php' ?>
                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="modal fade" id="modalErrorDisciplineClass" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:100000">
                                        <div class="modal-dialog" id="">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Erro em adicionar disciplina</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Confira se todos os campos estão preenchidos
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalExam" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:100000">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" id="">
                                            <div class="modal-content" style="border-radius: 10px">

                                                <div class="modal-body">
                                                    <div containerModalExam class="row"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade modal-profile" id="profileClasseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                            <div class="modal-content p-2">
                                                <div class="row">
                                                    <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fas fa-times-circle text-white mr-3 mt-2"></i></span>
                                                        </button></div>
                                                </div>

                                                <div containerClasseProfileModal class="row modal-body"></div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="add-class" data-parent="#class-accordion">

                            <div class="row">

                                <div class="col-lg-12 card">

                                    <form class="col-lg-11 mx-auto mt-3" id="addClass" action="">

                                        <div class="form-row mt-2 d-flex justify-content-between">
                                            <div class="font-weight-bold col-11">Adicionar nova turma:</div>
                                        </div>

                                        <div class="form-row mt-4 mb-2">

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

                                        <div class="form-row">

                                            <div class="form-group col-lg-2">

                                                <label for="classRoom">Sala:</label>

                                                <select id="classRoom" name="classRoom" class="form-control custom-select" required>

                                                    <?php foreach ($this->view->availableClassRoom as $key => $classRoom) { ?>

                                                        <option value="<?= $classRoom->option_value ?>"><?= $classRoom->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-2">

                                                <label for="schoolTerm">Ano letivo:</label>

                                                <select id="schoolTerm" name="schoolTerm" class="form-control custom-select">

                                                    <?php foreach ($this->view->activeSchoolTerm as $key => $schoolTerm) { ?>

                                                        <option value="<?= $schoolTerm->option_value ?>"><?= $schoolTerm->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>


                                            <div class="form-group ml-auto col-lg-4">
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
        </div>
    </div>
</div>


</div>