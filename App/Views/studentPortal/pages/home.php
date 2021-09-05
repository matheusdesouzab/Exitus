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

        <div id="pagina" class="row accordion">

            <div class="col-lg-12 p-0" id="studentPortal-accordion">

                <nav id="studentPortalNavbar" class="navbar navbar-expand-lg col-lg-12 d-flex justify-content-between">

                    <b class="navbar-brand" href="#"><?= $_SESSION['Student']['class'] ?></b>

                    <div class="navbar-nav d-flex justify-content-center" style="margin-left:-18vw">
                        <a class="nav-link" aria-expanded="true" href="#" data-toggle="collapse" data-target="#mural">Mural</a>
                        <a class="nav-link" aria-expanded="false" href="#" data-toggle="collapse" data-target="#bulletin">Boletim</a>
                        <a class="nav-link" href="/portal-aluno/sair">Ranking</a>
                    </div>

                    <img class="" src="/assets/img/studentProfilePhotos/<?= $_SESSION['Student']['profilePhoto'] ?>" alt="" onerror="/assets/img/studentProfilePhotos/foto-vazia.jpg">

                </nav>

                <div class="col-lg-12">

                    <div class="collapse show mt-3" id="mural" data-parent="#studentPortal-accordion">

                        <div class="col-lg-10 mx-auto">

                            <div class="row mt-4 d-flex justify-content-center">

                              

                                <div class="col-md-10">

                                    <div class="row">

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

                                        <?php if (count($this->view->checkForRegistration) != 1 && $this->view->currentStatusRematrium[0]->option_value == 1) { ?>

                                            <div class="col-lg-11 ml-auto card mb-3">

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

                                                    <div class="col-lg-11 ml-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img src='<?= $value['value']->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacher_profile_photo ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover; border-radius: 50%" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

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

                                                    <div class="col-lg-11 ml-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-start"><img src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover; border-radius: 50%" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

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

                                                    <div class="col-lg-11 ml-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover; border-radius: 50%" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

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


                                                    <div class="col-lg-11 ml-auto card mb-3">

                                                        <div class="row p-2">

                                                            <div class="col-lg-1 d-flex justify-content-center align-items-center"><img src='<?= $value['value']->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value['value']->teacherProfilePhoto ?>' alt="" style="width: 40px; height: 40px; object-position:top; object-fit: cover; border-radius: 50%" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

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


                                            <div class="col-lg-11 ml-auto card mb-3">Nenhuma postagem até o momento</div>

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="collapse mt-3" id="bulletin" data-parent="#studentPortal-accordion">

                        <div containerBulletin class="col-lg-10 mx-auto card"></div>

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