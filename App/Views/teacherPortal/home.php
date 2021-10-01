<section id="home">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <div class="row">

                <h5 class="col-lg-12">Visão Geral</h5>

            </div>

            <div class="row mt-2">

                <div class="col-lg-6">

                    <div class="row">

                      <!--   <div class="col-lg-4">

                            <div class="card border">

                                <div class="card-title">Alunos totais</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="fas fa-user-check mr-2"></i></i> <?= $this->view->totalStudents ?></div>

                                </div>

                            </div>

                        </div>
 -->
                        <div class="col-lg-6">

                            <div class="card">

                                <div class="card-title">Unidade atual</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="fas fa-boxes mr-2"></i> <?= $this->view->unitControlCurrent[0]->option_value ?> unidade</div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card">

                                <div class="card-title">Período letivo ativo</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="far fa-calendar-alt mr-2"></i> <?= $this->view->SchoolTermActive[0]->option_text ?></div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="row mt-3">

                        <div class="col-lg-12">

                            <div class="card" style="height: 30vh;">

                               <canvas id="index-disciplines"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="row">

                        <div class="col-lg-12 recent-activities">

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

                                    $data = ($data == $today ? ' Hoje' : ' em '. $data);

                                    return $data;
                                }

                                $photoDir =  "/assets/img/teacherProfilePhotos/";
                                $photoStudentDir =  "/assets/img/studentProfilePhotos/";

                                ?>

                                <div class="row">

                                    <?php foreach ($data['dados'] as $key => $value) { ?>

                                        <?php if ($value['tipo'] == 'exam') { ?>

                                            <div class="col-lg-11 mx-auto">

                                                <div class="row d-flex align-items-center justify-content-between">

                                                    <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->profilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                    <div class="col-lg-6 teacher-name"> Você <?= currentDate($value['value']->post_date) ?></div>

                                                    <div class="col-lg-5 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-info ml-auto">Avaliação</span></div>

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

                                                    <div class="col-lg-6 teacher-name"> Você <?= currentDate($value['value']->post_date) ?></div>

                                                    <div class="col-lg-4 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-success">Nota avaliação</span></div>

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

                                                    <div class="col-lg-6 teacher-name"> Você <?= currentDate($value['value']->post_date) ?></div>

                                                    <div class="col-lg-4 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-primary">Faltas</span></div>

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

                                                    <div class="col-lg-6 teacher-name"> Você <?= currentDate($value['value']->post_date) ?></div>

                                                    <div class="col-lg-4 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-success">Média final</span></div>

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

                                                    <div class="col-lg-6 teacher-name"> Você em <?= currentDate($value['value']->post_date) ?></div>

                                                    <div class="col-lg-4 d-flex justify-content-end p-0"><span class="badge badge-pill p-2 badge-info">Observação</span></div>

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

                </div>

            </div>

        </div>

    </div>

</section>