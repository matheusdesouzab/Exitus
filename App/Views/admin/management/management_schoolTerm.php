<div id="term-management">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="accordion-period">

            <div class="col-lg-12 mb-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão dos periodos letivos</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#list-terms" ><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Periodos</span></a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-school-term"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>
                        

                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row d-flex justify-content-between mb-3">

                    <div class="col-lg-12">
                        
                        <div class="collapse show" id="list-terms" data-parent="#accordion-period">
                                <div class="row">
                                    <div class="col-lg-12">

                                    <?php foreach($this->view->listSchoolTerm as $idSchoolTerm => $SchoolTerm){ ?>                               

                                        <form class="card" action="">

                                            <div class="row d-flex align-items-center">

                                                <div class="col-lg-8 font-weight-bold">Periodo letivo 2021</div>

                                                <div class="col-lg-4 d-flex justify-content-end mt-2">

                                                <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                                                    <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                                                    <span class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                                                </div>

                                            </div>

                                            <div class="form-row mt-4 mb-2">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Periodo letivo:</label>
                                                    <input class="form-control" disabled value="2021" type="text" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de início:</label>
                                                    <input class="form-control" value="" disabled value="" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de fim:</label>
                                                    <input class="form-control" value="" disabled value="" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Situação:</label>
                                                    <input class="form-control" value="Em andamento" disabled value="" type="text" name="" id="">
                                                </div>

                                            </div>

                                        </form>
                                        <form class="card mt-3" action="">

                                            <div class="row d-flex align-items-center">

                                                <div class="col-lg-8 font-weight-bold">Periodo letivo 2021</div>

                                                <div class="col-lg-4 d-flex justify-content-end mt-2">

                                                <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                                                    <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                                                    <span class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                                                </div>

                                            </div>

                                            <div class="form-row mt-4 mb-2">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Periodo letivo:</label>
                                                    <input class="form-control" disabled value="2021" type="text" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de início:</label>
                                                    <input class="form-control" value="" disabled value="" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de fim:</label>
                                                    <input class="form-control" value="" disabled value="" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Situação:</label>
                                                    <input class="form-control" value="Em andamento" disabled value="" type="text" name="" id="">
                                                </div>

                                            </div>

                                        </form>

                                        <?php } ?>
                                       



                                    </div>
                                </div>
                            </div>

                            <div class="collapse" id="add-school-term" data-parent="#accordion-period">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <form class="card" action="">

                                            <div class="row mt-2">
                                                <div class="font-weight-bold col-lg-12">Adicionar novo periodo:</div>
                                            </div>

                                            <div class="form-row mt-4 mb-2">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Periodo letivo:</label>
                                                    <input class="form-control" value="2019" type="text" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de início:</label>
                                                    <input class="form-control" value="" value="" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Data de fim:</label>
                                                    <input class="form-control" value="" value="" type="date" name="" id="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                <label for="inputState">Situação:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Andamento</option>
                                                    <option>Finalizado</option>
                                                   
                                                </select>
                                            </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-lg-5">
                                                    <a class="btn btn-success w-75 text-center" href="#">Adicionar novo periodo</a>
                                                </div>
                                            </div>

                                        </form>

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