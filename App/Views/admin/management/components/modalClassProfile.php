<div class="row mb-4 d-flex justify-content-center">

    <div class="col-lg-3">

        <div class="row d-flex">

            <div class="list-group p-3 card col-lg-12" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><span>Dados da turma</span></a>

                <a class="list-group-item list-group-item-action" id="list-disciplineClass-list" data-toggle="list" href="#list-disciplineClass" role="tab" aria-controls="profile">Disciplinas</a>

                <a class="list-group-item list-group-item-action" id="list-exam-list" data-toggle="list" href="#list-exam" role="tab" aria-controls="exam">Avaliações</a>

                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Analise</a>

                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Troca de turma</a>

            </div>

            <div class="col-lg-12 mt-5 ">

                <div class="row card p-3 text-secondary main-sheet">

                    <span class="col-lg-12"><?= $this->view->classData[0]->series_acronym ?>ª <?= $this->view->classData[0]->ballot ?> <?= $this->view->classData[0]->course ?> <?= $this->view->classData[0]->shift ?></span>

                    <span class="col-lg-12 mt-2">Período letivo 2021</span>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-8">

        <div class="tab-content card" id="nav-tabContent">

            <div class="tab-pane fade show active col-lg-12" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="col-lg-12 accordion" id="accordion-class-data">

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

                    </div>

                </div>

            </div>

            <div class="tab-pane fade col-lg-12" id="list-disciplineClass" role="tabpanel" aria-labelledby="list-disciplineClass-list">


                <div class="col-lg-12 accordion" id="class-discipline-accordion">

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

            <div class="tab-pane fade col-lg-12" id="list-exam" role="tabpanel" aria-labelledby="list-exam-list">

                <div class="col-lg-12 accordion" id="class-profile-assessments" aria-labelledby="classExam" data-parent="#class-profile-accordion">

                    <div class="accordion" id="class-assessments-accordion">

                        <div class="col-lg-12 mb-4 mt-3">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-5">
                                    <h5>Avaliações da turma</h5>
                                </div>

                                <div class="col-lg-7 col-12 collapse-options-container">

                                    <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-assessments"><span class="mr-2 "><i class="fas fa-boxes mr-2"></i> Avaliações</span></a>

                                    <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-assessments"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="collapse show card" id="list-assessments" data-parent="#class-assessments-accordion">

                                <form id="seekExam" class="text-dark col-lg-11 mx-auto" action="">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-lg-5">
                                            <label for="">Descrição:</label>
                                            <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                        </div>

                                        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                        <div class="form-group col-lg-4">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClassId" class="form-control custom-select" name="disciplineClassId" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="">Unidade:</label>

                                            <select id="unity" class="form-control custom-select" name="unity" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                    <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                </form>

                                <div containerExamsList class="">

                                    <?php require '../App/Views/admin/management/components/examList.php' ?>

                                </div>

                            </div>

                            <div class="collapse card" id="add-assessments" data-parent="#class-assessments-accordion">

                                <form id="addExam" class="col-lg-11 mx-auto" action="">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-lg-6">

                                            <label for="">Descrição da avaliação:</label>
                                            <input class="form-control" id="examDescription" name="examDescription" type="text">

                                        </div>

                                        <div class="form-group col-lg-6">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClassId" class="form-control custom-select" name="disciplineClassId" required>

                                                <?php foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-lg-4">
                                            <label for="">Data de realização:</label>
                                            <input class="form-control" name="realizeDate" id="realizeDate" type="date">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label for="">Valor:</label>
                                            <input class="form-control" value="0.0" name="examValue" id="examValue" type="text">
                                        </div>

                                        <div class="form-group col-lg-2">
                                            <label for="">Unidade:</label>

                                            <select id="unity" class="form-control custom-select" name="unity" required>

                                                <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                    <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group col-lg-4 ml-auto">
                                            <label for="">&nbsp;</label>
                                            <a id="buttonAddExam" class="btn btn-success w-100">Adicionar</a>
                                        </div>

                                    </div>

                                </form>

                                <div containerListExam></div>

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

<form id="formClassId" action="">

    <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

</form>

</div>

</div>
</div>

</div>

</div>
</div>

</div>
</div>