<div id="gestao-turmas">

    <div class="row container-pai">

        <div class="col-lg-12  accordion" id="accordion-turmas">

            <div class="col-lg-11 mx-auto mb-4">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <h5>Gestão das turmas</h5>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-end">

                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#collapse-turmas"><span class="mr-2 items-icon"><i class="fas fa-boxes mr-2"></i> Turmas</span></a>

                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#collapse-adicionar-turmas"><span class="mr-2 items-icon"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <div class="row mb-3">

                    <div class="col-lg-11 mx-auto">
                        <div class="collapse show card" id="collapse-turmas" data-parent="#accordion-turmas">
                            <div class="row">
                                <div class="col-lg-11 mx-auto">

                                    <form class="mt-3 mb-3  text-dark" action="">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Turmas:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>INFO-1M-A</option>
                                                    <option>INFO-1M-B</option>
                                                    <option>INFO-1M-C</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Curso</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option value="">Todos</option>
                                                    <option>INFO</option>
                                                    <option>ELET</option>
                                                    <option>SEGU</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Série:</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Todas</option>
                                                    <option>1 ano</option>
                                                    <option>2 ano</option>
                                                    <option>3 ano</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label for="inputState">Turno</label>
                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option value="">Todos</option>
                                                    <option>Matutino</option>
                                                    <option>Vespertino</option>
                                                    <option>Noturno</option>
                                                </select>
                                            </div>

                                        </div>

                                    </form>

                                    <hr class="">


                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome da turma</th>
                                                <th scope="col">Total de alunos</th>
                                                <th scope="col">Vagas da turma</th>
                                                <th scope="col">Média da turma</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Informática 1 ano A Matutino</td>
                                                <td>35 alunos</td>
                                                <td>40 vagas</td>
                                                <td>
                                                    <article class="btn nota-vermelha">4,8</article>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Informática 1 ano A Matutino</td>
                                                <td>35 alunos</td>
                                                <td>40 vagas</td>
                                                <td>
                                                    <article class="btn nota-verde">6,5</article>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Informática 1 ano A Matutino</td>
                                                <td>35 alunos</td>
                                                <td>40 vagas</td>
                                                <td>
                                                    <article class="btn nota-azul">8,5</article>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Informática 1 ano A Matutino</td>
                                                <td>35 alunos</td>
                                                <td>40 vagas</td>
                                                <td>
                                                    <article class="btn nota-dourada">9,5</article>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Informática 1 ano A Matutino</td>
                                                <td>35 alunos</td>
                                                <td>40 vagas</td>
                                                <td>
                                                    <article class="btn nota-azul">7,8</article>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="modal fade" id="perfilTurmaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content p-2">
                                                <div class="row" style="margin-left: -50px !important;">
                                                    <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button></div>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row bg-white p-3 d-flex justify-content-around col-lg-11 mx-auto">

                                                        <div class="col-lg-9">

                                                            <div class="row accordion" id="accordion-perfil-aluno-opcoes">

                                                                <div class="row">

                                                                    <div class="col-lg-12">

                                                                        <div class="row">

                                                                            <div class="col-lg-12 collapse show overflow-auto p-3" id="collapse-perfil-aluno-opcoes-dados" aria-labelledby="dados" data-parent="#accordion-perfil-aluno-opcoes" style="border-radius: 15px">


                                                                                <div class="row">

                                                                                    <div class="col-lg-12">

                                                                                        <div class="row">

                                                                                            <div class="col-lg-12  accordion" id="accordion-dados">

                                                                                                <div class="col-lg-12 mb-4">
                                                                                                    <div class="row d-flex align-items-center">
                                                                                                        <div class="col-lg-6">
                                                                                                            <h5>Dados da turma</h5>
                                                                                                        </div>

                                                                                                        <div class="col-lg-6 d-flex justify-content-end">

                                                                                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#collapse-alunos"><span class="mr-2 items-icon"><i class="fas fa-boxes mr-2"></i> Alunos</span></a>

                                                                                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#collapse-professores"><span class="mr-2 items-icon"><i class="fas fa-plus-circle mr-2"></i> Professores</span></a>


                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-lg-12">

                                                                                                    <div class="row mb-3">

                                                                                                        <div class="col-lg-12">
                                                                                                            <div class="collapse show card" id="collapse-alunos" data-parent="#accordion-dados">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-lg-12">

                                                                                                                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto">

                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th colspan="2" scope="col">Nome do aluno</th>
                                                                                                                                    <th scope="col">CPF</th>
                                                                                                                                    <th scope="col">Turma</th>
                                                                                                                                    <th scope="col">Unidade Cadastrada</th>
                                                                                                                                </tr>
                                                                                                                            </thead>

                                                                                                                            <tbody>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>INFO-1M-A</td>
                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-2">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>INFO-1M-A</td>
                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-2">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>INFO-1M-A</td>
                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-2">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>INFO-1M-A</td>
                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-2">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>INFO-1M-A</td>
                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-2">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>INFO-1M-A</td>
                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-2">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                            </tbody>
                                                                                                                        </table>

                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>




                                                                                                            <div class="collapse card" id="collapse-professores" data-parent="#accordion-dados">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-lg-12">
                                                                                                                        b
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

                                                                            <div class="col-lg-12 collapse  overflow-auto" id="collapse-perfil-aluno-opcoes-nota" aria-labelledby="nota" data-parent="#accordion-perfil-aluno-opcoes">

                                                                            </div>

                                                                            <div class="col-lg-12 collapse overflow-auto" id="collapse-perfil-aluno-opcoes-boletim" aria-labelledby="boletim" data-parent="#accordion-perfil-aluno-opcoes">


                                                                            </div>


                                                                            <div class="col-lg-12 border border-dark collapse overflow-auto" id="modalThree" aria-labelledby="mais" data-parent="#accordion-perfil-aluno-opcoes">
                                                                                <h5>Mais</h5>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-2 controle-opcoes">

                                                            <ul class="list-group text-center">

                                                                <li class="list-group-item border-0" data-target="#collapse-perfil-aluno-opcoes-dados" aria-expanded="true" id="dados" data-toggle="collapse"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

                                                                <li class="list-group-item border-0" id="nota" data-toggle="collapse" aria-expanded="false" data-target="#collapse-perfil-aluno-opcoes-nota"><a href="#"> <i class="far fa-list-alt mr-2"></i> Avaliações</a></li>

                                                                <li class="list-group-item border-0" id="mais" aria-expanded="false" data-toggle="collapse" data-target="#modalThree"><a href="#"><i class="fas fa-chart-line mr-2"></i> Análise </a></li>

                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>



                            </div>
                        </div>



                        <div class="collapse" id="collapse-adicionar-turmas" data-parent="#accordion-turmas">

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