<div class="row mb-4 d-flex justify-content-around" id="main-accordion-class">

    <div class="col-lg-3 col-12 col-sm-4">

        <div class="col-lg-12 modal-sidebar">

            <div class="row p-3">

                <div class="col-lg-12 container-list-group">

                    <div class="row">

                        <nav>

                            <ul>

                                <a class="collapse show" href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-class-data">
                                    <span class="box-icon"><i class="fas fa-user-friends"></i></span> Dados da turma
                                </a>

                                <?php

                                if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) {

                                ?>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-discipline-accordion">
                                        <span class="box-icon"><i class="fas fa-boxes"></i></span> Disciplinas
                                    </a>


                                <?php } ?>

                                <?php if (!isset($_SESSION)) session_start(); ?>

                                <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-assessments">
                                    <span class="box-icon"><i class="fas fa-paste"></i></span> Avaliações
                                </a>

                                <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-note-history">
                                    <span class="box-icon"><i class="fas fa-poll-h"></i></span> Notas das avaliações
                                </a>

                                <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-student-average">
                                    <span class="box-icon"><i class="fas fa-poll"></i></span> Médias dos alunos
                                </a>

                                <?php if ($this->view->classData[0]->school_term_situation == 1) { ?>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-warning">
                                        <span class="box-icon"><i class="fas fa-exclamation-circle"></i></span> Avisos
                                    </a>

                                    <?php

                                    if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) {

                                    ?>


                                        <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-rematrug">
                                            <span class="box-icon"><i class="fas fa-redo"></i></span> Rematrícula
                                        </a>

                                        <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-settings">
                                            <span class="box-icon"><i class="fas fa-cog"></i></span> Configurações
                                        </a>


                                <?php }
                                } ?>


                            </ul>

                        </nav>

                    </div>
                </div>

                <form action="" id="dataClass">

                    <input type="hidden" name="series" value="<?= $this->view->classData[0]->series_id ?>">
                    <input type="hidden" name="course" value="<?= $this->view->classData[0]->course_id ?>">
                    <input type="hidden" name="classId" value="<?= $this->view->classData[0]->class_id ?>">

                </form>


                <div class="col-lg-12 mt-4">

                    <div class="row p-3 main-sheet">

                        <div class="col-lg-12">

                            <div class="row">

                                <span class="col-12 mx-auto"><?= $this->view->classData[0]->series_acronym ?>ª <?= $this->view->classData[0]->ballot ?> <?= $this->view->classData[0]->course ?> <?= $this->view->classData[0]->shift ?> - Período Letivo <?= $this->view->classData[0]->school_term ?></span>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-9 col-sm-8 mx-auto">

        <div class="col-lg-12 card main-content">

            <div class="row">

                <div class="col-lg-11 mx-auto collapse show" id="accordion-class-data" data-parent="#main-accordion-class">

                    <div class="col-lg-12 mb-3 col-sm-11 mx-auto">

                        <div class="row d-flex align-items-center p-0">

                            <div class="col-sm-6 p-0">
                                <h5 class="mt-2"><?= $this->view->classData[0]->series_acronym ?>ª <?= $this->view->classData[0]->ballot ?> <?= $this->view->classData[0]->course ?> <?= $this->view->classData[0]->shift ?></h5>
                            </div>

                            <div class="col-sm-6 col-12 p-0">

                                <div class="row collapse-options-container">

                                    <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#students-list"><span class="mr-2"><i class="fas fa-user-friends"></i> Alunos</span></a>

                                    <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#teacher-list" routeData="<?= $this->view->classId ?>"><span class=""><i class="fas fa-chalkboard-teacher"></i> Docentes</span></a>

                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="row mb-3">

                            <div class="collapse show card col-lg-12 col-sm-11 mx-auto" id="students-list" data-parent="#accordion-class-data">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">

                                        <table class="table col-lg-12 table-hover table-borderless ">

                                            <thead>
                                                <tr>
                                                    <th colspan="2">Nome do aluno</th>
                                                    <th>Email</th>
                                                    <th>Situação atual</th>
                                                </tr>
                                            </thead>

                                            <tbody containerListStudent class="">

                                                <?php require '../App/Views/admin/student/components/studentListing.php' ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>

                            <div class="collapse card col-lg-12 col-sm-11 mx-auto" id="teacher-list" data-parent="#accordion-class-data">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">
                                        <table class="table col-lg-12 table-hover table-borderless ">

                                            <thead>
                                                <tr>
                                                    <th colspan="2">Nome do docente</th>
                                                    <th>Email</th>
                                                    <th>Disciplina ministrada</th>
                                                </tr>
                                            </thead>

                                            <tbody containerListTeacherClass class=""></tbody>

                                        </table>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-11 mx-auto collapse" id="class-discipline-accordion" data-parent="#main-accordion-class">

                    <div class="col-lg-12 col-sm-11 mx-auto mb-3">

                        <div class="row d-flex align-items-center p-0">

                            <div class="col-sm-5 p-0">
                                <h5 class="mt-2">Disciplinas</h5>
                            </div>

                            <div class="col-sm-7 col-12 p-0">

                                <div class="row collapse-options-container">

                                    <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-discipline"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Lista</span></a>

                                    <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-discipline"><span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span></a>

                                </div>


                            </div>


                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="row mb-3">

                            <div class="col-lg-12 col-sm-11 mx-auto p-0">

                                <div class="collapse show" id="list-discipline" data-parent="#class-discipline-accordion">
                                    <div class="col-lg-12 p-0" containerListDisciplineClass>

                                        <?php require '../App/Views/admin/management/components/disciplineClass.php' ?>

                                    </div>

                                </div>


                                <div class="collapse card" id="add-discipline" data-parent="#class-discipline-accordion">
                                    <div class="row">

                                        <form class="col-lg-11 mx-auto" id="addClassDiscipline" action="">

                                            <div class="form-row mt-3">

                                                <div class="form-group col-sm-6">

                                                    <label for="">Professor:</label>

                                                    <select id="teacher" name="teacher" class="form-control custom-select" required>

                                                        <?php foreach ($this->view->teacherAvailable as $key => $teacher) { ?>

                                                            <option value="<?= $teacher->option_value ?>"><?= $teacher->option_text ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <input type="hidden" name="classId" value="<?= $this->view->classId ?>">

                                                <div class="form-group col-sm-6">

                                                    <label for="">Disciplina</label>

                                                    <select id="disciplineClassAdd" name="disciplineClassAdd" class="form-control custom-select" required></select>

                                                </div>

                                            </div>

                                            <div class="form-row d-flex justify-content-end">

                                                <div class="form-group col-lg-5 col-sm-6">
                                                    <label for="">&nbsp;</label>
                                                    <button id="buttonAddClassDiscipline" class="btn btn-success w-100">Adicionar disciplina</button>
                                                </div>

                                            </div>


                                    </div>


                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-profile-assessments" data-parent="#main-accordion-class">

                    <div class="accordion" id="class-assessments-accordion">

                        <div class="col-lg-12 col-sm-11 mx-auto mb-3">

                            <div class="row d-flex align-items-center p-0">

                                <div class="col-sm-5 p-0">
                                    <h5 class="mt-2">Avaliações da turma</h5>
                                </div>

                                <div class="col-sm-7 col-12 p-0">

                                    <div class="row collapse-options-container">

                                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-exam"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Lista</span></a>

                                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-assessments"><span class=""><i class="fas fa-plus mr-2"></i> Criar</span></a>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-11 mx-auto p-0">

                            <div class="collapse show" id="list-exam" data-parent="#class-assessments-accordion">

                                <form id="seekExam" class="text-dark mt-3" action="">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-sm-5">
                                            <label for="">Descrição:</label>
                                            <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                        </div>

                                        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                        <div class="form-group col-sm-4">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>


                                        <div class="form-group col-sm-3">
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


                                <div containerExamsList></div>

                            </div>

                            <div class="collapse card" id="add-assessments" data-parent="#class-assessments-accordion">

                                <form id="addExam" class="col-lg-12">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-sm-6">

                                            <label for="">Descrição da avaliação:</label>
                                            <input class="form-control" id="examDescription" name="examDescription" type="text">

                                        </div>

                                        <div class="form-group col-sm-6">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-sm-5">
                                            <label for="">Data de realização:</label>
                                            <input class="form-control" name="realizeDate" id="realizeDate" type="date">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="">Valor:</label>
                                            <input class="form-control" value="0.0" name="examValue" id="examValue" type="text">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label for="">Unidade:</label>

                                            <select id="unity" class="form-control custom-select" name="unity" required>

                                                <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                    <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group col-lg-3 ml-auto">
                                            <label for="">&nbsp;</label>
                                            <a disabled id="buttonAddExam" class="btn btn-success w-100 disabled">Criar</a>
                                        </div>

                                    </div>

                                </form>

                                <div containerListExam></div>

                            </div>


                        </div>
                    </div>

                    <form id="formClassId" action="">

                        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                    </form>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-note-history" data-parent="#main-accordion-class">

                    <div class="col-sm-11 col-lg-12 mx-auto mb-3">

                        <div class="row">

                            <div class="col-lg-12 p-0">
                                <h5 class="mt-2">Notas das avaliações</h5>
                            </div>

                            <div class='col-lg-12 p-0'>

                                <form id="seekNoteExamClass" class="text-dark  mt-3 accordion" action="">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-sm-4">
                                            <label for="">Descrição:</label>
                                            <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                        </div>

                                        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                        <div class="form-group col-sm-4 col-lg-3">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group col-sm-3 col-7">
                                            <label for="">Unidade:</label>

                                            <select id="unity" class="form-control custom-select" name="unity" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                    <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group col-sm-1 col-5 col-lg-2">
                                            <label for="">&nbsp;</label>

                                            <div>
                                                <a class="btn btn-light w-100 p-2" href="" data-toggle="collapse" data-target="#activate-advanced-search-accordion" aria-expanded="false" aria-controls="activate-advanced-search-accordion"><i class="fas fa-filter"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="activate-advanced-search-accordion" class="collapse" data-parent="#seekNoteExamClass">

                                        <div class="form-row">

                                            <div class="form-group col-lg-4">

                                                <label for="">Ordenar por:</label>

                                                <select id="orderBy" class="form-control custom-select" name="orderBy" required>

                                                    <option value="DESC">Maior nota</option>
                                                    <option value="ASC">Menor nota</option>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                            <div class="col-lg-12 table-responsive p-0">

                                <hr class="">

                                <table class="table table-borderless col-lg-12 p-0 table-striped" id="note-table-class">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" colspan="2">Nome do aluno</th>
                                            <th class='text-center' scope="col">Resultado</th>
                                            <th scope="col">Dados da avaliação</th>
                                        </tr>
                                    </thead>
                                    <tbody containerListNote></tbody>
                                </table>
                            </div>

                        </div>

                    </div>


                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-rematrug" data-parent="#main-accordion-class">

                    <div class="accordion" id="rematrug-accordion">

                        <div class="col-lg-12 col-sm-11 mx-auto mb-3">

                            <div class="row d-flex align-items-center p-0">

                                <div class="col-sm-5 p-0">
                                    <h5 class="mt-2">Rematrículas</h5>
                                </div>

                                <div class="col-sm-7 col-12 p-0">

                                    <div class="row collapse-options-container">

                                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#rematrecules-received"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i>Solicitações</span></a>

                                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#finalized-rematrecules"><span class=""><i class="fas fa-check-circle mr-2"></i> Status da turma</span></a>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 p-0">

                            <div class="collapse show col-lg-12" id="rematrecules-received" data-parent="#rematrug-accordion">

                                <div containerRematrugRequests class="row"></div>

                            </div>

                            <div class="collapse col-lg-12 col-sm-11 mx-auto" id="finalized-rematrecules" data-parent="#rematrug-accordion">

                                <div containerRematrugFinalized class="row"></div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-11 mx-auto collapse" id="class-warning" data-parent="#main-accordion-class">

                    <div class="accordion" id="warning-accordion">

                        <div class="col-lg-12 col-sm-11 mx-auto mb-3">

                            <div class="row d-flex align-items-center p-0">

                                <div class="col-sm-5 p-0">
                                    <h5 class="mt-2">Avisos</h5>
                                </div>

                                <div class="col-sm-7 col-12 p-0">

                                    <div class="row collapse-options-container">

                                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-warning"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i>Lista</span></a>

                                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#create-warning"><span class=""><i class="fas fa-check-circle mr-2"></i> Criar</span></a>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-11 mx-auto p-0">

                            <div class="collapse show" id="list-warning" data-parent="#warning-accordion">

                                <div containerListWarning></div>

                            </div>

                            <div class="collapse card col-lg-12 col-sm-11 mx-auto" id="create-warning" data-parent="#warning-accordion">

                                <form id="addWarning" class="col-lg-12" action="">

                                    <input value="<?= $this->view->classId ?>" type="hidden" name="classId">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-lg-12">
                                            <label for="">Descrição do aviso: </label>
                                            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                                        </div>

                                    </div>



                                    <div class="form-row">

                                        <div class="form-group col-lg-8">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>


                                        <div class="form-group col-lg-4 ml-auto">
                                            <label for="">&nbsp;</label>
                                            <a id="buttonAddWarning" class="btn btn-success w-100">Adicionar</a>
                                        </div>


                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-settings" data-parent="#main-accordion-class">

                    <div class="row">

                        <div class="col-sm-11 col-lg-12 mx-auto">

                            <div class="row d-flex align-items-center">

                                <div class="col-sm-6">
                                    <h5>Configurações da turma</h5>
                                </div>

                                <div class="col-sm-6 d-flex justify-content-end">

                                    <a id="buttonUpdateClass" class="btn btn-success text-center disabled" href="#" data-toggle="tooltip" data-placement="top" title="Atualizar dados da turma"><i class="fas fa-check"></i></a>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12 col-sm-11 mx-auto">

                            <form class="mt-2 p-3 border p-0 mt-3" id="updateClass" action="">

                                <div class="font-weight-bold col-lg-12 mb-3">Atualizar dados da turma</div>

                                <div class="form-row col-lg-12">

                                    <div class="form-group col-sm-4 col-lg-2">

                                        <label for="series">Série:</label>

                                        <select id="series" name="series" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->series_id ?>"><?= $this->view->classData[0]->series_acronym ?></option>

                                        </select>

                                    </div>

                                    <div class="form-group col-sm-4 col-lg-2">

                                        <label for="ballot">Cédula:</label>

                                        <select id="ballot" name="ballot" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->ballot_id ?>"><?= $this->view->classData[0]->ballot ?></option>

                                            <?php foreach ($this->view->availableBallot as $key => $ballot) { ?>

                                                <?php if ($this->view->classData[0]->ballot_id != $ballot->option_value) { ?>

                                                    <option value="<?= $ballot->option_value ?>"><?= $ballot->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-sm-4 col-lg-3">

                                        <label for="course">Curso:</label>

                                        <select id="course" name="course" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->course_id ?>"><?= $this->view->classData[0]->course ?></option>

                                        </select>

                                    </div>

                                    <div class="form-group col-sm-6 col-lg-3">

                                        <label for="shift">Turno:</label>

                                        <select id="shift" name="shift" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->shift_id ?>"><?= $this->view->classData[0]->shift ?></option>

                                            <?php foreach ($this->view->availableShift as $key => $shift) { ?>

                                                <?php if ($this->view->classData[0]->shift_id != $shift->option_value) { ?>

                                                    <option value="<?= $shift->option_value ?>"><?= $shift->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-sm-6 col-lg-2">

                                        <label for="classRoom">Sala:</label>

                                        <select id="classRoom" name="classRoom" class="form-control custom-select" required>

                                            <option value="<?= $this->view->classData[0]->classroom_id ?>"><?= $this->view->classData[0]->classroom_number ?></option>

                                            <?php foreach ($this->view->availableClassRoom as $key => $classRoom) { ?>

                                                <?php if ($this->view->classData[0]->classroom_id != $classRoom->option_value) { ?>

                                                    <option value="<?= $classRoom->option_value ?>"><?= $classRoom->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                </div>

                                <input type="hidden" name="schoolTerm" value="<?= $this->view->classData[0]->school_term_id ?>">
                                <input type="hidden" name="classId" id="classId" value="<?= $this->view->classData[0]->class_id ?>">

                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-student-average" data-parent="#main-accordion-class">

                    <div class="col-lg-12 col-sm-11 mx-auto mb-3">

                        <div class="row">

                            <div class="col-lg-12 p-0">
                                <h5 class='mt-2'>Médias dos alunos</h5>
                            </div>

                            <div class='col-lg-12 p-0'>

                                <form id="studentsAverageSeek" class="text-dark  mt-3 accordion" action="">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-sm-4">
                                            <label for="">Nome do aluno:</label>
                                            <input name="name" id="name" type="text" placeholder="Nome do aluno" class="form-control">
                                        </div>

                                        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                        <div class="form-group col-sm-4">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->linkedDisciplines as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group col-sm-3 col-lg-2 col-7">

                                            <label for="">Unidade:</label>

                                            <select id="unity" class="form-control custom-select" name="unity" required>

                                                <option value="0">Todas</option>

                                                <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                    <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <input type="hidden" name="classId" value="<?= $this->view->classData[0]->class_id ?>">
                                        <input type="hidden" id="examDescription" name="examDescription" value="">

                                        <div class="form-group col-lg-2 col-sm-1 col-5">
                                            <label for="">&nbsp;</label>

                                            <div>
                                                <a class="btn btn-light w-100 p-2" href="" data-toggle="collapse" data-target="#activate-advanced-search-accordion" aria-expanded="false" aria-controls="activate-advanced-search-accordion"><i class="fas fa-filter"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="activate-advanced-search-accordion" class="collapse" data-parent="#seekNoteExamClass">

                                        <div class="form-row">

                                            <div class="form-group col-sm-4 col-6">

                                                <label for="">Ordenar por:</label>

                                                <select id="orderBy" class="form-control custom-select" name="orderBy" required>

                                                    <option value="highestGrade">Maior média</option>
                                                    <option value="lowestGrade">Menor média</option>
                                                    <option value="alphabetical">Ordem Alfabética</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-sm-4 col-6">

                                                <label for="">Status da média:</label>

                                                <select id="noteStatus" class="form-control custom-select" name="noteStatus" required>

                                                    <option value="0">Todos os status</option>
                                                    <option value="Aprovado">Aprovado</option>
                                                    <option value="Reprovado">Reprovado</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-sm-4">

                                                <label for="">Tipo da média:</label>

                                                <select id="averageType" class="form-control custom-select" name="averageType" required>

                                                    <option value="averageUnity">Média unidade</option>
                                                    <option value="averageEnd">Média final</option>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                            <div containerStudentsAverage class="col-lg-12 table-responsive p-0">

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>