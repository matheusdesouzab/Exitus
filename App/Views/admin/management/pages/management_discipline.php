<section id="discipline">

    <div class="row main-container">

        <div class="col-lg-12 accordion" id="discipline-accordion">

            <div class="col-lg-11 mx-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão das disciplinas</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" id="collapseListDiscipline" aria-expanded="true" data-toggle="collapse" data-target="#list-subjects"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Disciplinas</span></a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-discipline"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row mb-3">

                    <div class="col-lg-11 mx-auto">
                        <div class="collapse show card mt-3" id="list-subjects" data-parent="#discipline-accordion">
                            <div class="row">
                                <div class="col-md-11 mx-auto">

                                    <form class="mb-3 mt-3 text-dark" id="seekDiscipline" action="">

                                        <div class="form-row">

                                            <div class="form-group col-lg-8">
                                                <label for="seekName">Nome da disciplina:</label>
                                                <input type="text" name="seekName" value="" id="seekName" placeholder="Nome da disciplina" class="form-control">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="seekModality">Modalidade:</label>
                                                <select name="seekModality" id="seekModality" class="form-control custom-select" required>
                                                    <option value="0">Todas</option>
                                                </select>
                                            </div>

                                        </div>

                                    </form>

                                    <hr class="col-11 mx-auto">

                                    <div class="table-responsive">

                                        <table class="table table-hover table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome da disciplina</th>
                                                    <th scope="col">Sigla</th>
                                                    <th scope="col">Modalidade da disciplina</th>
                                                </tr>
                                            </thead>
                                            <tbody containerListDiscipline></tbody>
                                        </table>
                                    </div>

                                    <div class="modal fade" id="modalDiscipline" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-5">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <div containerModal class="row"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="collapse" id="add-discipline" data-parent="#discipline-accordion">

                            <div class="row">

                                <div class="col-lg-12 mx-auto">

                                    <form id="addDiscipline" class="card mt-3 was-validated" action="">

                                        <div class="form-row mt-2 col-lg-11 mx-auto">
                                            <div class="font-weight-bold col-lg-12">Adicionar nova disciplina:</div>
                                        </div>

                                        <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">
                                        
                                            <div class="form-group col-lg-4">
                                                <label for="">Nome da disciplina:</label>
                                                <input class="form-control is-valid" value="" type="text" name="discipline" id="" required>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="">Sigla:</label>
                                                <input class="form-control is-valid" maxlength="10" value="" type="text" name="acronym" id="" required>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Modalidade:</label>
                                                <select id="inputState" name="modalityAdd" class="form-control custom-select is-valid" required></select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="">&nbsp;</label>
                                                <a id="buttonAddDiscipline" class="btn btn-success w-100 text-center" href="#">Adicionar</a>
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


</section>