<div class="row p-3 d-flex justify-content-around col-lg-11 mx-auto bg-white" style="border-radius:15px">

    <div class="col-lg-9">

        <div class="row accordion" id="student-profile-accordion">

            <ul class="list-group horizontal-control-list mx-auto list-group-horizontal">

                <li class="list-group-item" data-target="#student-profile-data" aria-expanded="true" data-toggle="collapse"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

                <li class="list-group-item" data-toggle="collapse" aria-expanded="false" data-target="#student-profile-assessment"><a href="#"> <i class="far fa-list-alt mr-2"></i> Avaliações</a></li>

                <li class="list-group-item" data-toggle="collapse" aria-expanded="false" data-target="#student-profile-newsletter"><a href="#"> <i class="fas fa-clipboard mr-2"></i> Boletim</a></li>

            </ul>

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">

                        <div class="col-lg-12 collapse show overflow-auto p-3 accordion-container" id="student-profile-data" data-parent="#student-profile-accordion">

                            <div class="row">

                                <div class="col-lg-2">

                                    <div class="row">

                                        <?php $photoDir =  "/assets/img/profilePhoto/" ?>

                                        <div class="col-lg-12 mt-4"> <img class="mx-auto" src='<?= $this->view->studentProfile[0]->student_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->studentProfile[0]->student_profile_photo ?>' alt="" style="width: 100px; height: 100px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                    </div>

                                </div>

                                <div class="col-lg-10">

                                    <?php foreach ($this->view->studentProfile as $key => $student) { ?>

                                        <form id="studentModal<?= $student->student_id ?>" class="" action="">

                                            <div class="row">

                                                <div class="option-list col-lg-12">

                                                    <span idElement="#studentModal<?= $student->student_id ?>" formGroup="containerListStudent" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                                    <span idElement="#studentModal<?= $student->student_id ?>" routeUpdate="/admin/aluno/lista/perfil-aluno/atualizar" toastData="Dados atualizados" container="containerListStudent" routeList="/admin/aluno/lista/listagem" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-7 col-12">

                                                    <h5 class="mt-3 mb-3 ml-2">Dados pessoais:</h5>

                                                    <div class="input-group d-flex col-12 col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nome:</span>
                                                        </div>
                                                        <input type="text" id="name" name="name" disabled class="form-control" value="<?= $student->student_name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-12 col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nome da mãe:</span>
                                                        </div>
                                                        <input type="text" id="motherName" name="motherName" disabled class="form-control" value="<?= $student->student_mother ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nome do pai:</span>
                                                        </div>
                                                        <input type="text" id="fatherName" name="fatherName" disabled class="form-control" value="<?= $student->student_father ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">CPF:</span>
                                                        </div>
                                                        <input type="text" id="cpf" name="cpf" disabled class="form-control" value="<?= $student->student_cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                                                        </div>
                                                        <input type="text" id="sex" name="sex" disabled class="form-control" value="<?= $student->student_sex ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                                                        </div>
                                                        <input type="text" id="nacionality" name="nacionality" disabled class="form-control" value="<?= $student->student_nacionality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                                                        </div>
                                                        <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $student->student_naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">PcD:</span>
                                                        </div>
                                                        <input type="text" id="pcd" name="pcd" disabled class="form-control" value="<?= $student->student_pcd ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Tipo sanguíneo:</span>
                                                        </div>
                                                        <input type="text" id="bloodType" name="bloodTpe" disabled class="form-control" value="<?= $student->blood_type ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <hr>

                                                    <h5 class="mt-3 mb-3 ml-2">Endereço e contato:</h5>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">CEP:</span>
                                                        </div>
                                                        <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $student->student_zipCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">UF:</span>
                                                        </div>
                                                        <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $student->student_uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Município:</span>
                                                        </div>
                                                        <input type="text" id="county" name="county" disabled class="form-control" value="<?= $student->student_county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                                                        </div>
                                                        <input type="text" id="district" name="district" disabled class="form-control" value="<?= $student->student_district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                                                        </div>
                                                        <input type="text" id="address" name="address" disabled class="form-control" value="<?= $student->student_address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Telefone</span>
                                                        </div>
                                                        <input id="telephone" name="telephone" type="text" disabled class="form-control" value="<?= $student->telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>



                                                    <hr>

                                                    <h5 class="mt-3 mb-3 ml-2">Curso e turma:</h5>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Situação do aluno:</span>
                                                        </div>
                                                        <input type="text" disabled class="form-control" value="<?= $student->student_situation ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Turma:</span>
                                                        </div>
                                                        <input type="text" disabled class="form-control" value="<?= $student->acronym_series ?> <?= $student->ballot ?> -  <?= $student->course ?> - <?= $student->shift_name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                <?php } ?>

                                        </form>

                                </div>

                                <div class="col-lg-5 col-12 overflow-auto">

                                    <div class="row p-3">

                                        <h5 class="mt-3 mb-3 ml-2">Observações:</h5>

                                        <div class="col-lg-12">

                                            <div class="row">

                                                <div class="card col-lg-12 card-hover bg-white mb-3">

                                                    <div class="card-body">
                                                        <h5 class="card-title">Comportamento Infantil</h5>
                                                        <p class="card-text">Aluno xingou seus colegas com palavras de baixo calão.</p>

                                                        <p><b>Professor(a):</b> Magno Lima</p>
                                                        <p><b>Disciplina:</b> Mátematica</p>
                                                        <p><b>Unidade:</b> 1</p>
                                                        <p><b>Data do ocorrido:</b> 31/08</p>

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



                <div class="col-lg-12 collapse overflow-auto p-3 accordion-container" id="student-profile-assessment" data-parent="#student-profile-accordion">

                    <div class="col-lg-12 accordion" id="accordion-ratings">

                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-6">
                                        <h5>Avaliações</h5>
                                    </div>

                                    <div class="col-lg-6 collapse-options-container">

                                        <a class="font-weight-bold" aria-expanded="true" data-toggle="collapse" data-target="#rating-list"><span class="mr-2"><i class="fas fa-boxes mr-2"></i> Avaliações</span></a>

                                        <a class="collapsed font-weight-bold" aria-expanded="false" data-toggle="collapse" data-target="#add-reviews"><span class="mr-2"><i class="fas fa-plus-circle mr-2"></i> Adicionar</span></a>


                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">

                                <div class="collapse show card" id="rating-list" data-parent="#accordion-ratings">

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
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                            </div>

                                        </div>

                                    </form>

                                    <hr class="col-lg-11 mx-auto">

                                    <div class="table-responsive">

                                        <table class="table col-lg-11 col-sm-10 mx-auto table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Avaliação</th>
                                                    <th scope="col">UE</th>
                                                    <th scope="col">Disciplina</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Valor AV</th>
                                                    <th scope="col">Nota AV</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Prova em dupla</td>
                                                    <td>1</td>

                                                    <td>MATE</td>
                                                    <td>20/12/2001</td>
                                                    <td>4,0</td>
                                                    <td>2,0</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Prova em dupla</td>
                                                    <td>1</td>

                                                    <td>MATE</td>
                                                    <td>20/12/2001</td>
                                                    <td>4,0</td>
                                                    <td>2,0</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Prova em dupla</td>
                                                    <td>1</td>

                                                    <td>MATE</td>
                                                    <td>20/12/2001</td>
                                                    <td>4,0</td>
                                                    <td>2,0</td>
                                                </tr>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Prova em dupla</td>
                                                    <td>1</td>

                                                    <td>MATE</td>
                                                    <td>20/12/2001</td>
                                                    <td>4,0</td>
                                                    <td>2,0</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>



                                <div class="collapse card" id="add-reviews" data-parent="#accordion-ratings">

                                    <form class="col-lg-12" action="">



                                        <div class="form-row mt-3 mb-3">

                                            <div class="form-group col-lg-7">
                                                <label for="">Avaliações disponiveis:</label>

                                                <select id="inputState" class="form-control custom-select" required>
                                                    <option>Trabalho em grupo - Biologia - 4,0 - 1 Unidade</option>
                                                    <option>Biologia</option>
                                                    <option>Português</option>
                                                    <option>Filosofia</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-lg-1">
                                                <label for="">Nota:</label>

                                                <input class="form-control" type="text" maxlength="3">

                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="">&nbsp;</label>
                                                <a class="btn btn-success w-100" href="">Adicionar nota da avaliação</a>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>



                        </div>



                    </div>


                </div>


                <div class="col-lg-12 collapse accordion-container overflow-auto" id="student-profile-newsletter" data-parent="#student-profile-accordion">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="row mt-3">
                                <div class="col-lg-6 col-8">
                                    <h5 class="">Boletim do aluno</h5>
                                </div>
                                <div class="col-lg-6 col-4 mt-3 text-right"><span class="printer-icon"><i class="fas fa-print"></i></span></div>

                            </div>
                        </div>

                        <div class="col-lg-12 mt-3"><b>Aluno:</b> João Pedro de Souza</div>

                        <div class="col-lg-12 mt-3"><b>Nível / Modalidade de ensino:</b> Ensino Profissional, Médio Intregado</div>

                        <div class="col-lg-12">

                            <div class="row mt-3">
                                <div class="col-lg-5"><b>Série:</b> 1 Serie - Tecnico em Informática</div>
                                <div class="col-lg-3"><b>Classe:</b> INFO-1M-B</div>
                                <div class="col-lg-3"><b>Sala:</b> 13</div>
                            </div>
                        </div>

                        <div class="col-lg-12 card mt-3">

                            <div class="row table-responsive">

                                <table class="table table-striped table-bordered mt-3">

                                    <thead class="">

                                        <tr>

                                            <th class="th-rowspan-2" colspan="" rowspan="2" scope="col">
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

                                    <tfoot>

                                        <th>Situação do aluno(a):</th>
                                        <td>APROVADO</td>

                                    </tfoot>




                                </table>



                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-lg-12 collapse overflow-auto" id="modalThree" data-parent="#student-profile-accordion">
                    <h5>Mais</h5>
                </div>

            </div>

        </div>

    </div>
</div>
</div>


<div class="col-lg-2 side-collapse-options">

    <ul class="list-group text-center">

        <li class="list-group-item border-0" data-target="#student-profile-data" aria-expanded="true" id="dados" data-toggle="collapse"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

        <li class="list-group-item border-0" id="nota" data-toggle="collapse" aria-expanded="false" data-target="#student-profile-assessment"><a href="#"> <i class="far fa-list-alt mr-2"></i> Avaliações</a></li>

        <li class="list-group-item border-0" id="boletim" data-toggle="collapse" aria-expanded="false" data-target="#student-profile-newsletter"><a href="#"> <i class="fas fa-clipboard mr-2"></i> Boletim</a></li>

        <li class="list-group-item border-0" id="mais" aria-expanded="false" data-toggle="collapse" data-target="#modalThree"><a href="#"><i class="fas fa-chart-line mr-2"></i> Análise </a></li>

    </ul>

</div>
</div>