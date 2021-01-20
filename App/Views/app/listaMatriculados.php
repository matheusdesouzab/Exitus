<div id="lista-matriculados">

            <div class="row">
                <div class="col-lg-10 mb-2 col-md-10 ml-auto col-sm-12 col-xl-10 mx-auto" style="border-radius: 15px;transition:0.7s">
                    <h5 class="mt-3">Consultar dados</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-6 col-lg-3">
                            <label for="curso">Curso</label>
                            <select name="curso" id="curso" class="custom-select">
                                <option value="0">Todos</option>
                                <option value="1">UX Design</option>
                                <option value="2">Analista de Dados</option>
                                <option value="3">Informática Básica</option>
                            </select>
                        </div>
                        <div class="form-group col-6 col-lg-2">
                            <label for="turno">Turma</label>
                            <select id="turma" class="custom-select">
                                <option value="0">Todas</option>
                                <option value="1">A</option>
                                <option value="2">B</option>

                            </select>
                        </div>
                        <div class="form-group col-6 col-lg-2">
                            <label for="turno">Turno</label>
                            <select id="turno" class="custom-select">
                                <option value="0">Todos</option>
                                <option value="1">Matutino</option>
                                <option value="2">Vespertino</option>
                            </select>
                        </div>
                        <div class="form-group col-6 col-lg-2">
                            <label for="turno">Sexo</label>
                            <select id="sexo" class="custom-select">
                                <option value="0">Todos</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>

                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-3">
                            <label for="turno">Ordem</label>
                            <select id="ordem" class="custom-select">
                                <option value="">Normal</option>
                                <option value="asc">Crescente</option>
                                <option value="desc">Descrente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">


                    </div>
                    <div class="p-4 mt-4" id="conteudo">

                        <table class="table col-12 table-hover table-responsive-lg  mx-auto table-borderless">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Turma</th>
                                    <th scope="col">Turno</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Editar</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($this->view->dadosGerais['matriculasRecentes'] as $indice => $alunos) {

                                    $dataHoraAux = $alunos['data_hora_matricula'];
                                    $dataHora = explode(" ", $dataHoraAux);
                                    $data = explode("-", $dataHora[0]);

                                ?>

                                    <tr class="text-center linha_padrao" id="<?= $alunos['id_aluno'] ?>">

                                        <td style="line-height: 40px;"><?= $alunos['nome_aluno'] ?></td>
                                        <td>
                                            <div class="btn  text-dark"><?= $alunos['nome_curso'] ?></div>
                                        </td>
                                        <td style="line-height: 40px;"><?= $alunos['nome_turma'] ?></td>
                                        <td style="line-height: 40px;"><?= $alunos['nome_turno'] ?></td>
                                        <td style="line-height: 40px;"><?= $data[2] ?>/<?= $data[1] ?></td>
                                        <td class="editar" id="matricula<?= $alunos['id_aluno'] ?>" style="line-height: 40px;"><span class="caixa-icon shadow-sm"><i class="fas fa-pen"></i></span></td>


                                        </td>
                                    </tr>
                                <?php } ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modal">
    <div class="modal fade" id="modalDadosAluno" tabindex="-1" role="dialog" aria-labelledby="modalDadosAlunoTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-3 bg-white">
                <div class="modal-header">
                    <img id="imgSexo" class="rounded-circle d-inline mr-3" src="" style="width: 50px;height:50px;background-size:cover; border:3px solid white">
                    <h5 class="modal-title" style="line-height: 50px;" id="modalDadosAlunoTitle"></h5>

                    <button id="fecharModal" type="button" class="close" data-dismiss="modal" aria-label="Close" style="line-height: 50px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">

                    <div class="col-lg-6 p-4 col-7">
                        <h5>Ficha cadastral</h5>
                    </div>

                    <div class="col-lg-6 col-5">

                        <div class="row justify-content-end p-4">

                            <div id="editarDados" class="col-lg-2 col-6"><span class="caixa-icon shadow-sm py-2"><i class="fas fa-pen"></i></span></div>
                            <div class="col-lg-2 col-6"><span class="caixa-icon shadow-sm py-2"><i class="fas fa-trash-alt"></i></span></div>

                        </div>

                    </div>

                </div>

                <div class="row p-2">

                    <div class="col-lg-12 mx-auto">

                        <form class="" style="margin-top:-30px !important">

                        <input type="hidden" id="id_aluno" name="id_aluno">

                            <div class="form-row mt-3">
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">Nome</label>
                                    <input type="text" name="nome" id="nomeModal" disabled value="" class="text-center   form-control bg-white">
                                </div>
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">CPF</label>
                                    <input type="text" name="cpf" id="cpfModal" disabled value="" class="text-center form-control bg-white">
                                </div>
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label for="sexo">Sexo:</label>
                                    <select id="sexo" name="sexo" disabled class="custom-select" required>
                                        <option id="sexoAtualModal"></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">Telefone</label>
                                    <input type="text" name="telefone" id="telefoneModal" disabled value="" class="text-center   form-control bg-white">
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-sm-5 col-lg-3">
                                    <label class="font-weight-bold" for="">Nascimento</label>

                                    <input id="nascimentoModal" type="date" name="nascimento" disabled value="" class="text-center  form-control bg-white">
                                </div>

                                <div class="form-group col-sm-7 col-lg-3">
                                    <label class="font-weight-bold" for="">Email</label>
                                    <input type="text" id="emailModal" disabled value="" name="email" class="text-center   form-control bg-white">
                                </div>

                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">Naturalidade</label>
                                    <input type="text" id="naturalidadeModal" disabled value="" name="naturalidade" class="text-center  form-control bg-white">
                                </div>
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">CEP</label>
                                    <input type="text" id="cepModal" disabled value="" name="cep" class="text-center  form-control bg-white">
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">Endereço</label>
                                    <input type="text" id="enderecoModal" name="endereco" disabled value="" class="text-center   form-control bg-white">
                                </div>
                                <div class="form-group col-sm-6 col-lg-2">
                                    <label class="font-weight-bold" for="">UF</label>
                                    <input type="text" id="ufModal" name="uf" disabled value="" class="text-center  form-control bg-white">
                                </div>
                           
                                <div class="form-group col-sm-6 col-lg-4">
                                    <label class="font-weight-bold" for="">Bairro</label>
                                    <input type="text" id="bairroModal" name="bairro" disabled value="" class="text-center   form-control bg-white">
                                </div>
                                <div class="form-group col-sm-6 col-lg-3">
                                    <label class="font-weight-bold" for="">Municipio</label>
                                    <input type="text" id="municipioModal" name="municipio" disabled value="" class="text-center   form-control bg-white">
                                </div>

                            </div>
                            <div class="form-row">
                            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3">
                                    <label for="curso">Curso:</label>
                                    <select id="curso" name="curso" class="custom-select" disabled required>
                                    <option id="cursoAtualModal" valeu=""></option>
                                        <?php foreach ($this->view->dadosGerais['dadosCurso']['cursos'] as $indice => $curso) { ?>
                                            <option value="<?= $curso['id_curso'] ?>"><?= $curso['nome_curso'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-7 col-sm-6 col-md-3 col-lg-3">
                                    <label for="turno">Turno:</label>
                                    <select name="turno" id="turno" class="custom-select" disabled required>
                                    <option id="turnoAtualModal" valeu=""></option>
                                        <?php foreach ($this->view->dadosGerais['dadosCurso']['turno'] as $indice => $curso) { ?>
                                            <option value="<?= $curso['id_turno'] ?>"><?= $curso['nome_turno'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-5 col-sm-6 col-md-2 col-lg-3">
                                    <label for="turma">Turma:</label>
                                    <select  name="turma" id="turma" class="custom-select" disabled required>
                                        <option id="turmaAtualModal" valeu=""></option>
                                        <?php foreach ($this->view->dadosGerais['dadosCurso']['turma'] as $indice => $curso) { ?>
                                            <option value="<?= $curso['id_turma'] ?>"><?= $curso['nome_turma'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-5 col-sm-6 col-md-2 col-lg-3">
                                    <label for="turma">&nbsp;</label>
                                    <a id="atualizarDados"  class="btn btn-success w-100 text-white disabled">Atualizar</a>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>