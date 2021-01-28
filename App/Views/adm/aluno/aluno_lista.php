<div id="aluno-lista">

    <div class="row linha-pagina">

        <div class="col-lg-11 mx-auto">

            <div class="col-lg-12 mb-4">
                <h5>Lista de alunos</h5>
            </div>

            <div class="col-lg-12">

                <div class="card p-3 mb-3">

                    <form class="col-lg-11  accordion  mx-auto mt-3" action="" id="busca-avancada">

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
                                <div id="adiciona-busca-avancada">
                                    <a class="btn btn-white w-100 p-2" href="" data-toggle="collapse" data-target="#adiciona-busca-avancada"><i class="fas fa-ellipsis-h"></i></a>
                                </div>
                            </div>

                            <div id="adiciona-busca-avancada" class="collapse" aria-labelledby="adiciona-busca-avancada" data-parent="#busca-avancada">

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
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-end"> <button type="button" class="close text-rig" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>
                        </div>

                        <div class="modal-body">

                            <div class="row accordion" id="modal-perfil-aluno">

                                <div class="col-lg-10">

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="row shadow-sm" style="border-radius: 15px;">

                                                <div class="col-lg-2 lado-foto-aluno">

                                                    <div class="row">

                                                        <div class="col-lg-12 d-flex justify-content-center mt-3"><img src="/assets/img/foto-perfil-1.png" alt=""></div>

                                                       <!--  <div class="col-lg-12 mt-3 rank-aluno text-center"><b>Média do aluno:</b> 7.3</div>

                                                        <div class="col-lg-12 mt-3 rank-aluno text-center"><b>Rank na turma:</b> 12</div> -->

                                                    </div>

                                                </div>

                                                <div class="col-lg-10">

                                                    <div class="row">

                                                        <div class="col-lg-12 collapse show overflow-auto p-3 lado-info-aluno" id="modalOne" aria-labelledby="pessoal" data-parent="#modal-perfil-aluno">

                                                            <div class="row">
                                                                <div class="col-lg-12 d-flex justify-content-end">

                                                                 <span class="mr-2">Editar</span> <span class="mr-2">Salvar</span> <span>c</span>

                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col-lg-6">

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

                                                                <div class="col-lg-6">

                                                                    <div class="row">

                                                                        <h5 class="mt-3 mb-3">Observações:</h5>

                                                                        <div class="card card-hover bg-white w-100 mb-3" style="max-width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Comportamento Infantil</h5>
                                                                                <p class="card-text">Aluno xingou seus colegas com palavras de baixo calão.</p>

                                                                                <p><b>Professor(a):</b> Magno Lima</p>
                                                                                <p><b>Disciplina:</b> Mátematica</p>
                                                                                <p><b>Unidade:</b> 1</p>

                                                                            </div>
                                                                            <div class="card-footer bg-white text-center">Data do ocorrido: 26/08/12</div>
                                                                        </div>

                                                                        <div class="card bg-white w-100 mb-3" style="max-width: 18rem;">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Gazeamento</h5>
                                                                                <p class="card-text">Aluno saio para jogar bola</p>

                                                                                <p><b>Professor(a):</b> Tássio Silva</p>
                                                                                <p><b>Disciplina:</b> Biologia</p>
                                                                                <p><b>Unidade:</b> 1</p>

                                                                            </div>
                                                                            <div class="card-footer bg-white text-center">Data do ocorrido: 26/08/12</div>
                                                                        </div>

                                                                    </div>


                                                                </div>

                                                            </div>



                                                        </div>

                                                        <div class="col-lg-12 collapse lado-info-aluno overflow-auto" id="modalTwo" aria-labelledby="nota" data-parent="#modal-perfil-aluno">
                                                            <h5>Notas</h5>
                                                        </div>

                                                        <div class="col-lg-12 collapse overflow-auto" id="modalThree" aria-labelledby="nota" data-parent="#modal-perfil-aluno">
                                                            <h5>Mais</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-2">

                                    <ul class="list-group">
                                        <li class="list-group-item p-3" id="pessoal"><a href="" data-toggle="collapse" data-target="#modalOne">Perfil pessoal</a></li>
                                        <li class="list-group-item" id="nota"><a href="" data-toggle="collapse" data-target="#modalTwo">Boletim</a></li>
                                        <li class="list-group-item" id="mais"><a href="" data-toggle="collapse" data-target="#modalThree">Mais</a></li>
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