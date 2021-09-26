<section id="home">

    <div class="row main-container mb-3">

        <h5 class="col-lg-11 p-0 mx-auto mb-3">Visão Geral</h5>

        <div class="col-lg-11 mx-auto">

            <div class="container">

            <div class="row ">

                <div class="col-lg-7">

                    <div class="row">

                        <div class="col-lg-4 d-flex justify-content-start p-0">

                            <div class="card w-100">

                                <div class="card-title">Alunos matrículados</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-7 total-student-enrolled"><i class="fas fa-user-check mr-2"></i></i> <?= $this->view->studentTotal ?></div>

                                    <div class="col-lg-5 total-students-enrolled-today">+ <?= $this->view->studentsAddedToday[0]->totalStudent ?></div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="card">

                                <div class="card-title">Unidade atual</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="fas fa-boxes mr-2"></i> <?= $this->view->unitControlCurrent[0]->option_value ?> unidade</div>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-4 d-flex justify-content-end p-0">

                            <div class="card w-100">

                                <div class="card-title">Período letivo ativo</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="far fa-calendar-alt mr-2"></i> <?= $this->view->SchoolTermActive[0]->option_text ?></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-12 card">
                            <canvas id="studenDivisionChartCourse"></canvas>
                        </div>

                    </div>

                </div>

                <div class="col-lg-5 recently-enrolled">

                    <div class="col-lg-12 card">

                        <div class="card-title p-2">Recentes matrículados</div>

                        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

                        <table class="table table-hover table-borderless border-top">

                            <tbody>

                                <?php foreach ($this->view->recentlyEnrolledStudents as $key => $value) {

                                    $date = explode(" ", $value->initialEnrollmentDate);
                                    $date = explode("-", $date[0]);

                                ?>

                                    <tr>
                                        <td class=""><img class="miniature-photo" src='<?= $value->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                        <td class="text-left"><?= $value->studentName ?></td>
                                        <td><?= $date[2] ?> / <?= $date[1] ?></td>
                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="row mt-4">

                <div class="col-lg-6 pl-0">

                    <div class="col-lg-12 pl-0 recent-activities">

                        <div class="card">

                            <div class="card-title p-2">Linha do tempo</div>

                            <?php

                            $data = [];

                            foreach ($this->view->listExam as $key => $value) {
                                $data['dados'][] = ['tipo' => 'exam', 'value' => $value];
                            }

                            foreach ($this->view->listNote as $key => $value) {
                                $data['dados'][] = ['tipo' => 'note', 'value' => $value];
                            }

                            foreach ($this->view->listLack as $key => $value) {
                                $data['dados'][] = ['tipo' => 'lack', 'value' => $value];
                            }

                            foreach ($this->view->listDisciplineAverage as $key => $value) {
                                $data['dados'][] = ['tipo' => 'disciplineAverage', 'value' => $value];
                            }

                            foreach ($this->view->listObservation as $key => $value) {
                                $data['dados'][] = ['tipo' => 'observation', 'value' => $value];
                            }

                            if (count($data) != 0) {

                                foreach ($data['dados'] as $key => $part) {
                                    $date = explode(' ', $part['value']->post_date);
                                    $sort[$key] = strtotime($date[0]);
                                }

                                array_multisort($sort, SORT_DESC, $data['dados']);
                            }

                            function currentDate($array)
                            {

                                date_default_timezone_set('America/Sao_Paulo');
                                $today = date('d-m');

                                $data = explode(' ', $array);
                                $data = explode('-', $data[0]);
                                $data = $data[2] . '-' . $data[1];

                                $data = ($data == $today ? 'Hoje' : $data);

                                return $data;
                            }

                            $photoDir =  "/assets/img/teacherProfilePhotos/";
                            $photoStudentDir =  "/assets/img/studentProfilePhotos/";

                            ?>

                            <div class="row p-2">

                                <?php foreach ($data['dados'] as $key => $value) { ?>

                                    <?php if ($value['tipo'] == 'exam') { ?>

                                        <div class="col-lg-11 mx-auto">

                                            <div class="row d-flex align-items-center justify-content-between">

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->profilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-8 teacher-name"><?= $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                                                <div class="col-lg-3 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-info ml-auto">Avaliação</span></div>

                                            </div>

                                            <div class="row p-0">

                                                <p class="mt-3 col-lg-12 p-0 text-justify">Criou a avaliação "<?= $value['value']->exam_description ?>" referente a <?= $value['value']->unity ?> unidade da disciplina de <?= $value['value']->discipline_name ?> na turma do <?= $value['value']->acronym_series ?>ª <?= $value['value']->ballot ?>-<?= $value['value']->course ?>-<?= $value['value']->shift ?></p>

                                            </div>


                                        </div>

                                        <hr class="col-lg-10 mx-auto mt-0 mb-3">

                                    <?php } else if ($value['tipo'] == 'note') { ?>

                                        <div class="col-lg-11 mx-auto">

                                            <div class="row d-flex align-items-center justify-content-between">

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->student_profile_photo == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->student_profile_photo ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-7 teacher-name"><?= $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                                                <div class="col-lg-3 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-success">Nota avaliação</span></div>

                                            </div>

                                            <div class="row">

                                                <p class="mt-3 col-lg-12 p-0 text-justify">Lançou a nota do aluno(a): <?= $value['value']->student_name ?> referente a avaliação "<?= $value['value']->exam_description  ?>" da <?= $value['value']->unity ?> unidade da disciplina de <?= $value['value']->discipline_name ?></p>

                                            </div>

                                        </div>

                                        <hr class="col-lg-10 mx-auto mt-0 mb-3">

                                    <?php } else if ($value['tipo'] == 'lack') { ?>

                                        <div class="col-lg-11 mx-auto">

                                            <div class="row d-flex align-items-center justify-content-between">

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->studentProfilePhoto == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->studentProfilePhoto ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-8 teacher-name"><?= $value['value']->teacherName ?> - <?= currentDate($value['value']->post_date) ?></div>

                                                <div class="col-lg-2 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-primary">Faltas</span></div>

                                            </div>

                                            <div class="row">

                                                <p class="mt-3 col-lg-12 p-0 text-justify">Lançou as faltas do aluno(a): <?= $value['value']->studentName ?> referente a <?= $value['value']->unity ?> unidade da disciplina de <?= $value['value']->disciplineName ?></p>

                                            </div>


                                        </div>

                                        <hr class="col-lg-10 mx-auto mt-0 mb-3">


                                    <?php } else if ($value['tipo'] == 'disciplineAverage') { ?>

                                        <div class="col-lg-11 mx-auto">

                                            <div class="row d-flex align-items-center justify-content-between">

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->studentProfilePhoto == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->studentProfilePhoto ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"'></div>


                                                <div class="col-lg-8 teacher-name"><?= $value['value']->teacherName ?> - <?= currentDate($value['value']->post_date) ?></div>

                                                <div class="col-lg-2 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-success">Média final</span></div>

                                            </div>

                                            <div class="row">

                                                <p class="mt-3 col-lg-12 p-0 text-justify">Lançou a média final do aluno(a): <?= $value['value']->studentName ?> referente a disciplina de <?= $value['value']->disciplineName ?></p>

                                            </div>


                                        </div>

                                        <hr class="col-lg-10 mx-auto mt-0 mb-3">

                                    <?php } else if ($value['tipo'] == 'observation') { ?>

                                        <div class="col-lg-11 mx-auto">

                                            <div class="row d-flex align-items-center justify-content-between">

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->studentProfilePhoto == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->studentProfilePhoto ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"'></div>


                                                <div class="col-lg-8 teacher-name"><?= $value['value']->teacherName ?> - <?= currentDate($value['value']->post_date) ?></div>

                                                <div class="col-lg-2 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-info">Observação</span></div>

                                            </div>

                                            <div class="row">

                                                <p class="mt-3 col-lg-12 p-0 text-justify">Adicionou uma observação ao aluno(a): <?= $value['value']->studentName ?> referente a <?= $value['value']->unity ?> unidade da disciplina de <?= $value['value']->disciplineName ?></p>

                                            </div>


                                        </div>

                                        <hr class="col-lg-10 mx-auto mt-0 mb-3">

                                <?php }
                                } ?>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-6 pr-0 pl-0">

                    <div class="col-lg-12 pr-0 pl-0">

                        <div class="card mb-3" style="height:36vh">

                            <canvas class="" id="graphCurrentStudentSituation"></canvas>

                        </div>

                        <div class="row">

                           <!--  <div class="col-lg-12" style="height:36vh">

                                <canvas class="card" id="graphSituationEngramentesReceived"></canvas>

                            </div> -->

                           <div class="col-lg-12" style="height:36vh">

                                <canvas class="card" id="grafico2"></canvas>

                            </div> 

                        </div>

                       <!--  <div class="row mt-3">

                            <div class="col-lg-12 p-0">

                                <div class="card col-lg-12">

                                    <div class="text-center font-weight-bold card-title m-0 p-2" id="clock"></div>

                                </div>

                            </div>

                        </div> -->


                    </div>

                </div>

            </div>

        </div>

        </div>

</section>