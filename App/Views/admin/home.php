<section id="home">

    <div class="row main-container mb-3">

        <h5 class="col-lg-11 pl-3 p-0 mx-auto mb-3">Visão Geral</h5>

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

                                        <div class="col-lg-5 total-students-enrolled-today">+ <?= $this->view->studentsAddedToday[0]->total_student ?></div>

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

                                        $date = explode(" ", $value->initial_enrollment_date);
                                        $date = explode("-", $date[0]);

                                    ?>

                                        <tr>
                                            <td class=""><img class="miniature-photo" src='<?= $value->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                            <td class="text-left"><?= $value->student_name ?></td>
                                            <td><?= $date[2] ?> / <?= $date[1] ?></td>
                                        </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="row mt-4 mb-4">

                    <div class="col-lg-6 pl-0">

                        <div class="col-lg-12 pl-0 recent-activities">

                            <?php require '../App/Views/admin/management/components/recentActivities.php' ?>

                        </div>
                    </div>

                    <div class="col-lg-6 pr-0 pl-0">

                        <div class="col-lg-12 pr-0 pl-0">

                            <div class="card mb-3" style="height:36vh">

                                <canvas class="" id="graphCurrentStudentSituation"></canvas>

                            </div>

                            <div class="row">

                                <div class="col-lg-12" style="height:40vh">

                                    <canvas class="card" id="graphSituationEngramentesReceived"></canvas>

                                </div>

                                <!--  <div class="col-lg-12 mb-4" style="height:36vh">

                                <canvas class="card" id="grafico2"></canvas>

                            </div>  -->

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

                <div class="row d-flex">

                   <!--  <div class="col-lg-5 pl-0">

                        <div class="col-lg-12 pl-0">

                            <canvas class="card" id="studentSex"></canvas>

                        </div>

                    </div> -->

                 <!--    <div class="col-lg-7 pr-0">

                        <div class="col-lg-12 pr-0 pl-0 h-100">

                            <canvas class="card h-100" id="city"></canvas>

                        </div>

                    </div> -->

                    <!--   <div class="col-lg-4 p-0">

                        <div class="col-lg-12 p-0">

                            <div class="card">9999999999</div>

                        </div>

                    </div> -->

                </div>

            </div>

        </div>

</section>