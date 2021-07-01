<div id="list-employees">

    <div class="row main-container">

        <h5 class="col-lg-11 mx-auto mb-3 mt-3">Buscar docente</h5>

        <div class="col-lg-10 accordion mx-auto card mb-3" id="advanced-search-accordion">

            <form class="accordion mx-auto col-lg-11 mt-3" id="">

                <div class="form-row">

                    <div class="form-group col-12 col-lg-7">
                        <label for="">Professor:</label>
                        <input class="form-control" type="text" name="" placeholder="Nome do professor" id="">
                    </div>


                    <div class="form-group col-12 col-lg-3">
                        <label for="">Sexo:</label>
                        <select class="form-control custom-select" name="sex">
                            <option value="0">Todos</option>
                            <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group col-2 col-lg-1">
                        <label for="">&nbsp;</label><br>
                        <div id="heading-busca-avancada">
                            <a class="btn btn-white w-100 p-2" href="" data-toggle="collapse" data-target="#activate-advanced-search-accordion" aria-expanded="false" aria-controls="activate-advanced-search-accordion"><i class="fas fa-ellipsis-h"></i></a>
                        </div>
                    </div>

                </div>

                <div id="activate-advanced-search-accordion" class="collapse" data-parent="#advanced-search-accordion">

                    <div class="form-row mx-auto">

                        <div class="form-group col-6 col-lg-4">
                            <label for="">PcD:</label>
                            <select class="form-control custom-select" name="" id="">
                                <option value="">Não</option>
                                <option value="">Sim</option>
                            </select>
                        </div>



                    </div>
                </div>

            </form>

            <hr class="col-lg-10 mx-auto">

            <div class="table-responsive">
                <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto" id="teacher-table">

                    <thead>
                        <tr>
                            <th class="" colspan="2" scope="col">Nome do docente</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Disciplinas ativas</th>
                        </tr>
                    </thead>

                    <tbody containerListTeacher>

                        <?php require '../App/Views/admin/teacher/components/teacherListing.php' ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal modal-profile fade" id="profileTeacherModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-2">
                <div class="row">
                    <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times-circle text-dark mr-3 mt-2"></i></span>
                        </button></div>
                </div>

                <div containerTeacherProfileModal class="modal-body"></div>
            </div>
        </div>
    </div>
</div>