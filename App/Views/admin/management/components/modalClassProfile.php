<div class="row mb-4 d-flex justify-content-around" id="main-accordion">

    <div class="col-lg-3 col-11 mx-auto">

        <div class="row card">

            <div class="col-lg-12 container-list-group">

                <div class="row">

                    <nav>

                        <ul>

                            <a href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-class-data">Dados da turma</a>

                            <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-discipline-accordion">Disciplinas</a>

                            <a href="">Avaliações</a>
                            <a href="">Elemento 01</a>

                        </ul>

                    </nav>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row p-3 text-secondary main-sheet">

                    <div class="col-lg-12">

                        <div class="row">

                            <span class="col-12 mx-auto"><?= $this->view->classData[0]->series_acronym ?>ª <?= $this->view->classData[0]->ballot ?> <?= $this->view->classData[0]->course ?> <?= $this->view->classData[0]->shift ?> - Período letivo 2021</span>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-8 card main-content col-11 mx-auto">

        <div class="row">

            <div class="col-lg-11 mx-auto mt-3 collapse show" id="accordion-class-data" data-parent="#main-accordion">

                <div class="col-lg-12 mb-4 mt-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6">
                            <h5><?= $this->view->classData[0]->series_acronym ?>ª <?= $this->view->classData[0]->ballot ?> <?= $this->view->classData[0]->course ?> <?= $this->view->classData[0]->shift ?></h5>
                        </div>

                        <div class="col-lg-6 col-12 collapse-options-container">

                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#students-list"><span class="mr-2"><i class="fas fa-user-friends"></i> Alunos</span></a>

                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#teacher-list" routeData="<?= $this->view->classId ?>"><span class="mr-2"><i class="fas fa-chalkboard-teacher"></i> Professores</span></a>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12">

                    <div class="row mb-3">

                        <div class="collapse show card col-lg-12" id="students-list" data-parent="#accordion-class-data">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">

                                    <table class="table col-lg-12 table-hover mt-3 table-borderless ">

                                        <tbody containerListStudent class="">

                                            <?php require '../App/Views/admin/student/components/studentListing.php' ?>

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                        <div class="collapse col-lg-12 card" id="teacher-list" data-parent="#accordion-class-data">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table col-lg-12 table-hover mt-3 table-borderless ">

                                        <tbody containerListTeacher class="">

                                            <?php require '../App/Views/admin/teacher/components/teacherListing.php' ?>

                                        </tbody>


                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <div class="col-lg-11 mx-auto mt-3 collapse" id="class-discipline-accordion" data-parent="#main-accordion">

                <div class="col-lg-12 mb-4 mt-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-5">
                            <h5>Disciplinas</h5>
                        </div>

                        <div class="col-lg-7 col-12 collapse-options-container">

                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-discipline"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Disciplinas</span></a>

                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-discipline"><span class="mr-2 "><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                        </div>


                    </div>
                </div>

                <div class="col-lg-12">

                    <div class="row mb-3">

                        <div class="col-lg-12">
                            <div class="collapse show" id="list-discipline" data-parent="#class-discipline-accordion">
                                <div class="row" containerListDisciplineClass>

                                    <?php require '../App/Views/admin/management/components/disciplineClass.php' ?>

                                </div>

                            </div>


                            <div class="collapse card" id="add-discipline" data-parent="#class-discipline-accordion">
                                <div class="row">

                                    <form class="col-lg-11 mx-auto" id="addClassDiscipline" action="">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-7">

                                                <label for="">Professor:</label>

                                                <select id="teacher" name="teacher" class="form-control custom-select" required>

                                                    <?php foreach ($this->view->teacherAvailable as $key => $teacher) { ?>

                                                        <option value="<?= $teacher->option_value ?>"><?= $teacher->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <input type="hidden" name="classId" value="<?= $this->view->classId ?>">

                                            <div class="form-group col-lg-5">

                                                <label for="">Disciplina</label>

                                                <select id="availableSubjects" name="availableSubjects" class="form-control custom-select" required></select>

                                            </div>

                                        </div>

                                        <div class="form-row d-flex justify-content-end">

                                            <div class="form-group col-lg-5">
                                                <label for="">&nbsp;</label>
                                                <a id="buttonAddClassDiscipline" class="btn btn-success w-100">Adicionar disciplina</a>
                                            </div>

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

    <form id="formClassId" action="">

        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

    </form>

</div>