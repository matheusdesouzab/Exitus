<div id="funcionario-lista">

    <div class="row container-pai">

        <div class="col-lg-11 mx-auto">

            <h5 class="col-12 mb-4">Lista de funcionários(a)</h5>

            <div class="col-lg-12">

                <div class="card p-3 mb-3">

                    <form class="col-lg-11 accordion mx-auto mt-3" id="accordion-busca-avancada">

                        <div class="form-row">

                            <div class="form-group col-12 col-lg-5">
                                <label for="">Funcionário:</label>
                                <input class="form-control" type="text" name="" placeholder="Nome do funcionário ou CPF" id="">
                            </div>

                            <div class="form-group col-12 col-lg-3">
                                <label for="">Cargo:</label>
                                <select class="form-control custom-select" name="" id="">
                                    <option value="">Todos</option>
                                    <option value="">Merendeira</option>
                                    <option value="">Vigilante</option>
                                </select>
                            </div>

                            <div class="form-group col-10 col-lg-3">
                                <label for="">Sexo:</label>
                                <select class="form-control custom-select" name="" id="">
                                    <option value="">Masculino</option>
                                    <option value="">Feminino</option>
                                </select>

                            </div>

                            <div class="form-group col-2 col-lg-1">
                                <label for="">&nbsp;</label><br>
                                <div id="heading-busca-avancada">
                                    <a class="btn btn-white w-100 p-2" href="" data-toggle="collapse" data-target="#collapse-busca-avancada" aria-expanded="false" aria-controls="collapse-busca-avancada"><i class="fas fa-ellipsis-h"></i></a>
                                </div>
                            </div>

                        </div>

                            <div id="collapse-busca-avancada" class="collapse" aria-labelledby="heading-busca-avancada" data-parent="#accordion-busca-avancada">

                                <div class="form-row mx-auto">

                                    <div class="form-group col-6 col-lg-4">
                                        <label for="">PcD:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">Não</option>
                                            <option value="">Sim</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6 col-lg-8">
                                        <label for="">Idade:</label>
                                        <select class="form-control custom-select" name="" id="">
                                            <option value="">Entre 20 e 30 anos</option>
                                            <option value="">Entre 31 e 40 anos</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        
                    </form>

                    <hr class="col-lg-10 mx-auto">

                    <div class="table-responsive">
                        <table class="table table-hover mt-3 table-borderless col-lg-11 mx-auto">

                            <thead>
                                <tr>
                                    <th class="" colspan="2" scope="col">Nome do funcionário(a)</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Cargo atual</th>
                                    <th scope="col">Idade</th>
                                    <th scope="col">Sexo</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr class="text-center">
                                    <td class="text-rigth"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>Vigilante</td>
                                    <td>30 anos</td>
                                    <td>Masculino</td>
                                </tr>
                               
                                <tr class="text-center">
                                    <td class="text-rigth"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>Vigilante</td>
                                    <td>30 anos</td>
                                    <td>Masculino</td>
                                </tr>
                               
                                <tr class="text-center">
                                    <td class="text-rigth"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>Vigilante</td>
                                    <td>30 anos</td>
                                    <td>Masculino</td>
                                </tr>
                               
                                <tr class="text-center">
                                    <td class="text-rigth"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>Vigilante</td>
                                    <td>30 anos</td>
                                    <td>Masculino</td>
                                </tr>
                               
                                <tr class="text-center">
                                    <td class="text-rigth"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>Vigilante</td>
                                    <td>30 anos</td>
                                    <td>Masculino</td>
                                </tr>
                               
                                <tr class="text-center">
                                    <td class="text-rigth"><img src="/assets/img/foto-perfil-1.png" alt=""></td>
                                    <td class="text-left">Matheus de Souza Barbosa</td>
                                    <td>864.407.324-21</td>
                                    <td>Vigilante</td>
                                    <td>30 anos</td>
                                    <td>Masculino</td>
                                </tr>
                               
                               
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal modal-perfil fade" id="perfilFuncionarioModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

                                                    <div class="col-lg-12 collapse show overflow-auto p-3 container-accordion" id="collapse-perfil-aluno-opcoes-dados" aria-labelledby="dados" data-parent="#accordion-perfil-aluno-opcoes" style="border-radius: 15px">


                                                        <div class="row">

                                                            <div class="col-lg-2">

                                                                <div class="row">

                                                                    <div class="col-lg-12 mt-4 d-flex justify-content-center"><img src="/assets/img/foto-perfil-1.png" class="" alt=""></div>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-10">

                                                                <div class="row">

                                                                    <div class="col-lg-12 d-flex justify-content-end">

                                                                        <span class="mr-2 editar-dados-icon"><i class="text-center fas fa-edit"></i></span>
                                                                        <span class="mr-2 atualizar-dados-icon"><i class="fas fa-check"></i></span>

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

                                                                            <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="addon-wrapping">Tipo sanguíneo:</span>
                                                                                </div>
                                                                                <input type="text" disabled class="form-control" value="AB" aria-label="Username" aria-describedby="addon-wrapping">
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

                                                                            <h5 class="mt-3 mb-3 ml-2">Cargo atual:</h5>

                                                                            <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="addon-wrapping">Cargo atual:</span>
                                                                                </div>
                                                                                <input type="text" disabled class="form-control" value="Vigilante" aria-label="Username" aria-describedby="addon-wrapping">
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

                                                                                    <p><b>Data:</b> 31/08/2020</p>

                                                                                </div>


                                                                            </div>

                                                                            <div class="card bg-white w-100 mt-3 mb-3" style="max-width: 18rem;">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">Gazeamento</h5>
                                                                                    <p class="card-text">Aluno saio para jogar bola</p>

                                                                                    <p><b>Data:</b> 11/10/2019</p>

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

                                        <li class="list-group-item border-0" id="nota" data-toggle="collapse" aria-expanded="false" data-target="#collapse-perfil-aluno-opcoes-nota"><a href="#"> <i class="far fa-list-alt mr-2"></i> Escala</a></li>

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