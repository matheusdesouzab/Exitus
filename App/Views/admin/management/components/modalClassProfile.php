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

                                                            <div class="form-group col-lg-4">

                                                                <label for="">Disciplina:</label>

                                                                <select id="discipline" name="discipline" class="form-control custom-select" required>
                                                                   
                                                                    <?php foreach ($this->view->disciplineAvailable as $key => $discipline) { ?>
                                                                        
                                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                                    <?php } ?>

                                                                </select>

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

                                                <div class="form-group col-lg-3">
                                                    <label for="inputState">Disciplina:</label>
                                                    <select id="inputState" class="form-control custom-select" required>
                                                        <option>Matemática</option>
                                                        <option>Ensino Médio</option>
                                                        <option>Técnico</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="inputState">UE referente:</label>
                                                    <select id="inputState" class="form-control custom-select" required>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </form>

                                        <hr class="col-lg-11 mx-auto col-11">

                                        <div class="table-responsive">

                                            <table class="table col-lg-11 mx-auto table-borderless table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Avaliação</th>
                                                        <th scope="col">UE</th>
                                                        <th scope="col">Disciplina</th>
                                                        <th scope="col">Data</th>
                                                        <th scope="col">Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>Prova em dupla</td>
                                                        <td>1</td>

                                                        <td>Matemática</td>
                                                        <td>20/12/2001</td>
                                                        <td>4,0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Prova em dupla</td>
                                                        <td>1</td>

                                                        <td>Matemática</td>
                                                        <td>20/12/2001</td>
                                                        <td>4,0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Prova em dupla</td>
                                                        <td>1</td>

                                                        <td>Matemática</td>
                                                        <td>20/12/2001</td>
                                                        <td>4,0</td>
                                                    </tr>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>Prova em dupla</td>
                                                        <td>1</td>

                                                        <td>Matemática</td>
                                                        <td>20/12/2001</td>
                                                        <td>4,0</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>



                                    <div class="collapse card" id="add-assessments" data-parent="#class-assessments-accordion">

                                        <form class="col-lg-12" action="">

                                            <div class="form-row mt-3">

                                                <div class="form-group col-lg-6">
                                                    <label for="">Nome da avaliação:</label>

                                                    <input class="form-control" type="text">

                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="">Disciplina:</label>

                                                    <select id="inputState" class="form-control custom-select" required>
                                                        <option>Ana Silva</option>
                                                        <option>Meickson</option>
                                                        <option>Tassio</option>
                                                        <option>Carlos</option>
                                                    </select>

                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="">Unidade:</label>

                                                    <select id="inputState" class="form-control custom-select" required>
                                                        <option>Matemática</option>
                                                        <option>Biologia</option>
                                                        <option>Português</option>
                                                        <option>Filosofia</option>
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-lg-2">
                                                    <label for="">Valor:</label>

                                                    <input class="form-control" type="text">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">&nbsp;</label>
                                                    <a class="btn btn-success w-100" href="">Adicionar disciplina</a>
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


    <div class="col-lg-2 side-collapse-options">

        <ul class="list-group text-center">

            <li class="list-group-item border-0" id="turma-dados" aria-expanded="true" data-toggle="collapse" data-target="#class-profile-data"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

            <li class="list-group-item border-0" id="turma-disciplinas" aria-expanded="false" data-toggle="collapse" data-target="#class-profile-discipline"><a href="#"> <i class="far fa-list-alt mr-2"></i> Disciplinas</a></li>

            <li class="list-group-item border-0" id="turma-avaliacoes" aria-expanded="false" data-toggle="collapse" data-target="#class-profile-assessments"><a href="#"><i class="fas fa-clipboard-list mr-2"></i> Avaliações </a></li>

            <li class="list-group-item border-0" id="mais" aria-expanded="false" data-toggle="collapse" data-target="#"><a href="#"><i class="fas fa-chart-line mr-2"></i> Análise </a></li>

        </ul>
    </div>
</div>