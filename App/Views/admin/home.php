<section id="home">

    <div class="row main-container mb-3">

        <h5 class="col-lg-11 p-0 mx-auto mb-3">Visão Geral</h5>

        <div class="col-lg-11 mx-auto">

            <div class="row">

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
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="card">

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

            <div class="row mt-3">

                <div class="col-lg-6 pl-0">

                    <div class="col-lg-12 card">

                        - Avaliações
                        - Notas
                        - Notas finais
                        - Faltas
                        - Observações
                        - Alunos matriculados
                        -

                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="col-lg-12 card">

                        <?php

                        $data = [];

                        foreach ($this->view->listExam as $key => $value) {
                            $data['dados'][] = ['tipo' => 'exam', 'value' => $value];
                        }

                        if (count($data) != 0) {

                            foreach ($data['dados'] as $key => $part) {
                                $date = explode(' ', $part['value']->post_date);
                                $sort[$key] = strtotime($date[0]);
                            }

                            array_multisort($sort, SORT_DESC, $data['dados']);
                        }

                        $photoDir =  "/assets/img/teacherProfilePhotos/";

                        ?>

                        <div class="row p-2">

                            <?php foreach ($data['dados'] as $key => $value) {

                                if ($value['tipo'] == 'exam') { ?>

                                    <div class="col-lg-11 mx-auto recent-activities p-0">

                                        <div class="row d-flex align-items-center p-0">

                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->profilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                            <?php  
                                            
                                            $data = explode(' ', $value['value']->post_date); 
                                            $data = explode('-', $data[0]); 
                                            
                                            ?>

                                            <div class="col-lg-8 teacher-name"><?= $value['value']->teacher_name ?> - <?= $data[2] ?>/<?= $data[1] ?></div>

                                            <div class="col-lg-3 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-info">Avaliação</span></div>

                                        </div>

                                        <div class="row">

                                            <p class="mt-3 col-lg-12 p-0 text-justify">Criou a avaliação "<?= $value['value']->exam_description ?>" referente a <?= $value['value']->unity ?> unidade da disciplina de <?= $value['value']->discipline_name ?> na turma do <?= $value['value']->acronym_series ?>ª <?= $value['value']->ballot ?>-<?= $value['value']->course ?>-<?= $value['value']->shift ?></p>

                                        </div>


                                    </div>

                                    <hr class="col-lg-10 mx-auto">

                            <?php }
                            } ?>

                        </div>

                    </div>

                </div>

            </div>

</section>