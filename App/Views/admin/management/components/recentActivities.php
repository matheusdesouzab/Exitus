<?php 
require __DIR__ . '../../../../../config/variables.php';
?>

<div class="card">

    <div class="card-title">Linha do tempo</div>

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

    foreach ($this->view->listWarning as $key => $value) {
        $data['dados'][] = ['tipo' => 'warning', 'value' => $value];
    }

    if (count($data) != 0) {

        $ord = [];

        foreach ($data['dados'] as $key => $part){
            $ord[] = strtotime($part['value']->post_date);
        }

        array_multisort($ord, SORT_DESC, $data['dados']);
    }

    function currentDate($array)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $today = date('d-m');

        $data = explode(' ', $array);
        $data = explode('-', $data[0]);
        $data = $data[2] . '/' . $data[1];

        $data = ($data == $today ? 'Hoje' : $data);

        return $data;
    }

    $photoDir =  "$app_url/assets/img/teacherProfilePhotos/";
    $photoStudentDir =  "$app_url/assets/img/studentProfilePhotos/";

    ?>


    <div class="row p-2">

        <?php

        if (count($data) > 0) {

            foreach ($data['dados'] as $key => $value) { ?>

                <?php if ($value['tipo'] == 'exam') { ?>

                    <div class="col-11 mx-auto">

                        <div class="row d-flex align-items-center flex-nowrap justify-content-between">

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                            <div class="col-7 teacher-name"><?= isset($teacherName) ? $teacherName : $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                            <div class="col-4 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-info ml-auto">Avaliação</span></div>

                        </div>

                        <div class="row">

                            <p class="mt-3 text-justify">Criou a avaliação "<?= $value['value']->exam_description ?>" referente a <?= $value['value']->unity ?>ª unidade da disciplina de <?= $value['value']->discipline_name ?> na turma do <?= $value['value']->acronym_series ?>ª <?= $value['value']->ballot ?>-<?= $value['value']->course ?>-<?= $value['value']->shift ?></p>

                        </div>


                    </div>

                    <hr class="col-10 col-md-11 mx-auto mt-0 mb-3">

                <?php } else if ($value['tipo'] == 'note') { ?>

                    <div class="col-11 mx-auto">

                        <div class="row d-flex align-items-center justify-content-between flex-nowrap">

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->student_profile_photo == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->student_profile_photo ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"' style="margin-left: -30px"></div>

                            <div class="col-6 teacher-name"><?= isset($teacherName) ? $teacherName : $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                            <div class="col-4 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-success">Nota avaliação</span></div>

                        </div>

                        <div class="row">

                            <p class="mt-3 col-lg-12 p-0 text-justify">Lançou a nota do aluno(a): <?= $value['value']->student_name ?> referente a avaliação "<?= $value['value']->exam_description  ?>" da <?= $value['value']->unity ?>ª unidade da disciplina de <?= $value['value']->discipline_name ?></p>

                        </div>

                    </div>

                    <hr class="col-10 col-md-11 mx-auto mt-0 mb-3">

                <?php } else if ($value['tipo'] == 'lack') { ?>

                    <div class="col-11 mx-auto">

                        <div class="row d-flex align-items-center justify-content-between flex-nowrap">

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->student_profile_photo == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->student_profile_photo ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"' style="margin-left: -30px"></div>

                            <div class="col-8 teacher-name"><?= isset($teacherName) ? $teacherName : $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                            <div class="col-2 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-primary">Faltas</span></div>

                        </div>

                        <div class="row">

                            <p class="mt-3 col-lg-12 p-0 text-justify">Lançou as faltas do aluno(a): <?= $value['value']->student_name ?> referente a <?= $value['value']->unity ?>ª unidade da disciplina de <?= $value['value']->discipline_name ?></p>

                        </div>


                    </div>

                    <hr class="col-10 col-md-11 mx-auto mt-0 mb-3">


                <?php } else if ($value['tipo'] == 'disciplineAverage') { ?>

                    <div class="col-11 mx-auto">

                        <div class="row d-flex align-items-center justify-content-between flex-nowrap">

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->student_profile_photo == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->student_profile_photo ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"' style="margin-left: -30px"></div>


                            <div class="col-8 teacher-name"><?= isset($teacherName) ? $teacherName : $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                            <div class="col-2 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-success">Média final</span></div>

                        </div>

                        <div class="row">

                            <p class="mt-3 col-lg-12 p-0 text-justify">Lançou a média final do aluno(a): <?= $value['value']->student_name ?> referente a disciplina de <?= $value['value']->discipline_name ?></p>

                        </div>


                    </div>

                    <hr class="col-10 col-md-11 mx-auto mt-0 mb-3">

                <?php } else if ($value['tipo'] == 'observation') { ?>

                    <div class="col-11 mx-auto">

                        <div class="row d-flex align-items-center justify-content-between flex-nowrap">

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->student_profile_photo == null ? $photoStudentDir . "foto-vazia.jpg" : $photoStudentDir . $value['value']->student_profile_photo ?>' alt="" onerror='this.src="<?= $photoStudentDir . "foto-vazia.jpg" ?>"' style="margin-left: -30px"></div>

                            <div class="col-8 teacher-name"><?= isset($teacherName) ? $teacherName : $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                            <div class="col-2 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-info">Observação</span></div>

                        </div>

                        <div class="row">

                            <p class="mt-3 col-lg-12 p-0 text-justify">Adicionou uma observação ao aluno(a): <?= $value['value']->student_name ?> referente a <?= $value['value']->unity ?> unidade da disciplina de <?= $value['value']->discipline_name ?></p>

                        </div>

                    </div>

                    <hr class="col-10 col-md-11 mx-auto mt-0 mb-3">

                <?php } else if ($value['tipo'] == 'warning') { ?>

                    <div class="col-11 mx-auto">

                        <div class="row d-flex align-items-center justify-content-between flex-nowrap">

                            <div class="col-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                            <div class="col-7 teacher-name"><?= isset($teacherName) ? $teacherName : $value['value']->teacher_name ?> - <?= currentDate($value['value']->post_date) ?></div>

                            <div class="col-4 d-flex justify-content-end"><span class="badge badge-pill p-2 badge-warning">Aviso</span></div>

                        </div>

                        <div class="row">

                            <p class="mt-3 col-lg-12 p-0 text-justify">Adicionou na turma <?= $value['value']->acronym_series ?>ª <?= $value['value']->ballot ?>-<?= $value['value']->course ?>-<?= $value['value']->shift ?> o seguite aviso: "<?= $value['value']->warning ?>"</p>

                        </div>

                    </div>

                    <hr class="col-10 col-md-11 mx-auto mt-0 mb-3">

            <?php }
            }
        } else { ?>

            <div class="col-11 mx-auto">

                <div class="row">

                    <img class="enrollment-null d-block mx-auto" src="<?= $app_url ?>/assets/img/illustrations/timeline.svg" alt="">

                    <p class="mt-3 col-lg-12 p-0 text-justify text-right">A linha do tempo está vazia</p>

                </div>

            </div>


        <?php } ?>

    </div>

</div>