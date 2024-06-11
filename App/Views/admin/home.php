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

                    <div class="col-lg-7">

                        <div class="row">

                            <div class="col-lg-4 col-6">

                                <div class="card">

                                    <div class="card-title">Alunos ativos</div>

                                    <div class="row d-flex justify-content-center align-items-center">

                                        <div class="col-7 total-student-enrolled"><i class="fas fa-user-check mr-2"></i></i> <?= $this->view->studentTotal ?></div>

                                        <div class="col-5 total-students-enrolled-today">+ <?= $this->view->studentsAddedToday[0]->total_student ?></div>

                                    </div>

                                </div>

                            </div>


                            <div class="col-lg-4 col-6">

                                <div class="card">

                                    <div class="card-title">Unidade atual</div>

                                    <div class="row d-flex justify-content-center align-items-center">

                                        <div class="col-lg-12 total-student-enrolled"><i class="fas fa-boxes mr-2"></i> <?= $this->view->unitControlCurrent[0]->option_value ?> unidade</div>

                                    </div>

                                </div>

                            </div>


                            <div class="col-lg-4 mt-3 mt-sm-0 d-none d-sm-block">

                                <div class="card">

                                    <div class="card-title">Período letivo</div>

                                    <div class="row d-flex justify-content-center align-items-center">

                                        <div class="col-lg-12 total-student-enrolled"><i class="far fa-calendar-alt mr-2"></i> <?= isset($this->view->SchoolTermActive[0]->option_text) ? $this->view->SchoolTermActive[0]->option_text : 'Não definido' ?></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row mt-3 mb-3 mb-lg-0">

                            <div class="col-lg-12">
                                <canvas class="card" id="studenDivisionChartCourse"></canvas>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-5">

                        <div class="col-lg-12 card recently-enrolled">

                            <div class="card-title p-2"><?= count($this->view->recentlyEnrolledStudents) >= 1 ? 'Matrículados recentementes' : 'Nenhum aluno matrículado ainda' ?></div>

                            <?php $photoDir =  "$app_url/assets/img/studentProfilePhotos/" ?>

                            <?php if(count($this->view->recentlyEnrolledStudents) >= 1){ ?>

                            <table class="table table-hover table-borderless border-top">

                                <tbody>

                                <?php foreach ($this->view->recentlyEnrolledStudents as $key => $value) {

                                        $date = explode(" ", $value->initial_enrollment_date);
                                        $date = explode("-", $date[0]);

                                    ?>

                                        <tr>
                                            <td class=""><img class="miniature-photo" src='<?= $value->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                            <td class="text-left"><?= $value->student_name ?></td>
                                            <td><?= $date[2] ?> / <?= $date[1] ?></td>
                                        </tr>

                                    <?php }?>                                

                                </tbody>

                            </table>

                            <?php }else{ ?>

                                <div class="row">

                                    <div class="col-lg-12">

                                        <img class="enrollment-null d-block mx-auto" src="<?= $app_url ?>/assets/img/illustrations/enrollment_null.svg" alt="">

                                    </div>

                                    <div class="col-lg-12 d-flex justify-content-center mt-4">

                                        <a href="/admin/aluno/cadastro" class="btn btn-success">Matrícular alunos</a>

                                    </div>

                                </div>

                                <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="row mt-4 mb-4">

                    <div class="col-lg-7 admin-portal">

                        <div class="p-0 recent-activities">

                            <?php require '../App/Views/admin/management/components/recentActivities.php' ?>

                        </div>
                    </div>

                    <div class="col-lg-5">

                        <div class="col-lg-12 p-0">

                            <div class="card mb-3 mt-3 mt-lg-0" style="height:36vh">

                                <canvas class="" id="graphCurrentStudentSituation"></canvas>

                            </div>

                            <div class="card" style="height:40vh">

                                <canvas class="" id="graphSituationEngramentesReceived"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

            

        </div>

</section>