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


                    <div class="row mt-3">

                        <div class="col-lg-12 mt-xs-5 index-disciplines">

                            <div class="card" style="height: 30vh;">

                               <canvas id="index-disciplines"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="row">

                        <div class="col-lg-12 recent-activities">

                            <?php $teacherName = "Você" ?>

                            <?php require '../App/Views/admin/management/components/recentActivities.php'?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>