<div id="aluno-lista">

    <div class="row container-pai">

        <div class="col-lg-11 mx-auto">

            <h5 class="col-12 mb-4">Lista de alunos</h5>

            <div class="col-lg-12">

                <div class="card p-3 mb-3">

                    <form class="col-lg-11 accordion mx-auto mt-3" id="accordion-busca-avancada">

                        <div class="form-row">

                            <div class="form-group col-12 col-lg-5">
                                <label for="">Aluno:</label>
                                <input class="form-control" type="text" name="" placeholder="Nome do aluno ou CPF" id="">
                            </div>

                            <div class="form-group col-12 col-lg-3">
                                <label for="">Turma:</label>
                                <select class="form-control custom-select" name="" id="">
                                    <option value="">Todas</option>
                                    <option value="">INFO-1M-B</option>
                                    <option value="">INFO-1M-C</option>
                                    <option value="">INFO-1M-V</option>
                                </select>
                            </div>

                            <div class="form-group col-10 col-lg-3">
                                <label for="">Situação do aluno:</label>
                                <select class="form-control custom-select" name="" id="">
                                    <option value="">Estudando</option>
                                    <option value="">Reprovado</option>
                                    <option value="">Aprovado</option>
                                    <option value="">Desistente</option>
                                    <option value="">Recuperação final</option>
                                </select>

                            </div>

                            <div class="form-group col-2 col-lg-1">
                                <label for="">&nbsp;</label><br>
                                <div id="heading-busca-avancada">
                                    <a class="btn btn-white w-100 p-2" href="" data-toggle="collapse" data-target="#collapse-busca-avancada" aria-expanded="false" aria-controls="collapse-busca-avancada"><i class="fas fa-ellipsis-h"></i></a>
                                </div>
                            </div>

                            <div id="collapse-busca-avancada" class="collapse" aria-labelledby="heading-busca-avancada" data-parent="#accordion-busca-avancada">

                                <div class="form-row mx-auto">

                                    <div class="form-group col-6 col-lg-2">
                                        <label for="">Curso:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">Todos</option>
                                            <option value="">INFO</option>
                                            <option value="">ELET</option>
                                            <option value="">SEGU</option>
                                            <option value="">MECA</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-2">
                                        <label for="">Sexo:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">Todos</option>
                                            <option value="">Masculino</option>
                                            <option value="">Feminino</option>
                                            <option value="">Outros</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-2">
                                        <label for="">Periodo Letivo:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">2021</option>
                                            <option value="">2022</option>
                                            <option value="">2019</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-2">
                                        <label for="">Turno:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">Todos</option>
                                            <option value="">Matutino</option>
                                            <option value="">Vespertino</option>
                                            <option value="">Noturno</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-2">
                                        <label for="">Série:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">Todas</option>
                                            <option value="">1 ano</option>
                                            <option value="">2 ano</option>
                                            <option value="">3 ano</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="col-lg-10 mx-auto">

                    <div class="table-responsive">
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

            <div class="modal fade" id="perfilAlunoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-2">
                        <div class="row" style="margin-left: -50px !important;">
                            <div class="col-lg-12"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>
                        </div>

                        <div class="modal-body">

                            <div class="row accordion" id="accordion-perfil-aluno-opcoes">

                                <div class="col-lg-10">

                                    <div class="row">

                                        <div class="col-lg-11 mx-auto">

                                            <div class="row card">

                                                <div class="col-lg-12">

                                                    <div class="row">

                                                        <div class="col-lg-12 collapse show overflow-auto p-3" id="collapse-perfil-aluno-opcoes-dados" aria-labelledby="dados" data-parent="#accordion-perfil-aluno-opcoes" style="border-radius: 15px">


                                                            <div class="row">

                                                                <div class="col-lg-2">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 mt-4 d-flex justify-content-center"><img src="/assets/img/foto-perfil-1.png" class="" alt=""></div>

                                                                    </div>

                                                                </div>

                                                                <div class="col-lg-10">

                                                                    <div class="row">

                                                                        <div class="col-lg-12 d-flex justify-content-end">

                                                                            <span class="mr-2 card-icon"><i class="text-center fas fa-edit"></i></span>
                                                                            <span class="mr-2"></span>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-lg-7">

                                                                            <form class="" action="">

                                                                                <h5 class="mt-3 mb-3 ml-2">Dados pessoais:</h5>

                                                                                <div class="input-group d-flex col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Nome:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="João Pedro de Lima" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Nome da mãe:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Maria Silva Costa Barbosa" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Nome do pai:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Carlos Silva Costa Teixeira" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">CPF:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="876.324.242-34" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Masculino" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Brasileiro(a)" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Paulo Afonso" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">PcD:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Não" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <hr>

                                                                                <h5 class="mt-3 mb-3 ml-2">Endereço e contato:</h5>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">CEP:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="48.601-340" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">UF:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="BA" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Município:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Paulo Afonso" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Poty" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Rua São Jorge n 100" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Telefone 01:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="(75) 98873-2423" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Telefone 02:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="(75) 98825-2328" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <hr>

                                                                                <h5 class="mt-3 mb-3 ml-2">Curso e turma:</h5>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Situação do aluno:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="Matriculado" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                                <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text" id="addon-wrapping">Turma:</span>
                                                                                    </div>
                                                                                    <input type="text" disabled class="form-control" value="INFO-1M-C" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                </div>

                                                                            </form>

                                                                        </div>

                                                                        <div class="col-lg-5">

                                                                            <div class="row p-3">

                                                                                <h5 class="mb-4">Observações:</h5>

                                                                                <div class="card card-hover bg-white w-100 mb-3" style="max-width: 18rem;">

                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">Comportamento Infantil</h5>
                                                                                        <p class="card-text">Aluno xingou seus colegas com palavras de baixo calão.</p>

                                                                                        <p><b>Professor(a):</b> Magno Lima</p>
                                                                                        <p><b>Disciplina:</b> Mátematica</p>
                                                                                        <p><b>Unidade:</b> 1</p>
                                                                                        <p><b>Data do ocorrido:</b> 31/08</p>

                                                                                    </div>


                                                                                </div>

                                                                                <div class="card bg-white w-100 mt-3 mb-3" style="max-width: 18rem;">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">Gazeamento</h5>
                                                                                        <p class="card-text">Aluno saio para jogar bola</p>

                                                                                        <p><b>Professor(a):</b> Tássio Silva</p>
                                                                                        <p><b>Disciplina:</b> Biologia</p>
                                                                                        <p><b>Unidade:</b> 1</p>
                                                                                        <p><b>Data do ocorrido:</b> 11/10</p>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12 collapse lado-info-aluno overflow-auto" id="collapse-perfil-aluno-opcoes-nota" aria-labelledby="nota" data-parent="#accordion-perfil-aluno-opcoes" style="border-radius: 15px">

                                                            <div class="row p-1">

                                                                <h5 class="mt-3 col-lg-12 mb-3">Notas</h5>


                                                                <div class="col-3 lista-disciplinas overflow-auto">

                                                                    <div class="list-group card" id="list-tab" role="tablist">

                                                                        <b class="text-center text-secondary mb-3">Disciplinas</b>

                                                                        <a class="list-group-item list-group-item-action active" id="list-disciplina-1" data-toggle="list" href="#disciplina-1" role="tab" aria-controls="home">Matemática</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-2" data-toggle="list" href="#disciplina-2" role="tab" aria-controls="profile">Português</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-3" data-toggle="list" href="#disciplina-3" role="tab" aria-controls="messages">Biologia</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-4" data-toggle="list" href="#disciplina-4" role="tab" aria-controls="settings">Física</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-5" data-toggle="list" href="#disciplina-5" role="tab" aria-controls="settings">Arte</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-6" data-toggle="list" href="#disciplina-6" role="tab" aria-controls="settings">Filosofia</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-7" data-toggle="list" href="#disciplina-7" role="tab" aria-controls="settings">Química</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-8" data-toggle="list" href="#disciplina-8" role="tab" aria-controls="settings">L.E.M</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-9" data-toggle="list" href="#disciplina-9" role="tab" aria-controls="settings">L.T.P</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-10" data-toggle="list" href="#disciplina-10" role="tab" aria-controls="settings">Intervenção Social</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-11" data-toggle="list" href="#disciplina-11" role="tab" aria-controls="settings">Sociologia</a>

                                                                        <a class="list-group-item list-group-item-action" id="list-disciplina-12" data-toggle="list" href="#disciplina-12" role="tab" aria-controls="settings">POPIC</a>


                                                                    </div>

                                                                </div>

                                                                <div class="col-9">

                                                                    <div class="tab-content conteudo-lista-disciplinas" id="nav-tabContent">

                                                                        <div class="tab-pane card fade show active" id="disciplina-1" role="tabpanel" aria-labelledby="list-disciplina-1">

                                                                            <div class="accordion" id="conteudo-disciplina">

                                                                                <div class="row d-flex justify-content-center mt-3">

                                                                                    <a href="#" class="col-lg-2 icon-unidade p-0 mr-3 btn" data-target="#conteudo-1-unidade" aria-expanded="true" id="unidade-1" data-toggle="collapse">1 Unidade</a>

                                                                                    <a href="#" class="col-lg-2 icon-unidade p-0 mr-3 btn" data-target="#conteudo-2-unidade" aria-expanded="false" id="unidade-2" data-toggle="collapse">2 Unidade</a>

                                                                                    <a href="#" class="col-lg-2 icon-unidade p-0 mr-3 btn" data-target="#conteudo-3-unidade" aria-expanded="false" id="unidade-3" data-toggle="collapse" href="#">3 Unidade</a>

                                                                                </div>

                                                                                <div class="row unidades">

                                                                                    <div class="col-lg-12">

                                                                                        <div class="collapse show overflow-auto p-3" id="conteudo-1-unidade" aria-labelledby="unidade-1" data-parent="#conteudo-disciplina">

                                                                                            <div class="row">

                                                                                                <h5 class="text-center mt-3 mb-3 col-lg-12">Avaliações da 1 Unidade</h5>

                                                                                                <table class="table table-hover mt-3 table-borderless col-lg-12">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th scope="col">ID</th>
                                                                                                            <th scope="col">Nome</th>
                                                                                                            <th scope="col">Data Realizada</th>
                                                                                                            <th scope="col">Valor</th>
                                                                                                            <th scope="col">Nota</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <th class="" scope="row" style="top: 50%;">1</th>
                                                                                                            <td class="">Avaliação em Grupo</td>
                                                                                                            <td>15/06</td>
                                                                                                            <td>4,0</td>
                                                                                                            <td class="">
                                                                                                                <input class="form-control mx-auto" type="text" name="" value="2,0" id="" maxlength="3">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">2</th>
                                                                                                            <td>Avaliação Individual</td>
                                                                                                            <td>15/07</td>
                                                                                                            <td>2,0</td>
                                                                                                            <td class="">
                                                                                                                <input class="form-control mx-auto" type="text" name="" value="1,0" id="" maxlength="3">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">3</th>
                                                                                                            <td>Prova Final</td>
                                                                                                            <td>25/08</td>
                                                                                                            <td>4,0</td>
                                                                                                            <td class="">
                                                                                                                <input class="form-control mx-auto" type="text" name="" value="3,0" id="" maxlength="3">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>

                                                                                                <div class="col-lg-6 text-center mx-auto">

                                                                                                    <div class="input-group p-0 d-flex justify-content-center col-lg-12 flex-nowrap">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text" id="addon-wrapping">Nota final da unidade:</span>
                                                                                                        </div>
                                                                                                        <input type="text" disabled class="form-control border-0" value="5,0" aria-label="Username" aria-describedby="addon-wrapping">
                                                                                                    </div>

                                                                                                </div>

                                                                                                <hr class="text-dark w-100">

                                                                                            </div>


                                                                                        </div>

                                                                                        <div class="collapse overflow-auto p-3 lado-info-aluno" id="conteudo-2-unidade" aria-labelledby="unidade-2" data-parent="#conteudo-disciplina">

                                                                                            Conteudo

                                                                                        </div>

                                                                                        <div class="collapse overflow-auto p-3 lado-info-aluno" id="conteudo-3-unidade" aria-labelledby="unidade-3" data-parent="#conteudo-disciplina">

                                                                                            Conteudo


                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-2" role="tabpanel" aria-labelledby="list-disciplina-2">

                                                                            <div class="row">

                                                                                Portugues

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-3" role="tabpanel" aria-labelledby="list-disciplina-3">

                                                                            <div class="row">

                                                                                Biologia

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-4" role="tabpanel" aria-labelledby="list-disciplina-4">

                                                                            <div class="row">

                                                                                Física

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-5" role="tabpanel" aria-labelledby="list-disciplina-5">

                                                                            <div class="row">

                                                                                Arte

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-6" role="tabpanel" aria-labelledby="list-disciplina-6">

                                                                            <div class="row">

                                                                                Filosofia

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-7" role="tabpanel" aria-labelledby="list-disciplina-7">

                                                                            <div class="row">

                                                                                Química

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-8" role="tabpanel" aria-labelledby="list-disciplina-8">

                                                                            <div class="row">

                                                                                Língua Estrangeira Moderna

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-9" role="tabpanel" aria-labelledby="list-disciplina-9">

                                                                            <div class="row">

                                                                                Lógica e Técnica dd Programação

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-10" role="tabpanel" aria-labelledby="list-disciplina-10">

                                                                            <div class="row">

                                                                                Intervenção Social

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-11" role="tabpanel" aria-labelledby="list-disciplina-11">

                                                                            <div class="row">

                                                                                Sociologia

                                                                            </div>

                                                                        </div>

                                                                        <div class="tab-pane fade card" id="disciplina-12" role="tabpanel" aria-labelledby="list-disciplina-12">

                                                                            <div class="row">

                                                                                POPIC

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12 collapse overflow-auto lado-info-aluno" id="collapse-perfil-aluno-opcoes-boletim" aria-labelledby="boletim" data-parent="#accordion-perfil-aluno-opcoes">

                                                            <div class="row">

                                                                <div class="col-lg-6">
                                                                    <h5 class="mt-3 mb-3">Boletim do aluno</h5>
                                                                </div>

                                                                <div class="col-lg-6 mt-3 text-right"><span class="card-icon"><i class="fas fa-print"></i></span></div>

                                                            </div>

                                                            <div class="col-lg-12 mt-3"><b>Aluno:</b> João Pedro de Souza</div>

                                                            <div class="col-lg-12 mt-3"><b>Nível / Modalidade de ensino:</b> Ensino Profissional, Médio Intregado</div>

                                                            <div class="row p-0 mt-3 d-flex justify-content-around">
                                                                <div class="col-lg-5"><b>Série:</b> 1 Serie - Tecnico em Informática</div>
                                                                <div class="col-lg-3"><b>Classe:</b> INFO-1M-B</div>
                                                                <div class="col-lg-3"><b>Sala:</b> 13</div>
                                                            </div>

                                                            <div class="row mt-3">

                                                                <table class="table col-lg-12 p-2 table-responsive-xl table-striped table-bordered mt-3 col-lg-12" style="width: 1500px;">

                                                                    <thead class="">

                                                                        <tr>

                                                                            <th class="th-rowspan-2" colspan="" rowspan="2" scope="col" style="width: 200px">
                                                                                <div class="col-lg-11">Componentes Curriculares</div>
                                                                            </th>

                                                                            <th class="text-center" colspan="3" scope="col">I Unidade</th>
                                                                            <th class="text-center " colspan="3" scope="col">II Unidade</th>
                                                                            <th class="text-center " colspan="3" scope="col">III Unidade</th>

                                                                            <th class="th-rowspan-2" rowspan="2" scope="col">
                                                                                <div class="col-lg-11">REC FINAL</div>
                                                                            </th>

                                                                            <th class="th-rowspan-2" rowspan="2" scope="col">
                                                                                <div class="col-lg-11">Média Final</div>
                                                                            </th>

                                                                            <th class="th-rowspan-2" rowspan="2" scope="col">
                                                                                <div class="col-lg-11">Freq(%)</div>
                                                                            </th>

                                                                            <th class="th-rowspan-2" rowspan="2" scope="col">
                                                                                <div class="col-lg-11">Resultado Final</div>
                                                                            </th>
                                                                        </tr>

                                                                        <tr class="dados-unidade">
                                                                            <th class="" scope="col">Nota</th>
                                                                            <th class="" scope="col">Faltas</th>
                                                                            <th class="" scope="col">Dispensa</th>
                                                                            <th class="" scope="col">Nota</th>
                                                                            <th class="" scope="col">Faltas</th>
                                                                            <th class="" scope="col">Dispensa</th>
                                                                            <th class="" scope="col">Nota</th>
                                                                            <th class="" scope="col">Faltas</th>
                                                                            <th class="" scope="col">Dispensa</th>
                                                                        </tr>



                                                                    </thead>

                                                                    <tbody>

                                                                        <tr class="">
                                                                            <td class="">Biologia</td>
                                                                            <td class="nota-verde">8,20</td>
                                                                            <td class="">2</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-vermelha">3,20</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-verde">9,00</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="">&nbsp;</td>
                                                                            <td class="">7,25</td>
                                                                            <td class="">87,25</td>
                                                                            <td class="">AP</td>
                                                                        </tr>
                                                                        <tr class="">
                                                                            <td class="">Biologia</td>
                                                                            <td class="nota-verde">8,20</td>
                                                                            <td class="">2</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-vermelha">3,20</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-verde">9,00</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="">&nbsp;</td>
                                                                            <td class="">7,25</td>
                                                                            <td class="">87,25</td>
                                                                            <td class="">AP</td>
                                                                        </tr>
                                                                        <tr class="">
                                                                            <td class="">Biologia</td>
                                                                            <td class="nota-verde">8,20</td>
                                                                            <td class="">2</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-vermelha">3,20</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-verde">9,00</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="">&nbsp;</td>
                                                                            <td class="">7,25</td>
                                                                            <td class="">87,25</td>
                                                                            <td class="">AP</td>
                                                                        </tr>
                                                                        <tr class="">
                                                                            <td class="">Biologia</td>
                                                                            <td class="nota-verde">8,20</td>
                                                                            <td class="">2</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-vermelha">3,20</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-verde">9,00</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="">&nbsp;</td>
                                                                            <td class="">7,25</td>
                                                                            <td class="">87,25</td>
                                                                            <td class="">AP</td>
                                                                        </tr>
                                                                        <tr class="">
                                                                            <td class="">Biologia</td>
                                                                            <td class="nota-verde">8,20</td>
                                                                            <td class="">2</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-vermelha">3,20</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="nota-verde">9,00</td>
                                                                            <td class="">3</td>
                                                                            <td class="">0</td>
                                                                            <td class="">&nbsp;</td>
                                                                            <td class="">7,25</td>
                                                                            <td class="">87,25</td>
                                                                            <td class="">AP</td>
                                                                        </tr>

                                                                     

                                                                    </tbody>




                                                                </table>



                                                            </div>


                                                        </div>

                                                        <div class="col-lg-12 collapse overflow-auto" id="modalThree" aria-labelledby="mais" data-parent="#accordion-perfil-aluno-opcoes">
                                                            <h5>Mais</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-2">

                                    <ul class="list-group controle-opcoes text-center">

                                        <li class="list-group-item border-0" data-target="#collapse-perfil-aluno-opcoes-dados" aria-expanded="true" id="dados" data-toggle="collapse"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

                                        <li class="list-group-item border-0" id="nota" data-toggle="collapse" aria-expanded="false" data-target="#collapse-perfil-aluno-opcoes-nota"><a href="#"> <i class="far fa-list-alt mr-2"></i> Disciplinas</a></li>

                                        <li class="list-group-item border-0" id="boletim" data-toggle="collapse" aria-expanded="false" data-target="#collapse-perfil-aluno-opcoes-boletim"><a href="#"> <i class="fas fa-clipboard mr-2"></i> Boletim</a></li>

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