<div id="class">

    <div class="row main-container">

        <div class="col-lg-12 accordion" id="class-accordion">

            <div class="col-lg-11 mx-auto mb-4 mt-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão das turmas</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" id="collapseListClass" data-target="#class-list"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Turmas</span></a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" id="collapseAddClass" data-toggle="collapse" data-target="#add-class"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


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


                                        <table class="table table-borderless table-hover">

                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome da turma</th>
                                                    <th scope="col">Total de alunos</th>
                                                    <th scope="col">Período letivo</th>
                                                    <th scope="col">Média da turma</th>
                                                </tr>
                                            </thead>

                                            <tbody containerListClass>
                                                <?php require '../App/Views/admin/management/listElement/listClass.php' ?>
                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="modal modal-profile fade" id="class-profile-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content p-2">
                                                <div class="row">
                                                    <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="fas fa-times-circle text-white mr-3 mt-2"></i></span>
                                                        </button></div>
                                                </div>

                                                <div class="modal-body">

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

                                                                                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#teacher-list"><span class="mr-2"><i class="fas fa-chalkboard-teacher"></i> Professores</span></a>


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

                                                                                                                            <tbody>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-red" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-blue" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-green" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-golden" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-red" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-green" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 registered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 unregistered-unit-icon"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

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

                                                                                                                            <tbody>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>




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
                                                                                                <div class="collapse show card" id="list-discipline" data-parent="#class-discipline-accordion">
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-12 table-responsive">

                                                                                                            <table class="table table-borderless table-hover">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th scope="col">Sigla Disciplina</th>
                                                                                                                        <th scope="col">Modalidade da disciplina</th>

                                                                                                                        <th scope="col">Professor</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Ensino Técnico</td>

                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>

                                                                                                                </tbody>
                                                                                                            </table>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>




                                                                                                <div class="collapse card" id="add-discipline" data-parent="#class-discipline-accordion">
                                                                                                    <div class="row">


                                                                                                        <form class="col-lg-12" action="">

                                                                                                            <div class="form-row mt-3 mb-4">

                                                                                                                <div class="form-group col-lg-5">
                                                                                                                    <label for="">Professor:</label>

                                                                                                                    <select id="inputState" class="form-control custom-select" required>
                                                                                                                        <option>Ana Silva</option>
                                                                                                                        <option>Meickson</option>
                                                                                                                        <option>Tassio</option>
                                                                                                                        <option>Carlos</option>
                                                                                                                    </select>

                                                                                                                </div>

                                                                                                                <div class="form-group col-lg-4">
                                                                                                                    <label for="">Disciplina:</label>

                                                                                                                    <select id="inputState" class="form-control custom-select" required>
                                                                                                                        <option>Matemática</option>
                                                                                                                        <option>Biologia</option>
                                                                                                                        <option>Português</option>
                                                                                                                        <option>Filosofia</option>
                                                                                                                    </select>

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
                                                </div>
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