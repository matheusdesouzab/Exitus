<?php 

require __DIR__ . '../../../config/variables.php';

?>

<section id="home">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <div class="row">

                <h5 class="col-lg-12">Visão Geral</h5>

            </div>

            <div class="row mt-2">

                <div class="col-lg-6">

                    <div class="row">

                        <div class="col-6">

                            <div class="card">

                                <div class="card-title">Unidade atual</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 card-text total-student-enrolled"><i class="fas fa-boxes mr-2"></i> <?= $this->view->unitControlCurrent[0]->option_value ?> unidade</div>

                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="card">

                                <div class="card-title">Período letivo ativo</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 card-text total-student-enrolled"><i class="far fa-calendar-alt mr-2"></i> <?= $this->view->SchoolTermActive[0]->option_text ?></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 avaliacoes-agendadas mt-3">

                            <div class="card">

                                <?php

                                if (count($this->view->listExam) > 0) {

                                    foreach ($this->view->listExam  as $key => $part) {
                                        $date = explode(' ', $part->realize_date);
                                        $sort[$key] = strtotime($date[0]);
                                    }

                                    array_multisort($sort, SORT_DESC, $this->view->listExam);

                                    $timezone = new DateTimeZone('America/Sao_Paulo');
                                    $now = new DateTime('now', $timezone);
                                    $dataNow = $now->format('Y/m/d H:i');
                                }

                                ?>

                                <div class="row">
                                    <div class="card-title col-11 mx-auto p-0">Agenda de avaliações</div>
                                    <?php
                                    if (count($this->view->listExam) > 0) {
                                        foreach ($this->view->listExam as $key => $value) { ?>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="row d-flex justify-content-between align-items-center mb-2">
                                                        <div class="col-lg-9">
                                                            <?php $data = $value->realize_date ?>
                                                            <p class="mb-0"><?= $value->exam_description ?> - <?= $value->discipline_name ?> - <?= $this->view->tools->currentDate($value->realize_date) ?></p>

                                                        </div>
                                                        <div class="col-lg-3 d-flex justify-content-end">
                                                            <?php if (strtotime($dataNow) >= strtotime($data)) { ?>
                                                                <span class="badge badge-pill p-2 badge-success ">Realizada</span>
                                                        </div>
                                                    <?php } else { ?>
                                                        <span class="badge badge-pill p-2 badge-info ">Pendente</span>
                                                    </div>
                                                <?php } ?>
                                                </div>

                                                <div class="d-flex justify-content-start class-and-value align-items-center">
                                                    <div class="">Turma: <?= $value->acronym_series ?>ª <?= $value->ballot ?>-<?= $value->course ?> - <?= $value->shift ?> / Valor: <?= $value->exam_value ?> <?= $value->exam_value > 1 ? ' pontos' : ' décimos' ?></div>

                                                </div>
                                            </div>
                                            <hr class="mx-auto col-11">
                                </div>

                            <?php }
                                    } else { ?>

                            <div class="col-11 mx-auto">

                                <div class="row">

                                    <img class="enrollment-null d-block mx-auto" src="<?= $app_url ?>/assets/img/illustrations/calendar.svg" alt="">

                                    <p class="mt-3 col-lg-12 p-0 text-justify text-right">Nenhuma avaliação criada ainda</p>

                                </div>

                            </div>

                        <?php } ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="row">

                    <div class="col-lg-12 recent-activities">

                        <?php $teacherName = "Você" ?>

                        <?php require '../App/Views/admin/management/components/recentActivities.php' ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>


</section>