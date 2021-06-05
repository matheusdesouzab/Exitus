<div class="row p-3 d-flex justify-content-around col-lg-11 mx-auto">

    <div class="col-lg-9">

        <div class="row accordion" id="class-profile-accordion">

            <ul class="list-group horizontal-control-list mx-auto list-group-horizontal">

                <li class="list-group-item" aria-expanded="true" data-toggle="collapse" data-target="#class-profile-data"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

                <li class="list-group-item" aria-expanded="false" data-toggle="collapse" data-target="#class-profile-discipline"><a href="#"> <i class="far fa-list-alt mr-2"></i> Disciplinas</a></li>

                <li class="list-group-item" aria-expanded="false" data-toggle="collapse" data-target="#class-profile-assessments"><a href="#"> <i class="fas fa-clipboard mr-2"></i> Avaliações</a></li>

            </ul>

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">

                        <div class="col-lg-12 collapse mx-auto show overflow-auto p-3 accordion-container" id="class-profile-data" data-parent="#class-profile-accordion">


                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="row">

                                        <div class="col-lg-12  accordion" id="accordion-class-data">

                                            <div class="col-lg-12 mb-4">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-lg-6">
                                                        <h5>Dados da turma</h5>
                                                    </div>

                                                    <div class="col-lg-6 col-12 collapse-options-container">

                                                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#students-list"><span class="mr-2"><i class="fas fa-user-friends"></i> Alunos</span></a>

                                                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#teacher-list" routeData="<?= $this->view->classId ?>"><span class="mr-2"><i class="fas fa-chalkboard-teacher"></i> Professores</span></a>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">

                                                <div class="row mb-3">

                                                    <div class="col-lg-12">
                                                        <div class="collapse show card" id="students-list" data-parent="#accordion-class-data">
                                                            <div class="row">
                                                                <div class="col-lg-12 table-responsive">

                                                                    <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto">

                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="2" scope="col">Nome do aluno</th>
                                                                                <th scope="col">CPF</th>
                                                                                <th scope="col">Unidade Cadastrada</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody containerListStudent>

                                                                            <?php require '../App/Views/admin/student/components/studentListing.php' ?>

                                                                        </tbody>
                                                                    </table>

                                                                </div>

                                                            </div>

                                                        </div>




                                                        <div class="collapse card" id="teacher-list" data-parent="#accordion-class-data">
                                                            <div class="row">
                                                                <div class="col-lg-12 table-responsive">
                                                                    <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto">

                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="2" scope="col">Nome do professor(a)</th>
                                                                                <th scope="col">CPF</th>
                                                                                <th scope="col">Disciplinas lecionadas</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody containerListTeacher>

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

                            </div>

                        </div>

                        <div class="col-lg-12 collapse accordion-container overflow-auto" id="class-profile-discipline" data-parent="#class-profile-accordion">

                            <div class="col-lg-12  accordion" id="class-discipline-accordion">

                                <div class="col-lg-12 mb-4 mt-3">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6">
                                            <h5>Disciplinas da turma</h5>
                                        </div>

                                        <div class="col-lg-6 col-12 collapse-options-container">

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

                                                        <div class="form-row mt-3 mb-4">

                                                            <div class="form-group col-lg-6">

                                                                <label for="">Professor:</label>

                                                                <select id="teacher" name="teacher" class="form-control custom-select" required>

                                                                    <?php foreach ($this->view->teacherAvailable as $key => $teacher) { ?>

                                                                        <option value="<?= $teacher->option_value ?>"><?= $teacher->option_text ?></option>

                                                                    <?php } ?>

                                                                </select>

                                                            </div>

                                                            <input type="hidden" name="classId" value="<?= $this->view->classId ?>">


                                                            <div containerSelectDiscipline class="form-group col-lg-4">

                                                                <?php require '../App/Views/admin/management/components/disciplineSelect.php' ?>

                                                            </div>

                                                            <div class="form-group col-lg-2">
                                                                <label for="">&nbsp;</label>
                                                                <a id="buttonAddClassDiscipline" class="btn btn-success w-100">Adicionar</a>
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


                        <div class="col-lg-12 collapse overflow-auto accordion-container" id="class-profile-assessments" aria-labelledby="turma-avaliacoes" data-parent="#class-profile-accordion">

                            <div class="accordion" id="class-assessments-accordion">
                                <div class="col-lg-12 mb-4 mt-3">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6">
                                            <h5>Avaliações da turma</h5>
                                        </div>

                                        <div class="col-lg-6 col-12 collapse-options-container">

                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-assessments"><span class="mr-2 "><i class="fas fa-boxes mr-2"></i> Avaliações</span></a>

                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-assessments"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="collapse show card" id="list-assessments" data-parent="#class-assessments-accordion">

                                        <form class="mt-3 col-lg-11 mx-auto  text-dark" action="">

                                            <div class="form-row mt-3">

                                                <div class="form-group col-lg-6">
                                                    <label for="">Nome da avaliacão:</label>
                                                    <input type="text" placeholder="Nome da avaliação" class="form-control">
                                                </div>

                                                <div class="form-group col-lg-4">

                                                    <label for="">Disciplina:</label>

                                                    <select id="disciplineClassId" class="form-control custom-select" name="disciplineClassId" required>

                                                        <?php foreach ($this->view->disciplinesAlreadyAdded as $key => $discipline) { ?>

                                                            <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="">Unidade:</label>

                                                    <select id="unity" class="form-control custom-select" name="unity" required>

                                                        <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                            <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                            </div>

                                        </form>

                                    

                                        

                                        <div containerExamsList>

                                            <?php require '../App/Views/admin/management/components/examList.php' ?>

                                        </div>

                                    </div>

                                    <div class="collapse card" id="add-assessments" data-parent="#class-assessments-accordion">

                                        <form id="addExam" class="col-lg-11 mx-auto" action="">

                                            <div class="form-row mt-3">

                                                <div class="form-group col-lg-6">

                                                    <label for="">Descrição da avaliação:</label>
                                                    <input class="form-control" name="examDescription" type="text">

                                                </div>

                                                <div class="form-group col-lg-4">

                                                    <label for="">Disciplina:</label>

                                                    <select id="disciplineClassId" class="form-control custom-select" name="disciplineClassId" required>

                                                        <?php foreach ($this->view->disciplinesAlreadyAdded as $key => $discipline) { ?>

                                                            <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="">Unidade:</label>

                                                    <select id="unity" class="form-control custom-select" name="unity" required>

                                                        <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                            <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

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

                                                <div class="form-group col-lg-3 ml-auto">
                                                    <label for="">&nbsp;</label>
                                                    <a id="buttonAddExam" class="btn btn-success w-100">Adicionar avaliação</a>
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


    <div class="col-lg-2 side-collapse-options">

        <ul class="list-group text-center">

            <li class="list-group-item border-0" id="turma-dados" aria-expanded="true" data-toggle="collapse" data-target="#class-profile-data"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

            <li class="list-group-item border-0" id="turma-disciplinas" aria-expanded="false" data-toggle="collapse" data-target="#class-profile-discipline"><a href="#"> <i class="far fa-list-alt mr-2"></i> Disciplinas</a></li>

            <li class="list-group-item border-0" id="turma-avaliacoes" aria-expanded="false" data-toggle="collapse" data-target="#class-profile-assessments"><a href="#"><i class="fas fa-clipboard-list mr-2"></i> Avaliações </a></li>

            <li class="list-group-item border-0" id="mais" aria-expanded="false" data-toggle="collapse" data-target="#"><a href="#"><i class="fas fa-chart-line mr-2"></i> Análise </a></li>

        </ul>
    </div>
</div>