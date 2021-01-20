<div id="matricula">

    <div class="row linha-pagina">

        <div class="col-lg-11 mx-auto">

            <div class="col-lg-12 mb-4">
                <h5>Cadastro do Aluno</h5>
            </div>

            <div class="col-lg-12">

                <div class="card pt-5 p-3">

                    <div class="assistente-etapas-sessao">
                        <div class="assistente-etapas-row assistente-etapas-painel">
                            <div class="linha-conexao"></div>
                            <div class="assistente-etapas">
                                <a href="#dados-pessoais" type="button" class=" btn btn-primary btn-circle"><i class="fas fa-user-alt"></i></a>
                                <p>Dados pessoais</p>
                            </div>
                            <div class="assistente-etapas">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fas fa-home"></i></a>
                                <p>Endereço e contato</p>
                            </div>
                            <div class="assistente-etapas">
                                <a href="#step-3" type="button" class="btn btn-default  btn-circle" disabled="disabled"><i class="fas fa-users"></i></a>
                                <p>Curso e turma</p>
                            </div>
                        </div>
                    </div>

                    <form class="was-validated" role="form">
                        <div class="row assistente-etapas-conteudo" id="dados-pessoais">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">
                                    <div class="form-row mt-3">

                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">Nome Completo:</label>
                                            <input type="text" class="form-control is-valid" id="inputEmail4" placeholder="" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">CPF:</label>
                                            <input type="text" id="cpf" class="form-control is-valid" placeholder="Somente números" maxlength="14" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputState">Sexo:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option selected></option>
                                                <option>Masculino</option>
                                                <option>Feminino</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Data Nascimento:</label>
                                            <input type="date" class="form-control is-valid" id="inputAddress" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Naturalidade:</label>
                                            <input type="text" class="form-control is-valid" id="inputAddress2" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Nacionalidade:</label>
                                            <input type="text" class="form-control is-valid" id="inputAddress2" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="form-row mb-5">

                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Nome da Mãe:</label>
                                            <input type="text" class="form-control is-valid" id="inputCity" maxlength="120" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Nome do Pai:</label>
                                            <input type="text" class="form-control is-valid" id="inputCity" maxlength="120" required>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row assistente-etapas-conteudo" id="step-2">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">CEP:</label>
                                            <input type="text" id="cep" class="form-control is-valid" id="inputCity" maxlength="9" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Munícipio:</label>
                                            <input type="text" id="municipio" class="form-control is-valid" id="inputCity" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Bairro:</label>
                                            <input type="text" id="bairro" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputCity">UF:</label>
                                            <input type="text" id="uf" class="form-control is-valid" id="inputCity" required placeholder="Sigla" maxlength="2">
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Endereço:</label>
                                            <input type="text" id="endereco" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Telefone 1:</label>
                                            <input type="text" id="telefone1" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Telefone 2:</label>
                                            <input type="text" id="telefone2" class="form-control is-valid" id="inputCity" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="form-row mt-3 mb-5">

                                        <div class="form-group col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input is-valid" id="customFileLangHTML" required>
                                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Arquivo">Selecionar foto do aluno(a)</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row assistente-etapas-conteudo" id="step-3">
                            <div class="col-lg-10 mx-auto">
                                <div class="col-md-12">

                                    <div class="form-row mt-3">

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Série:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option> </option>
                                                <option>1° ano</option>
                                                <option>2° ano</option>
                                                <option>3° ano</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCity">Situação do Aluno:</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option> </option>
                                                <option>Estudando</option>
                                                <option>Reprovado</option>
                                                <option>Aprovado</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Turma</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option value=""></option>
                                                <option>INFO-1M-A</option>
                                                <option>INFO-1M-B</option>
                                                <option>INFO-2V-A</option>
                                                <option>INFO-2V-B</option>
                                            </select>
                                        </div>



                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Período Letivo</label>
                                            <select id="inputState" class="form-control custom-select is-valid" required>
                                                <option selected> </option>
                                                <option>2020</option>
                                                <option>2021</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-8">
                                           <label for="">Situação da turma </label>                                          
                                                <input type="text" class="form-control" disabled placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3 mb-5 mx-auto">
                                            <a class="btn btn-success disabled w-100" href="">Finalizar cadastro</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </div>

</div>