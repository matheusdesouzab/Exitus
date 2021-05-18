<div id="list-students">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <h5 class="col-12 mb-4">Lista de alunos</h5>

            <div class="col-lg-12 ">

                <div class="p-3 mb-3 card" id="advanced-search-accordion">

                    <form class="col-lg-11 accordion mx-auto mt-3" id="seekStudent">

                        <div class="form-row">

                            <div class="form-group col-12 col-lg-5">
                                <label for="">Aluno:</label>
                                <input class="form-control" type="text" value="" name="name" placeholder="Nome do aluno">
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label for="">Curso:</label>
                                <select class="form-control custom-select" name="course" id="course">
                                    <option value="0">Todos</option>
                                    <?php foreach ($this->view->availableCourse as $key => $course) { ?>

                                        <option value="<?= $course->option_value ?>"><?= $course->option_text ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-12 col-lg-2">
                                <label for="">Turno:</label>
                                <select class="form-control custom-select" name="shift" id="shift">
                                    <option value="0">Todos</option>
                                    <?php foreach ($this->view->availableShift as $key => $shift) { ?>
                                        <option value="<?= $shift->option_value ?>"><?= $shift->option_text ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group col-2 col-lg-1">
                                <label for="">&nbsp;</label><br>
                                <div>
                                    <a class="btn btn-white w-100 p-2" href="" data-toggle="collapse" data-target="#activate-advanced-search-accordion" aria-expanded="false" aria-controls="activate-advanced-search-accordion"><i class="fas fa-ellipsis-h"></i></a>
                                </div>
                            </div>

                        </div>

                        <div id="activate-advanced-search-accordion" class="collapse" data-parent="#advanced-search-accordion">

                            <div class="form-row">

                                <div class="form-group col-12 col-lg-3">
                                    <label for="">Sexo:</label>
                                    <select class="form-control custom-select" name="sex">
                                        <option value="0">Todos</option>
                                        <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                            <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                        <?php } ?>
                                    </select>
                                </div>



                                <div class="form-group col-12 col-lg-3">
                                    <label for="">Série:</label>
                                    <select class="form-control custom-select" name="series" id="series">
                                        <option value="0">Todas</option>
                                        <?php foreach ($this->view->availableSeries as $key => $series) { ?>
                                            <option value="<?= $series->option_value ?>"><?= $series->option_text ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                    </form>


                    <hr class="col-10 mx-auto">

                    <div class="table-responsive">

                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto" id="student-table">

                            <thead>
                                <tr>
                                    <th colspan="2" scope="col">Nome do aluno</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Turma</th>
                                    <th scope="col">Unidade Cadastrada</th>
                                </tr>
                            </thead>

                            <tbody containerListStudent>
                            
                                <?php require '../App/Views/admin/student/components/studentListing.php' ?>

                                <div class="modal fade modal-profile" id="profileStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content p-2">
                                            <div class="row">
                                                <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fas fa-times-circle text-white mr-3 mt-2"></i></span>
                                                    </button></div>
                                            </div>

                                            <div containerModal class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>