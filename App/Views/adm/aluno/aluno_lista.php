<div id="aluno-lista">

    <div class="row linha-pagina">

        <div class="col-lg-11 mx-auto">

            <div class="col-lg-12 mb-4">
                <h5>Lista de alunos</h5>
            </div>

            <div class="col-lg-12">
                <div class="card p-3 mb-3">
                    <form class="col-lg-11  mx-auto mt-3" action="">

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

                            <div class="form-group col-2 col-lg-1 accordion" id="modal">
                                <label for="">&nbsp;</label><br>
                                <a class="btn btn-white w-100 p-2" href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-ellipsis-h"></i></a>
                            </div>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">

                            <div class="form-row">
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
                    </form>

                    <hr>
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
                                    <td class="nome-aluno">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>INFO-1M-A</td>
                                    <td>
                                        <div class="row text-center d-flex justify-content-center mt-2">
                                            <div class="col-2 nota-unidade-definida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="nome-aluno">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>INFO-1M-A</td>
                                    <td>
                                        <div class="row text-center d-flex justify-content-center mt-2">
                                            <div class="col-2 nota-unidade-definida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="nome-aluno">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>INFO-1M-A</td>
                                    <td>
                                        <div class="row text-center d-flex justify-content-center mt-2">
                                            <div class="col-2 nota-unidade-definida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="nome-aluno">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>INFO-1M-A</td>
                                    <td>
                                        <div class="row text-center d-flex justify-content-center mt-2">
                                            <div class="col-2 nota-unidade-definida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="nome-aluno">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>INFO-1M-A</td>
                                    <td>
                                        <div class="row text-center d-flex justify-content-center mt-2">
                                            <div class="col-2 nota-unidade-definida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="nome-aluno">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>INFO-1M-A</td>
                                    <td>
                                        <div class="row text-center d-flex justify-content-center mt-2">
                                            <div class="col-2 nota-unidade-definida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                            <div class="col-2 nota-unidade-indefinida"><i class="fas fa-check-circle"></i></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="modal fade" id="perfilAlunoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content p-2">
                        <div class="modal-header">
                            Perfil do aluno
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row accordion" id="modal-perfil-aluno" style="border: 2px solid red;">


                                <div class="col-lg-10" style="border: 2px solid red;">

                                    <div class="row">

                                        <div class="col-lg-12 collapse show" id="modalOne" aria-labelledby="pessoal" data-parent="#modal-perfil-aluno">
                                            <h5>Dados Pessoais</h5>
                                        </div>

                                        <div class="col-lg-12 collapse" id="modalTwo" aria-labelledby="nota" data-parent="#modal-perfil-aluno">
                                            <h5>Notas</h5>
                                        </div>

                                        <div class="col-lg-12 collapse" id="modalThree" aria-labelledby="nota" data-parent="#modal-perfil-aluno">
                                            <h5>Mais</h5>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-2" style="border: 2px solid red;">

                                    <ul>
                                        <li id="pessoal"><a href="" data-toggle="collapse" data-target="#modalOne">Pessoal</a></li>
                                        <li id="nota"><a href="" data-toggle="collapse" data-target="#modalTwo">Nota</a></li>
                                        <li id="mais"><a href="" data-toggle="collapse" data-target="#modalThree">Mais</a></li>
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
</div>
</div>