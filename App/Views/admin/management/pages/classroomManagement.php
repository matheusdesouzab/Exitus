<section id="classRoom">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto accordion" id="room-accordion">

            <div class="row mt-3 page-header">

                <div class="col-11 col-lg-12 mx-auto">

                    <div class="row">

                        <h5 class="col-sm-6">Gestão das salas</h5>

                        <div class="col-sm-6">

                            <div class="row collapse-options-container">

                            <a class="font-weight-bold" id="collapseListClassRoom" aria-expanded="true" data-toggle="collapse" data-target="#list-rooms">

                                <span class="mr-2"><i class="fas fa-grip-vertical mr-2"></i> Salas</span>

                            </a>

                            <a class="collapsed font-weight-bold" id="collapseAddClassRoom" aria-expanded="false" data-toggle="collapse" data-target="#add-rooms">

                                <span class=""><i class="fas fa-plus mr-2"></i> Adicionar</span>

                            </a>

                            </div>

                        </div>

                        <nav class="col-lg-12 col-11 p-0" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/gestao">Gestão geral</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Salas</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-lg-12 col-11 mx-auto">

                    <div class="collapse show" id="list-rooms" data-parent="#room-accordion">
                        <div class="row">
                            <div class="col-lg-12" containerListClassRoom>
                                <?php require '../App/Views/admin/management/components/classroomsList.php' ?>
                            </div>
                        </div>

                    </div>

                    <div class="collapse" id="add-rooms" data-parent="#room-accordion">

                        <div class="row">

                            <div class="col-lg-12">

                                <form id="addClassRoom" class="was-validated card" action="" role="form">

                                    <div class="font-weight-bold col-lg-12 mt-3">Adicionar nova sala:</div>

                                    <hr class="">

                                    <div class="form-row col-lg-12 mb-2 mt-1">
                                        <div class="form-group col-lg-4">
                                            <label for="classroomNumber">Numero da sala:</label>
                                            <select name="classroomNumber" class="form-control custom-select is-valid" id="classroomNumber" required></select>
                                        </div>

                                        <div class="form-group col-lg-5">
                                            <label for="studentCapacity">Capacidade de alunos:</label>
                                            <input class="form-control is-valid" value="" type="text" name="studentCapacity" id="studentCapacity" required>
                                        </div>

                                        <div class="form-group col-lg-3">
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

</section>