<section id="class">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="class-accordion">

            <div class="row mt-3 page-header">

                <div class="col-11 col-lg-12 mx-auto">

                    <div class="row">

                        <h5 class="col-lg-6 mb-4">Gestão das turmas</h5>

                    </div>

                </div>
            </div>


            <div class="col-lg-12">

                <div class="row mb-3">

                    <div class="col-lg-12 mb-3">
                        <div class="collapse show card mb-5" id="class-list" data-parent="#class-accordion">
                            <div class="row">
                                <div class="col-lg-11 mx-auto">

                                    <form id="seekClassTeacher" class="mt-3 text-dark" action="">

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

                                        <table class="col-lg-12 table table-borderless table-hover" id="table-class-teacher">

                                            <thead>

                                                <tr>
                                                    <th scope="col">Turma</th>
                                                    <th scope="col">Sala</th>
                                                    <th scope="col">Período letivo</th>
                                                    <th scope="col">Disciplinas ativas</th>
                                                    <th scope="col">Total de alunos</th>
                                                </tr>

                                            </thead>

                                            <tbody containerListClass>

                                                <?php require '../App/Views/teacherPortal/management/components/classListing.php' ?>

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

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>