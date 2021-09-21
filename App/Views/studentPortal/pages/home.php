<?php

if (!isset($_SESSION)) session_start();

isset($_SESSION['Student']) ? '' : header('Location: /portal-aluno');

?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Web Gest </title>
    <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/stylesheet.css">
</head>

<body id="studentPortal">

    <div class="container-fluid">

        <div id="pagina" class="row accordion bg-white">

            <div class="col-lg-12 p-0" id="studentPortal-accordion">

                <nav id="studentPortalNavbar" class="navbar navbar-expand-lg">

                    

                    <a class="navbar-brand" href="#"><?= $_SESSION['Student']['class'] ?></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">

                        <ul class="navbar-nav ml-auto d-flex align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" aria-expanded="true" href="#" data-toggle="collapse" data-target="#mural">Mural</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-expanded="false" href="#" data-toggle="collapse" data-target="#bulletin">Boletim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-expanded="false" href="#" data-toggle="collapse" data-target="#statistics" href="#">Turma</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <img class="" src="/assets/img/studentProfilePhotos/<?= $_SESSION['Student']['profilePhoto'] ?>" alt="" onerror="/assets/img/studentProfilePhotos/foto-vazia.jpg"></a>
                            </li>
                        </ul>

                    </div>
                </nav>


                <div class="modal fade modal-profile" id="settingsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">

                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#settingsModal">
                                        <span aria-hidden="true"><i class="fas fa-times-circle text-dark mr-3 mt-2"></i></span>
                                    </button></div>
                            </div>

                            <div containerSettingsModal class="modal-body"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-3">

                    <div class="collapse show mt-3" id="mural" data-parent="#studentPortal-accordion">

                        <div class="col-lg-11 mx-auto main-content">

                            <div class="row mt-4 d-flex justify-content-between ">

                                <div class="col-md-3 side-exams">

                                    <div class="row side-exams-content">

                                        <?php

                                        if (count($this->view->listExam) != 0) {

                                            foreach ($this->view->listExam as $key => $part) {
                                                $sort[$key] = strtotime($part->realize_date);
                                            }

                                            array_multisort($sort, SORT_DESC, $this->view->listExam);
                                        }

                                        $photoDir =  "/assets/img/teacherProfilePhotos/";

                                        ?>


                                        <h5 class="p-2 col-lg-11">Atividades recentes</h5>

                                        <?php if (count($this->view->listExam) > 1) { ?>

                                            <?php foreach ($this->view->listExam as $key => $value) { ?>

                                                <div class="col-lg-11 card mb-3">

                                                    <div class="row d-flex justify-content-center align-items-center">

                                                        <div class="col-lg-2"><img class="miniature-photo" src='<?= $value->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                        <div class="col-lg-10 name-teacher"><?= $value->teacher_name ?></div>

                                                    </div>

                                                    <div class="row">

                                                        <?php $data = explode('-', $value->realize_date);

                                                        $pointsOrTenths = '';

                                                        switch ($value->exam_value) {
                                                            case $value->exam_value > 1:
                                                                $pointsOrTenths = " pontos";
                                                                break;
                                                            case $value->exam_value < 1:
                                                                $pointsOrTenths = " décimos";
                                                                break;
                                                            case $value->exam_value == 1:
                                                                $pointsOrTenths = " ponto";
                                                                break;
                                                        }


                                                        ?>

                                                        <div class="col-lg-12 exam-description"><?= $value->discipline_name ?> - <?= $value->exam_description ?> - <?= $value->unity ?> ª Unidade </div>

                                                    </div>

                                                    <div class="row exam-description-footer">

                                                        <div class="col-lg-6">Valor: <?= $value->exam_value ?> <?= $pointsOrTenths ?></div>

                                                        <div class="col-lg-6">Data: <?= $data[2] ?>-<?= $data[1] ?>-<?= $data[0] ?></div>

                                                    </div>

                                                </div>

                                            <?php }
                                        } else { ?>


                                            <div class="col-lg-11 card mb-3">
                                                <p>Nenhum exame adicionado até o momento</p>
                                            </div>

                                        <?php } ?>

                                    </div>

                                </div>

                                <div class="col-md-9 side-mural">

                                    <div class="row">

                                        <h5 class="p-2 col-lg-11 ml-4">Postagens recentes</h5>

                                        <?php

                                        $data = [];
                                        $photoDir =  "/assets/img/teacherProfilePhotos/";

                                        foreach ($this->view->listNote as $key => $note) {
                                            $data['dados'][] = ['tipo' => 'note', 'value' => $note];
                                        }

                                        foreach ($this->view->listObservation as $key => $observation) {
                                            $data['dados'][] = ['tipo' => 'observation', 'value' => $observation];
                                        }

                                        foreach ($this->view->lackList as $key => $lack) {
                                            $data['dados'][] = ['tipo' => 'lack', 'value' => $lack];
                                        }

                                        foreach ($this->view->disciplineAverageList as $key => $disciplineAverage) {
                                            $data['dados'][] = ['tipo' => 'disciplineAverage', 'value' => $disciplineAverage];
                                        }

                                        if (count($data) != 0) {

                                            foreach ($data['dados'] as $key => $part) {
                                                $sort[$key] = strtotime($part['value']->post_date);
                                            }

                                            array_multisort($sort, SORT_DESC, $data['dados']);
                                        }



                                        ?>

                                        <?php if (count($this->view->checkForRegistration) != 1 && $this->view->currentStatusRematrium[0]->option_value == 1 && $this->view->studentDataGeneral[0]->schoolTermSituation == 1) { ?>

                                            <div class="col-lg-12 card mb-3">

                                                <div class="row p-2">

                                                    <div class="col-lg-12">

                                                        <div class="row d-flex align-items-center">

                                                            <h5 class="col-lg-8">Rematrícula</h5>

                                                            <div class="col-lg-4 d-flex justify-content-end align-items-center"><i class="fas fa-paperclip text-secondary"></i></div>

                                                        </div>

                                                        <div class="row">

                                                            <form action="" class="col-lg-12" id="addRematrug">

                                                                <input type="hidden" name="enrollmentId" value="<?= $_SESSION['Student']['enrollmentId'] ?>">

                                                                <div class="form-row mt-3 ">

                                                                    <div class="form-group col-lg-8">

                                                                        <label for="">Você deseja se rematriculado ?</label><br>

                                                                        <?php foreach ($this->view->rematrugSituationList as $key => $value) { ?>

                                                                            <div class="custom-control custom-radio custom-control-inline mt-3">
                                                                                <input type="radio" id="rematricula<?= $value->option_value ?>" value="<?= $value->option_value ?>" name="rematrugSituation" class="custom-control-input">
                                                                                <label class="custom-control-label" for="rematricula<?= $value->option_value ?>"><?= $value->option_text ?></label>
                                                                            </div>

                                                                        <?php } ?>

                                                                    </div>

                                                                    <div class="form-group col-lg-3 ml-auto">

                                                                        <label for="">&nbsp;</label></br>

                                                                        <button id="buttonAddRematrug" type="submit" class="btn main-button text-white w-100">Confirmar</button>

                                                                    </div>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        <?php } ?>

                                        <?php if (count($data) != 0) { ?>

                                            <?php foreach ($data['dados'] as $key => $value) {

                                                if ($value['tipo'] == 'note') { ?>

                                                    <div class="col-lg-11 mx-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                            <div class="col-lg-11">

                                                                <p class="mt-2 text-description mb-2"><?= $value['value']->teacher_name ?> atribuiu sua nota em <?= $value['value']->exam_description ?> da <?= $value['value']->unity ?> unidade de <?= $value['value']->discipline_name ?></p>

                                                                <?php $data = explode('-',  $value['value']->post_date) ?>

                                                                <div class="col-lg-12 p-0">
                                                                    <div class="row">
                                                                        <div class="col-lg-8"><small class="font-weight-bold p-0">Você obteve <?= number_format($value['value']->note_value, 1, '.', '') ?> / <?= number_format($value['value']->exam_value, 1, '.', '') ?> </small></div>
                                                                        <div class="col-lg-4 d-flex justify-content-end"><small class="font-weight-normal p-0"> <i class="fas fa-history mr-2"></i>Postado em <?= $data[2] ?>/<?= $data[1] ?></small></div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>


                                                <?php } else if ($value['tipo'] == 'observation') { ?>

                                                    <div class="col-lg-11 mx-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-start"><img class="miniature-photo" src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                            <div class="col-lg-11">

                                                                <p class="mt-2 text-description mb-3">Você recebeu uma observação de <?= $value['value']->teacherName ?> referente a <?= $value['value']->unity ?> unidade de <?= $value['value']->disciplineName ?></p>

                                                                <textarea class="col-lg-12 form-control p-3" disabled name="" id="" cols="30" rows="3" value=""><?= $value['value']->observationDescription ?></textarea>

                                                                <?php

                                                                $dateTime = explode(' ', $value['value']->post_date);
                                                                $data = explode('-', $dateTime[0]);

                                                                ?>

                                                                <small class="font-weight-normal col-lg-12 d-flex justify-content-end align-items-center mt-3 p-0"> <i class="fas fa-history mr-2"></i>Postado em <?= $data[2] ?>/<?= $data[1] ?></small>

                                                            </div>

                                                        </div>

                                                    </div>

                                                <?php } else if ($value['tipo'] == 'lack') { ?>

                                                    <div class="col-lg-11 mx-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                            <div class="col-lg-11">

                                                                <p class="mt-2 text-description mb-2"><?= $value['value']->teacherName ?> atribuiu suas faltas da <?= $value['value']->unity ?> unidade de <?= $value['value']->disciplineName ?></p>

                                                                <?php $data = explode('-',  $value['value']->post_date) ?>

                                                                <div class="col-lg-12 p-0">
                                                                    <div class="row">
                                                                        <div class="col-lg-8"><small class="font-weight-bold p-0">Você obteve um total de <?= $value['value']->totalLack ?> faltas</small></div>
                                                                        <div class="col-lg-4 d-flex justify-content-end"><small class="font-weight-normal p-0"> <i class="fas fa-history mr-2"></i>Postado em <?= $data[2] ?>/<?= $data[1] ?></small></div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>


                                                <?php } else if ($value['tipo'] == 'disciplineAverage') { ?>


                                                    <div class="col-lg-11 mx-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img class="miniature-photo" src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                                            <div class="col-lg-11">

                                                                <p class="mt-2 text-description mb-2"><?= $value['value']->teacherName ?> atribuiu a sua média final na disciplina de <?= $value['value']->disciplineName ?></p>

                                                                <?php $data = explode('-',  $value['value']->post_date) ?>

                                                                <div class="col-lg-12 p-0">
                                                                    <div class="row">
                                                                        <div class="col-lg-8"><small class="font-weight-bold p-0">Sua média final foi de <?= number_format($value['value']->average, 1, '.', '') ?> - Você está <?= lcfirst($value['value']->subtitle) ?> na disciplina</small></div>
                                                                        <div class="col-lg-4 d-flex justify-content-end"><small class="font-weight-normal p-0"> <i class="fas fa-history mr-2"></i>Postado em <?= $data[2] ?>/<?= $data[1] ?></small></div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>


                                            <?php }
                                            }
                                        } else { ?>


                                            <div class="col-lg-11 mx-auto card mb-3">Nenhuma postagem até o momento</div>

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="collapse mt-3" id="bulletin" data-parent="#studentPortal-accordion">

                        <div containerBulletin class="col-lg-10 mx-auto card mb-4"></div>

                    </div>

                    <div class="collapse mt-3" id="statistics" data-parent="#studentPortal-accordion">

                        <div class="row">

                            <div class="col-lg-10 mx-auto">

                                <div class="row mt-3 d-flex mb-4">

                                    <div class="col-lg-6">

                                        <div class="card side-students">

                                            <div class="row">

                                                <h5 class="col-lg-12">Colegas</h5>

                                                <div class="col-lg-12 table-responsive">

                                                    <table class="table col-lg-12 table-hover mt-3 table-borderless ">

                                                        <tbody class="">

                                                            <?php require '../App/Views/admin/student/components/studentListing.php' ?>

                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="card side-teachers">

                                            <div class="row">

                                                <h5 class="col-lg-12 ml-4">Professores</h5>

                                                <div class="col-lg-12 table-responsive">

                                                    <table class="table col-lg-12 table-hover mt-3 table-borderless ">

                                                        <tbody class="">

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

</body>

<script src="/node_modules/jquery/dist/jquery.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>

<script src="/node_modules/chart.js/dist/Chart.min.js"></script>

<script src="/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

<script src="/assets/js/utilities/Tools.js"></script>

<script src="/assets/js/utilities/Validation.js"></script>

<script src="/assets/js/utilities/Application.js"></script>

<script src="/assets/js/utilities/Management.js"></script>

<script src="/assets/js/utilities/style.js"></script>

<script src="/assets/js/main.js"></script>


</html>