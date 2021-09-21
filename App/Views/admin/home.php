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

                                    <div class="col-lg-7 total-student-enrolled"><i class="fas fa-user-check mr-2"></i></i> 1239</div>

                                    <div class="col-lg-5 total-students-enrolled-today">+ 39</div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="card">

                                <div class="card-title">Unidade atual</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="fas fa-boxes mr-2"></i> 2 unidade</div>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-4 d-flex justify-content-end p-0">

                            <div class="card w-100">

                                <div class="card-title">Período letivo ativo</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="far fa-calendar-alt mr-2"></i> 2021</div>

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

                        <?php $photoDir =  "/assets/img/adminProfilePhotos/" ?>

                        <table class="table table-hover table-borderless border-top">

                            <tbody>

                                <tr>
                                    <td class=""><img class="miniature-photo" src='/assets/img/adminProfilePhotos/16310575916137f6b7ccd4a.jpg' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>19/09</td>
                                </tr>

                                <tr>
                                    <td class=""><img class="miniature-photo" src='/assets/img/adminProfilePhotos/16310575916137f6b7ccd4a.jpg' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>19/09</td>
                                </tr>

                                <tr>
                                    <td class=""><img class="miniature-photo" src='/assets/img/adminProfilePhotos/16310575916137f6b7ccd4a.jpg' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>19/09</td>
                                </tr>

                                <tr>
                                    <td class=""><img class="miniature-photo" src='/assets/img/adminProfilePhotos/16310575916137f6b7ccd4a.jpg' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>19/09</td>
                                </tr>

                                <tr>
                                    <td class=""><img class="miniature-photo" src='/assets/img/adminProfilePhotos/16310575916137f6b7ccd4a.jpg' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>19/09</td>
                                </tr>

                                <tr>
                                    <td class=""><img class="miniature-photo" src='/assets/img/adminProfilePhotos/16310575916137f6b7ccd4a.jpg' alt="" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>19/09</td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="row mt-3">

                <div class="col-lg-7">

                    <div class="row">

                        <div class="col-lg-4">

                            <div class="row">

                                <div class="col-lg-12 card">

                                    <div class="card-title">Docentes atuais</div>

                                    <div class="row d-flex justify-content-center align-items-center">

                                        <div class="col-lg-12 total-student-enrolled"><i class="fas fa-chalkboard-teacher mr-2"></i> 18</div>

                                    </div>

                                </div>

                                <div class="col-lg-12 card mt-3">

                                    <div class="card-title">Total de turmas</div>

                                    <div class="row d-flex justify-content-center align-items-center">

                                        <div class="col-lg-12 total-student-enrolled"><i class="fas fa-chalkboard mr-2"></i> 50</div>

                                    </div>

                                </div>
                                
                                <div class="col-lg-12 card mt-3">

                                   

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-8 pr-0">

                            <div id="" class="col-lg-12 border card">

                                <canvas id="grafico2"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="card">

                                <div class="card-title">Unidade atual</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="fas fa-boxes mr-2"></i> 2 unidade</div>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-6 d-flex justify-content-end p-0">

                            <div class="card w-100">

                                <div class="card-title">Período letivo ativo</div>

                                <div class="row d-flex justify-content-center align-items-center">

                                    <div class="col-lg-12 total-student-enrolled"><i class="far fa-calendar-alt mr-2"></i> 2021</div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

</section>