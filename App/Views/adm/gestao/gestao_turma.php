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

                                    <div class="modal modal-perfil fade" id="perfilTurmaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

                                                            <div class="row accordion" id="accordion-perfil-turma">

                                                                <div class="row">

                                                                    <div class="col-lg-12">

                                                                        <div class="row">

                                                                            <div class="col-lg-12 collapse show overflow-auto p-3 container-accordion" id="collapse-perfil-turma-dados" aria-labelledby="turma-dados" data-parent="#accordion-perfil-turma" style="border-radius: 15px">


                                                                                <div class="row">

                                                                                    <div class="col-lg-12">

                                                                                        <div class="row">

                                                                                            <div class="col-lg-12  accordion" id="accordion-turma-dados">

                                                                                                <div class="col-lg-12 mb-4">
                                                                                                    <div class="row d-flex align-items-center">
                                                                                                        <div class="col-lg-6">
                                                                                                            <h5>Dados da turma</h5>
                                                                                                        </div>

                                                                                                        <div class="col-lg-6 d-flex justify-content-end">

                                                                                                            <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#collapse-alunos"><span class="mr-2 items-icon"><i class="fas fa-user-friends mr-2"></i> Alunos</span></a>

                                                                                                            <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#collapse-professores"><span class="mr-2 items-icon"><i class="fas fa-chalkboard-teacher mr-2"></i> Professores</span></a>


                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-lg-12">

                                                                                                    <div class="row mb-3">

                                                                                                        <div class="col-lg-12">
                                                                                                            <div class="collapse show card" id="collapse-alunos" data-parent="#accordion-turma-dados">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-lg-12">

                                                                                                                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto">

                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th colspan="2" scope="col">Nome do aluno</th>
                                                                                                                                    <th scope="col">CPF</th>
                                                                                                                                    <th scope="col">Unidade Cadastrada</th>
                                                                                                                                </tr>
                                                                                                                            </thead>

                                                                                                                            <tbody>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-red" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-blue" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-green" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-golden" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-red" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
                                                                                                                                            <div class="col-2 icon-unidade-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                            <div class="col-2 icon-unidade-nao-cadastrada"><i class="fas fa-check-circle"></i></div>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="border-img-green" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>

                                                                                                                                    <td>
                                                                                                                                        <div class="row text-center d-flex justify-content-center mt-3">
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




                                                                                                            <div class="collapse card" id="collapse-professores" data-parent="#accordion-turma-dados">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-lg-12">
                                                                                                                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto">

                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th colspan="2" scope="col">Nome do professor(a)</th>
                                                                                                                                    <th scope="col">CPF</th>
                                                                                                                                    <th scope="col">Disciplinas lecionadas</th>
                                                                                                                                </tr>
                                                                                                                            </thead>

                                                                                                                            <tbody>

                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="text-right"><img class="" src="/assets/img/foto-perfil-1.png" alt=""></td>
                                                                                                                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                                                                                                                    <td>864.407.324-21</td>
                                                                                                                                    <td>Matemática</td>
                                                                                                                                </tr>




                                                                                                                            </tbody>
                                                                                                                        </table>
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

                                                                            <div class="col-lg-12 collapse container-accordion overflow-auto" id="collapse-perfil-turma-disciplinas" aria-labelledby="turma-disciplinas" data-parent="#accordion-perfil-turma">

                                                                                <div class="col-lg-12  accordion" id="accordion-turma-disciplinas">

                                                                                    <div class="col-lg-12 mb-4 mt-3">
                                                                                        <div class="row d-flex align-items-center">
                                                                                            <div class="col-lg-6">
                                                                                                <h5>Disciplinas da turma</h5>
                                                                                            </div>

                                                                                            <div class="col-lg-6 d-flex justify-content-end">

                                                                                                <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#collapse-disciplinas"><span class="mr-2 items-icon"><i class="fas fa-boxes mr-2"></i> Disciplinas</span></a>

                                                                                                <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#collapse-adicionar-disciplinas"><span class="mr-2 items-icon"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-12">

                                                                                        <div class="row mb-3">

                                                                                            <div class="col-lg-12">
                                                                                                <div class="collapse show card" id="collapse-disciplinas" data-parent="#accordion-turma-disciplinas">
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-12">

                                                                                                            <table class="table table-borderless table-hover">
                                                                                                                <thead>
                                                                                                                    <tr>
                                                                                                                        <th scope="col">Sigla Disciplina</th>
                                                                                                                        <th scope="col">Modalidade</th>
                                                                                                                        <th scope="col">UE referente</th>
                                                                                                                        <th scope="col">Professor</th>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Técnico</td>
                                                                                                                        <td>1 e 2</td>
                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Técnico</td>
                                                                                                                        <td>1 e 2</td>
                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Técnico</td>
                                                                                                                        <td>1 e 2</td>
                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Técnico</td>
                                                                                                                        <td>1 e 2</td>
                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td>LTP</td>
                                                                                                                        <td>Técnico</td>
                                                                                                                        <td>1 e 2</td>
                                                                                                                        <td>Jamilton Damasceno</td>
                                                                                                                    </tr>

                                                                                                                </tbody>
                                                                                                            </table>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>




                                                                                                <div class="collapse card" id="collapse-adicionar-disciplinas" data-parent="#accordion-turma-disciplinas">
                                                                                                    <div class="row">


                                                                                                        <form class="col-lg-12" action="">

                                                                                                            <div class="form-row mt-3 mb-4">

                                                                                                                <div class="form-group col-lg-5">
                                                                                                                    <label for="">Professor:</label>

                                                                                                                    <select id="inputState" class="form-control custom-select" required>
                                                                                                                        <option>Ana Silva</option>
                                                                                                                        <option>Meickson</option>
                                                                                                                        <option>Tassio</option>
                                                                                                                        <option>Carlos</option>
                                                                                                                    </select>

                                                                                                                </div>

                                                                                                                <div class="form-group col-lg-4">
                                                                                                                    <label for="">Disciplina:</label>

                                                                                                                    <select id="inputState" class="form-control custom-select" required>
                                                                                                                        <option>Matemática</option>
                                                                                                                        <option>Biologia</option>
                                                                                                                        <option>Português</option>
                                                                                                                        <option>Filosofia</option>
                                                                                                                    </select>

                                                                                                                </div>


                                                                                                                <div class="form-group col-lg-3">
                                                                                                                    <label for="">&nbsp;</label>
                                                                                                                    <a class="btn btn-success w-100" href="">Adicionar disciplina</a>
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




                                                                            <div class="col-lg-12 collapse overflow-auto container-accordion" id="collapse-perfil-turma-avaliacoes" aria-labelledby="turma-avaliacoes" data-parent="#accordion-perfil-turma">

                                                                                <div class="accordion" id="accordion-turma-avaliacoes">
                                                                                    <div class="col-lg-12 mb-4 mt-3">
                                                                                        <div class="row d-flex align-items-center">
                                                                                            <div class="col-lg-6">
                                                                                                <h5>Avaliações da turma</h5>
                                                                                            </div>

                                                                                            <div class="col-lg-6 d-flex justify-content-end">

                                                                                                <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#collapse-lista-avaliacoes"><span class="mr-2 items-icon"><i class="fas fa-boxes mr-2"></i> Avaliações</span></a>

                                                                                                <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#collapse-adicionar-avaliacoes"><span class="mr-2 items-icon"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>



                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-lg-12">

                                                                                        <div class="collapse show card" id="collapse-lista-avaliacoes" data-parent="#accordion-turma-avaliacoes">

                                                                                            <form class="mt-3 col-lg-11 mx-auto  text-dark" action="">

                                                                                                <div class="form-row mt-3">

                                                                                                    <div class="form-group col-lg-6">
                                                                                                        <label for="">Nome da avaliacão:</label>
                                                                                                        <input type="text" placeholder="Nome da avaliação" class="form-control">
                                                                                                    </div>

                                                                                                    <div class="form-group col-lg-3">
                                                                                                        <label for="inputState">Disciplina:</label>
                                                                                                        <select id="inputState" class="form-control custom-select" required>
                                                                                                            <option>Matemática</option>
                                                                                                            <option>Ensino Médio</option>
                                                                                                            <option>Técnico</option>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div class="form-group col-lg-3">
                                                                                                        <label for="inputState">UE referente:</label>
                                                                                                        <select id="inputState" class="form-control custom-select" required>
                                                                                                            <option>1 e 2</option>
                                                                                                            <option>1</option>
                                                                                                            <option>2</option>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                </div>

                                                                                            </form>

                                                                                            <hr class="col-lg-11 mx-auto">

                                                                                            <table class="table col-lg-11 mx-auto table-borderless table-hover">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope="col">Id</th>
                                                                                                        <th scope="col">Avaliação</th>
                                                                                                        <th scope="col">Unidade</th>
                                                                                                        <th scope="col">Disciplina</th>
                                                                                                        <th scope="col">Valor</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    <tr>
                                                                                                        <td>1</td>
                                                                                                        <td>Prova em dupla</td>
                                                                                                        <td>1</td>
                                                                                                        <td>Matemática</td>
                                                                                                        <td>4,0</td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td>1</td>
                                                                                                        <td>Prova em dupla</td>
                                                                                                        <td>1</td>
                                                                                                        <td>Matemática</td>
                                                                                                        <td>4,0</td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td>1</td>
                                                                                                        <td>Prova em dupla</td>
                                                                                                        <td>1</td>
                                                                                                        <td>Matemática</td>
                                                                                                        <td>4,0</td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td>1</td>
                                                                                                        <td>Prova em dupla</td>
                                                                                                        <td>1</td>
                                                                                                        <td>Matemática</td>
                                                                                                        <td>4,0</td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td>1</td>
                                                                                                        <td>Prova em dupla</td>
                                                                                                        <td>1</td>
                                                                                                        <td>Matemática</td>
                                                                                                        <td>4,0</td>
                                                                                                    </tr>


                                                                                                </tbody>
                                                                                            </table>

                                                                                        </div>



                                                                                        <div class="collapse card" id="collapse-adicionar-avaliacoes" data-parent="#accordion-turma-avaliacoes">

                                                                                            <form class="col-lg-12" action="">

                                                                                                <div class="form-row mt-3">

                                                                                                    <div class="form-group col-lg-6">
                                                                                                        <label for="">Nome da avaliação:</label>

                                                                                                        <input class="form-control" type="text">

                                                                                                    </div>

                                                                                                    <div class="form-group col-lg-3">
                                                                                                        <label for="">Disciplina:</label>

                                                                                                        <select id="inputState" class="form-control custom-select" required>
                                                                                                            <option>Ana Silva</option>
                                                                                                            <option>Meickson</option>
                                                                                                            <option>Tassio</option>
                                                                                                            <option>Carlos</option>
                                                                                                        </select>

                                                                                                    </div>

                                                                                                    <div class="form-group col-lg-3">
                                                                                                        <label for="">Unidade:</label>

                                                                                                        <select id="inputState" class="form-control custom-select" required>
                                                                                                            <option>Matemática</option>
                                                                                                            <option>Biologia</option>
                                                                                                            <option>Português</option>
                                                                                                            <option>Filosofia</option>
                                                                                                        </select>

                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-lg-2">
                                                                                                        <label for="">Valor:</label>

                                                                                                        <input class="form-control" type="text">
                                                                                                    </div>
                                                                                                    <div class="form-group col-lg-3">
                                                                                                        <label for="">&nbsp;</label>
                                                                                                        <a class="btn btn-success w-100" href="">Adicionar disciplina</a>
                                                                                                    </div>

                                                                                                </div>



                                                                                                <!-- <div class="form-group col-lg-3">
                                                                                                        <label for="">&nbsp;</label>
                                                                                                        <a class="btn btn-success w-100" href="">Adicionar disciplina</a>
                                                                                                    </div> -->


                                                                                       

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


                                                    <div class="col-lg-2 controle-opcoes">

                                                        <ul class="list-group text-center">

                                                            <li class="list-group-item border-0" id="turma-dados" aria-expanded="true" data-toggle="collapse" data-target="#collapse-perfil-turma-dados"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

                                                            <li class="list-group-item border-0" id="turma-disciplinas" aria-expanded="false" data-toggle="collapse" data-target="#collapse-perfil-turma-disciplinas"><a href="#"> <i class="far fa-list-alt mr-2"></i> Disciplinas</a></li>

                                                            <li class="list-group-item border-0" id="turma-avaliacoes" aria-expanded="false" data-toggle="collapse" data-target="#collapse-perfil-turma-avaliacoes"><a href="#"><i class="fas fa-clipboard-list mr-2"></i> Avaliações </a></li>

                                                            <li class="list-group-item border-0" id="mais" aria-expanded="false" data-toggle="collapse" data-target="#"><a href="#"><i class="fas fa-chart-line mr-2"></i> Análise </a></li>

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
                                        <div class="form-group col-lg-3">
                                            <label for="">Sigla:</label>
                                            <input class="form-control" value="" type="text" name="" id="">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputState">Modalidade:</label>
                                            <select id="inputState" class="form-control custom-select" required>
                                                <option>Técnico</option>
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