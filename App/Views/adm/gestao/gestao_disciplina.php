<div id="gestao-disciplinas">

    <div class="row container-pai">

        <div class="col-lg-12  accordion" id="accordion-disciplinas">

            <div class="col-lg-11 mx-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão das disciplinas</h5>
                    </div>

                    <div class="col-lg-6 collapse-options-container">

                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#collapse-disciplinas"><span class="mr-2 items-icon"><i class="fas fa-boxes mr-2"></i> Disciplinas</span></a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#collapse-adicionar-disciplina"><span class="mr-2 items-icon"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row mb-3">

                    <div class="col-lg-11 mx-auto">
                        <div class="collapse show card" id="collapse-disciplinas" data-parent="#accordion-disciplinas">
                            <div class="row">
                                <div class="col-lg-11 mx-auto">

                                    <form class="mt-3 mb-3  text-dark" action="">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-4">
                                                <label for="">Nome disciplina:</label>
                                                <input type="text" placeholder="Nome da disciplina ou sigla" class="form-control">
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Modalidade:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Técnico</option>
                                                    <option>Ensino Médio</option>
                                                    <option>Técnico</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Curso:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Informática</option>
                                                    <option>Ensino Médio</option>
                                                    <option>Técnico</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="inputState">UE referente:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>1 e 2</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>

                                        </div>

                                    </form>

                                    <div class="table-responsive">

                                    <table class="table table-borderless table-hover">
                                        <thead> 
                                            <tr>
                                                <th scope="col">Nome da disciplina</th>
                                                <th scope="col">Sigla</th>
                                                <th scope="col">Modalidade</th>
                                                <th scope="col">Curso</th>
                                                <th scope="col">UE referente</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Linguagem e Técnica de Programação</td>
                                                <td>LTP</td>
                                                <td>Técnico</td>
                                                <td>Informática</td>
                                                <td>1 e 2</td>
                                            </tr>
                                            <tr>
                                                <td>Linguagem e Técnica de Programação</td>
                                                <td>LTP</td>
                                                <td>Técnico</td>
                                                <td>Informática</td>
                                                <td>1 e 2</td>
                                            </tr>
                                            <tr>
                                                <td>Linguagem e Técnica de Programação</td>
                                                <td>LTP</td>
                                                <td>Técnico</td>
                                                <td>Informática</td>
                                                <td>1 e 2</td>
                                            </tr>
                                            <tr>
                                                <td>Linguagem e Técnica de Programação</td>
                                                <td>LTP</td>
                                                <td>Técnico</td>
                                                <td>Informática</td>
                                                <td>1 e 2</td>
                                            </tr>
                                            <tr>
                                                <td>Linguagem e Técnica de Programação</td>
                                                <td>LTP</td>
                                                <td>Técnico</td>
                                                <td>Informática</td>
                                                <td>1 e 2</td>
                                            </tr>
                                            <tr>
                                                <td>Linguagem e Técnica de Programação</td>
                                                <td>LTP</td>
                                                <td>Técnico</td>
                                                <td>Informática</td>
                                                <td>1 e 2</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    </div>

                                    <div class="modal fade" id="disciplinaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-5">
                                            <div class="modal-content">
                                                <div class="modal-header font-weight-bold">
                                                    <div class="col-lg-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-lg-6 mt-2">Linguagem e Técnica de Programação</div>
                                                            <div class="col-lg-6 d-flex justify-content-end">

                                                            <span class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>
                                                    <span class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>
                                                    <span class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <form class="col-lg-11 mx-auto mb-4" action="">

                                                            <div class="form-row mb-2">
                                                                <div class="form-group col-lg-7">
                                                                    <label for="">Nome da disciplina:</label>
                                                                    <input class="form-control" disabled value="Linguagem e Técnica de Programação" type="text" name="" id="">
                                                                </div>
                                                                <div class="form-group col-lg-2">
                                                                    <label for="">Sigla:</label>
                                                                    <input class="form-control" disabled value="LTP" type="text" name="" id="">
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="inputState">Modalidade:</label>
                                                                    <select disabled id="inputState" class="form-control custom-select " required>
                                                                        <option>Técnico</option>
                                                                        <option>Ensino Médio</option>
                                                                        <option>Técnico</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-lg-5">
                                                                    <label for="inputState">Curso:</label>
                                                                    <select disabled id="inputState" class="form-control custom-select " required>
                                                                        <option>Informática</option>
                                                                        <option>Ensino Médio</option>
                                                                        <option>Técnico</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="inputState">UE referente:</label>
                                                                    <select disabled id="inputState" class="form-control custom-select " required>
                                                                        <option>1 e 2</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    </form>

                                                    <div class="col-lg-12 modal-links-alternativos mt-2 d-flex justify-content-end mb-4">

                                                        <a class="btn btn-info" data-dismiss="modal" href=""><i class="fas fa-arrow-alt-circle-right mr-2"></i> Retornar a sessão</a>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>


                    
                    <div class="collapse" id="collapse-adicionar-disciplina" data-parent="#accordion-disciplinas">

                        <div class="row">

                            <div class="col-lg-12 mx-auto">

                                <form class="card mt-3" action="">

                                    <div class="row mt-2">
                                        <div class="font-weight-bold col-lg-12">Adicionar nova disciplina:</div>
                                    </div>

                                    <div class="form-row mt-4 mb-2">
                                        <div class="form-group col-lg-4">
                                            <label for="">Nome da disciplina:</label>
                                            <input class="form-control" value="" type="text" name="" id="">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label for="">Sigla:</label>
                                            <input class="form-control" value="" type="text" name="" id="">
                                        </div>
                                        <div class="form-group col-lg-2">
                                                <label for="inputState">Modalidade:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Técnico</option>
                                                    <option>Ensino Médio</option>
                                                    <option>Técnico</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="inputState">Curso:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Informática</option>
                                                    <option>Ensino Médio</option>
                                                    <option>Técnico</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="inputState">UE referente:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>1 e 2</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>

                                    </div>

                                    <div class="row d-flex justify-content-end">
                                        <div class="form-group col-lg-4">
                                            <a class="btn btn-success w-100 text-center" href="#">Adicionar nova disciplina</a>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>



                    </div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        Dados

                    </div>
                </div>
            </div>
        </div>



    </div>

</div>

</div>


</div>