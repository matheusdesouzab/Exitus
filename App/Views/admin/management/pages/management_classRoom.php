<section id="classRoom">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="room-accordion">

            <div class="col-lg-12 mb-3">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão das salas</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" id="collapseListClassRoom" aria-expanded="true" data-toggle="collapse" data-target="#list-rooms"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Salas</span></a>

                        <a class="collapsed font-weight-bold" id="collapseAddClassRoom" aria-expanded="false" data-toggle="collapse" data-target="#add-rooms"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row d-flex justify-content-between mb-3">

                    <div class="col-lg-12">

                        <div class="collapse show" id="list-rooms" data-parent="#room-accordion">

                            <div class="col-lg-12" containerListClassRoom></div>

                        </div>

                        <div class="collapse" id="add-rooms" data-parent="#room-accordion">

                            <div class="row">

                                <div class="col-lg-12 card">

                                    <form id="addClassRoom" class="col-lg-11 mx-auto mt-3 was-validated" action="" role="form">

                                        <div class="row mt-2">
                                            <div class="font-weight-bold col-lg-12">Adicionar nova sala:</div>
                                        </div>

                                        <div class="form-row mb-2 mt-4">
                                            <div class="form-group col-lg-4">
                                                <label for="classroomNumber">Numero da sala:</label>
                                                <select name="classroomNumber" class="form-control custom-select is-valid" id="classroomNumber" required></select>
                                            </div>

                                    
                                            <div class="form-group col-lg-4">
                                                <label for="studentCapacity">Capacidade de alunos:</label>
                                               <input class="form-control is-valid" value="" type="text" name="studentCapacity" id="studentCapacity" required>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="">&nbsp;</label><br>
                                                <a type="submit" id="buttonAddClassRoom" class="btn btn-success w-100 text-center" href="#">Adicionar sala</a>
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

</section>