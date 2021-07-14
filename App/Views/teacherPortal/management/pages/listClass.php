<section id="class">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <div class="row mt-3 page-header">

                <div class="col-11 col-lg-12 mx-auto">

                    <div class="row">

                        <h5 class="col-lg-6">Turmas</h5>

                        <nav class="col-lg-12 p-0" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/gestao">Gestão geral</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Turmas</li>
                            </ol>
                        </nav>

                    </div>

                </div>
            </div>


            <div class="col-lg-12">

                <div class="row mb-3">

                    <div class="col-lg-12 card">

                        <form id="seekClass" class="mt-3 mb-3 text-dark col-lg-11 mx-auto" action="">

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

                        <hr class="col-11 mx-auto">

                        <table class="col-lg-11 mx-auto table table-borderless table-hover">

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

                        <div class="modal fade modal-profile" id="profileClassModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">

                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="row">
                                        <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#profileClasseModal">
                                                <span aria-hidden="true"><i class="fas fa-times-circle text-dark mr-3 mt-2"></i></span>
                                            </button></div>
                                    </div>

                                    <div containerClasseProfileModal class="modal-body"></div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade simple-modal" id="modalExam" tabindex="6" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:100000">
                            <div class="modal-dialog modal-lg modal-dialog-centered" id="">
                                <div class="modal-content">
                                    <div class="row">
                                        <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalExam">
                                                <span aria-hidden="true"><i class="fas fa-times-circle text-dark mr-3 mt-2"></i></span>
                                            </button></div>
                                    </div>
                                    <div class="modal-body">
                                        <div containerModalExam class="row"></div>
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