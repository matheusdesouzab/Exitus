<section id="list-teacher">

    <div class="row main-container">

        <div class="col-lg-11 mx-auto">

            <h5 class="col-12 mb-4 mt-3">Lista de professores(a)</h5>

            <div class="col-lg-12">

                <div class="card p-3 mb-3">

                    <form class="col-lg-11 accordion mx-auto mt-3" id="seekTeacher">

                        <div class="form-row">

                            <div class="form-group col-12 col-sm-7">
                                <label for="">Professor:</label>
                                <input class="form-control" type="text" name="name" placeholder="Nome do professor" id="">
                            </div>


                            <div class="form-group col-10 col-sm-5">
                                <label for="">Sexo:</label>
                                <select class="form-control custom-select" name="sex">
                                    <option value="0">Todos</option>
                                    <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                        <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                        </div>

                    </form>

                    <hr class="col-lg-11 mx-auto">

                    <div class="table-responsive">

                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto" id="teacher-table">

                            <thead>
                                <tr>
                                    <th class="" colspan="2" scope="col">Nome do professor(a)</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status da conta</th>
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
                <div class="modal-dialog modal-full">
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
    </div>

</section>