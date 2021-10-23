<div class="row mb-4 d-flex justify-content-around" id="main-accordion-class">

    <div class="col-lg-3 col-11 mx-auto">

        <div class="col-lg-12 modal-sidebar">

            <div class="row p-3">

                <div class="col-lg-12 container-list-group">

                    <div class="row">

                        <nav>

                            <ul>

                                <a class="collapse show" href="#" data-toggle="collapse" aria-expanded="true" data-target="#accordion-class-data"><i class="fas fa-user-friends mr-2"></i> Dados da turma</a>

                                <?php if (!isset($_SESSION)) session_start(); ?>

                                <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-profile-assessments"><i class="fas fa-paste mr-3"></i> Avaliações</a>

                                <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-note-history"><i class="fas fa-poll-h mr-3"></i> Notas das avaliações</a>

                                <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-student-average"><i class="fas fa-poll mr-3"></i> Médias dos alunos</a>


                                <?php

                                if (isset($_SESSION['Admin']) && $_SESSION['Admin']['hierarchyFunction'] <= 2) {

                                ?>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-discipline-accordion"><i class="fas fa-boxes mr-3"></i> Disciplinas vinculadas</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-rematrug"><i class="fas fa-redo mr-3"></i> Rematrícula</a>

                                    <a class="collapsed" href="#" data-toggle="collapse" aria-expanded="false" data-target="#class-settings"><i class="fas fa-cog mr-3"></i> Configurações</a>


                                <?php } ?>


                            </ul>

                        </nav>

                    </div>
                </div>

                <form action="" id="dataClass">

                    <input type="hidden" name="series" value="<?= $this->view->classData[0]->seriesId ?>">
                    <input type="hidden" name="course" value="<?= $this->view->classData[0]->courseId ?>">
                    <input type="hidden" name="classId" value="<?= $this->view->classData[0]->class_id ?>">

                </form>


                <div class="col-lg-12 mt-4">

                    <div class="row p-3 text-secondary main-sheet">

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

    <div class="col-lg-9 col-11 mx-auto">

        <div class="col-lg-12 card main-content">

            <div class="row">

                <div class="col-lg-11 mx-auto collapse show" id="accordion-class-data" data-parent="#main-accordion-class">

                    <div class="col-lg-12 mb-4 mt-4">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-6">
                                <h5><?= $this->view->classData[0]->series_acronym ?>ª <?= $this->view->classData[0]->ballot ?> <?= $this->view->classData[0]->course ?> <?= $this->view->classData[0]->shift ?></h5>
                            </div>

                            <div class="col-lg-6 col-12 collapse-options-container">

                                <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#students-list"><span class="mr-2"><i class="fas fa-user-friends"></i> Alunos</span></a>

                                <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#teacher-list" routeData="<?= $this->view->classId ?>"><span class="mr-2"><i class="fas fa-chalkboard-teacher"></i> Docentes</span></a>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="row mb-3">

                            <div class="collapse show card col-lg-12" id="students-list" data-parent="#accordion-class-data">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">

                                        <table class="table col-lg-12 table-hover table-borderless ">

                                            <thead>
                                                <tr>
                                                    <th colspan="2">Nome do aluno</th>
                                                    <th>Situação atual</th>
                                                    <th>Média letiva</th>
                                                </tr>
                                            </thead>

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
                                        <table class="table col-lg-12 table-hover  table-borderless ">

                                            <thead>
                                                <tr>
                                                    <th colspan="2">Nome do docente</th>
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

                    <div class="col-lg-12 mb-4 mt-4">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5">
                                <h5>Disciplinas</h5>
                            </div>

                            <div class="col-lg-7 col-12 collapse-options-container">

                                <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-discipline"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Disciplinas</span></a>

                                <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-discipline"><span class="mr-2 "><i class="fas fa-plus mr-2"></i> Adicionar</span></a>


                            </div>


                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="row mb-3">

                            <div class="col-lg-12">
                                <div class="collapse show" id="list-discipline" data-parent="#class-discipline-accordion">
                                    <div class="col-lg-12 p-0" containerListDisciplineClass>

                                        <?php require '../App/Views/admin/management/components/disciplineClass.php' ?>

                                    </div>

                                </div>


                                <div class="collapse card" id="add-discipline" data-parent="#class-discipline-accordion">
                                    <div class="row">

                                        <form class="col-lg-11 mx-auto" id="addClassDiscipline" action="">

                                            <div class="form-row mt-3">

                                                <div class="form-group col-lg-6">

                                                    <label for="">Professor:</label>

                                                    <select id="teacher" name="teacher" class="form-control custom-select" required>

                                                        <?php foreach ($this->view->teacherAvailable as $key => $teacher) { ?>

                                                            <option value="<?= $teacher->option_value ?>"><?= $teacher->option_text ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                <input type="hidden" name="classId" value="<?= $this->view->classId ?>">

                                                <div class="form-group col-lg-6">

                                                    <label for="">Disciplina</label>

                                                    <select id="disciplineClass" name="disciplineClass" class="form-control custom-select" required></select>

                                                </div>

                                            </div>

                                            <div class="form-row d-flex justify-content-end">

                                                <div class="form-group col-lg-5">
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

                        <div class="col-lg-12 mb-4 mt-3">
                            <div class="row d-flex align-items-between">
                                <div class="col-lg-5 p-0">
                                    <h5>Avaliações da turma</h5>
                                </div>

                                <div class="col-lg-7 col-12 collapse-options-container p-0 mr-0">

                                    <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-exam"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Avaliações</span></a>

                                    <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-assessments"><span class="mr-2"><i class="fas fa-plus mr-2"></i> Adicionar</span></a>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 p-0">

                            <div class="collapse show" id="list-exam" data-parent="#class-assessments-accordion">

                                <form id="seekExam" class="text-dark mt-3" action="">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-lg-5">
                                            <label for="">Descrição:</label>
                                            <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                        </div>

                                        <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                        <div class="form-group col-lg-4">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

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


                                <div containerExamsList></div>

                            </div>

                            <div class="collapse card" id="add-assessments" data-parent="#class-assessments-accordion">

                                <form id="addExam" class="col-lg-12">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-lg-6">

                                            <label for="">Descrição da avaliação:</label>
                                            <input class="form-control" id="examDescription" name="examDescription" type="text">

                                        </div>

                                        <div class="form-group col-lg-6">

                                            <label for="">Disciplina:</label>

                                            <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

                                                <?php foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) { ?>

                                                    <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-lg-5">
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

                                        <div class="form-group col-lg-3 ml-auto">
                                            <label for="">&nbsp;</label>
                                            <button id="buttonAddExam" class="btn btn-success w-100">Adicionar</button>
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

                    <div class="row">

                        <div class="col-lg-12">
                            <h5>Notas das avaliações</h5>
                        </div>

                        <div class='col-lg-12'>

                            <form id="seekNoteExamClass" class="text-dark  mt-3 accordion" action="">

                                <div class="form-row mt-3">

                                    <div class="form-group col-lg-4">
                                        <label for="">Descrição:</label>
                                        <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                    </div>

                                    <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                    <div class="form-group col-lg-3">

                                        <label for="">Disciplina:</label>

                                        <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

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

                                    <div class="form-group col-lg-2">
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

                        <div class="col-lg-12 table-responsive">

                            <hr class="">

                            <table class="table table-borderless col-lg-12 table-striped" id="note-table-class">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Nome do aluno</th>
                                        <th scope="col">Resultado</th>
                                        <th scope="col">Dados da avaliação</th>
                                    </tr>
                                </thead>
                                <tbody containerListNote></tbody>
                            </table>
                        </div>

                    </div>


                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-rematrug" data-parent="#main-accordion-class">

                    <div class="accordion" id="rematrug-accordion">

                        <div class="col-lg-12 mb-4 mt-3">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-5">
                                    <h5 class="">Rematrículas</h5>
                                </div>

                                <div class="col-lg-7 col-12 collapse-options-container">

                                    <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#rematrecules-received"><span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i>Solicitações</span></a>

                                    <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#finalized-rematrecules"><span class="mr-2"><i class="fas fa-check-circle mr-2"></i> Status da turma</span></a>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="collapse show col-lg-12" id="rematrecules-received" data-parent="#rematrug-accordion">

                                <div containerRematrugRequests class="row"></div>

                            </div>

                            <div class="collapse col-lg-12" id="finalized-rematrecules" data-parent="#rematrug-accordion">

                                <div containerRematrugFinalized class="row"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-settings" data-parent="#main-accordion-class">

                    <div class="row">

                        <h5 class="col-lg-12">Configurações da turma</h5>

                            <form class="mt-2 p-3 border col-lg-12" id="updateClass" action="">

                            <div class="font-weight-bold col-lg-12 mb-3">Atualizar dados da turma</div>

                                <div class="form-row col-lg-12">

                                    <div class="form-group col-lg-2">

                                        <label for="series">Série:</label>

                                        <select id="series" name="series" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->seriesId ?>"><?= $this->view->classData[0]->series_acronym ?></option>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-2">

                                        <label for="ballot">Cédula:</label>

                                        <select id="ballot" name="ballot" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->ballotId ?>"><?= $this->view->classData[0]->ballot ?></option>

                                            <?php foreach ($this->view->availableBallot as $key => $ballot) { ?>

                                                <?php if ($this->view->classData[0]->ballotId != $ballot->option_value) { ?>

                                                    <option value="<?= $ballot->option_value ?>"><?= $ballot->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-3">

                                        <label for="course">Curso:</label>

                                        <select id="course" name="course" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->courseId ?>"><?= $this->view->classData[0]->course ?></option>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-3">

                                        <label for="shift">Turno:</label>

                                        <select id="shift" name="shift" class="form-control custom-select">

                                            <option value="<?= $this->view->classData[0]->shiftId ?>"><?= $this->view->classData[0]->shift ?></option>

                                            <?php foreach ($this->view->availableShift as $key => $shift) { ?>

                                                <?php if ($this->view->classData[0]->shiftId != $shift->option_value) { ?>

                                                    <option value="<?= $shift->option_value ?>"><?= $shift->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                    <div class="form-group col-lg-2">

                                        <label for="classRoom">Sala:</label>

                                        <select id="classRoom" name="classRoom" class="form-control custom-select" required>

                                            <option value="<?= $this->view->classData[0]->classroomId ?>"><?= $this->view->classData[0]->classroom_number ?></option>

                                            <?php foreach ($this->view->availableClassRoom as $key => $classRoom) { ?>

                                                <?php if ($this->view->classData[0]->classroomId != $classRoom->option_value) { ?>

                                                    <option value="<?= $classRoom->option_value ?>"><?= $classRoom->option_text ?></option>

                                            <?php }
                                            } ?>

                                        </select>

                                    </div>

                                </div>

                                <input type="hidden" name="schoolTerm" value="<?= $this->view->classData[0]->school_term_id ?>">
                                <input type="hidden" name="classId" id="classId" value="<?= $this->view->classData[0]->class_id ?>">

                                <div class="form-row col-lg-12 mb-3 ">

                                    <div class="form-group ml-auto col-lg-3">
                                        <label for="">&nbsp;</label>
                                        <a id="buttonUpdateClass" class="btn btn-success w-100 text-center disabled" href="#">Atualizar dados</a>

                                    </div>

                                </div>

                            </form>

                    </div>

                </div>

                <div class="col-lg-11 mx-auto collapse" id="class-student-average" data-parent="#main-accordion-class">

                    <div class="row">

                        <div class="col-lg-12">
                            <h5>Médias dos alunos</h5>
                        </div>

                        <div class='col-lg-12'>

                            <form id="studentsAverageSeek" class="text-dark  mt-3 accordion" action="">

                                <div class="form-row mt-3">

                                    <div class="form-group col-lg-4">
                                        <label for="">Nome do aluno:</label>
                                        <input name="name" id="name" type="text" placeholder="Nome do aluno" class="form-control">
                                    </div>

                                    <input type="hidden" value="<?= $this->view->classId ?>" name="classId">

                                    

                                    <div class="form-group col-lg-3">

                                        <label for="">Disciplina:</label>

                                        <select id="disciplineClass" class="form-control custom-select" name="disciplineClass" required>

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

                                    <input type="hidden" name="classId" value="<?= $this->view->classData[0]->class_id ?>">
                                    <input type="hidden" id="examDescription" name="examDescription" value="">

                                    <div class="form-group col-lg-2">
                                        <label for="">&nbsp;</label>

                                        <div>
                                            <a class="btn btn-light w-100 p-2" href="" data-toggle="collapse" data-target="#activate-advanced-search-accordion" aria-expanded="false" aria-controls="activate-advanced-search-accordion"><i class="fas fa-filter"></i></a>
                                        </div>
                                    </div>

                                </div>

                                <div id="activate-advanced-search-accordion" class="collapse" data-parent="#seekNoteExamClass">

                                    <div class="form-row">

                                        <div class="form-group col-lg-3">

                                            <label for="">Ordenar por:</label>

                                            <select id="orderBy" class="form-control custom-select" name="orderBy" required>

                                                <option value="highestGrade">Maior média</option>
                                                <option value="lowestGrade">Menor média</option>
                                                <option value="alphabetical">Ordem Alfabética</option>

                                            </select>

                                        </div>

                                        <div class="form-group col-lg-3">

                                            <label for="">Status da média:</label>

                                            <select id="noteStatus" class="form-control custom-select" name="noteStatus" required>

                                                <option value="0">Todos os status</option>
                                                <option value="Aprovado">Aprovado</option>
                                                <option value="Reprovado">Reprovado</option>

                                            </select>

                                        </div>

                                        <div class="form-group col-lg-3">

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

                        <div containerStudentsAverage class="col-lg-12 table-responsive">
                            
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>