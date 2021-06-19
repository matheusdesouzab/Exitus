<div class="row p-3 d-flex justify-content-around col-lg-11 mx-auto" style="border-radius:15px">

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

                                        <?php $photoDir =  "/assets/img/studentProfilePhotos/" ?>

                                        <div class="col-lg-12 mt-4"> <img class="mx-auto" src='<?= $this->view->studentProfile[0]->student_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->studentProfile[0]->student_profile_photo ?>' alt="" style="width: 100px; height: 100px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                    </div>

                                </div>

                                <div class="col-lg-10">

                                    <form id="formClassId" action="">

                                        <input type="hidden" value="<?= $this->view->studentProfile[0]->class_id ?>" name="classId">

                                    </form>

                                    <?php foreach ($this->view->studentProfile as $key => $student) { ?>

                                        <form id="studentModal<?= $student->student_id ?>" class="" action="">

                                            <input type="hidden" value="<?= $student->student_id ?>" name="studentId">
                                            <input type="hidden" value="<?= $student->telephone_id ?>" name="telephoneId">
                                            <input type="hidden" value="<?= $student->address_id ?>" name="addressId">

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
                                                        <input type="text" onload="this.value = this.value.mask('000.000.000-00')" id="cpf" name="cpf" disabled class="form-control" value="<?= $student->student_cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                                                        </div>

                                                        <select id="sex" name="sex" disabled class="form-control custom-select">
                                                            <option value="<?= $student->student_sex_id ?>"><?= $student->student_sex ?></option>
                                                            <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                                                <?php if ($sex->option_value != $student->student_sex_id) { ?>
                                                                    <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>

                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                                                        </div>
                                                        <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $student->student_nacionality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                                                        </div>
                                                        <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $student->student_naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                                                        </div>
                                                        <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $student->student_birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">PcD:</span>
                                                        </div>

                                                        <select id="pcd" name="pcd" disabled class="form-control custom-select">
                                                            <option value="<?= $student->student_pcd_id ?>"><?= $student->student_pcd ?></option>
                                                            <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                                                <?php if ($pcd->option_value != $student->student_pcd_id) { ?>
                                                                    <option value="<?= $pcd->option_value ?>"><?= $pcd->option_text ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>

                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Tipo sanguíneo:</span>
                                                        </div>

                                                        <select id="bloodType" name="bloodType" disabled class="form-control custom-select">
                                                            <option value="<?= $student->blood_type_id ?>"><?= $student->blood_type ?></option>
                                                            <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                                                <?php if ($bloodType->option_value != $student->blood_type_id) { ?>
                                                                    <option value="<?= $bloodType->option_value ?>"><?= $bloodType->option_text ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>

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
                                                        <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $student->telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
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



                <div class="col-lg-12 collapse overflow-auto p-3 accordion-container" id="student-profile-assessment" aria-labelledby="nota" data-parent="#student-profile-accordion">

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

                                    <form id="seekNoteExam" class="mt-3 col-lg-11 mx-auto  text-dark" action="">

                                    <input value="<?= $this->view->studentProfile[0]->enrollmentId ?>" type="hidden" name="enrollmentId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-6">
                                                <label for="">Nome da avaliacão:</label>
                                                <input name="examDescription" id="examDescription" type="text" placeholder="Nome da avaliação" class="form-control">
                                            </div>

                                            <input type="hidden" value="<?= $this->view->studentProfile[0]->class_id ?>" name="classId">
                                           

                                            <div class="form-group col-lg-4">

                                                <label for="">Disciplina:</label>

                                                <select id="disciplineClassId" class="form-control custom-select" name="disciplineClassId" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->disciplinesClassAlreadyAdded as $key => $discipline) { ?>

                                                        <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                            <div class="form-group col-lg-2">
                                                <label for="">Unidade:</label>

                                                <select id="unity" class="form-control custom-select" name="unity" required>

                                                    <option value="0">Todas</option>

                                                    <?php foreach ($this->view->unity as $key => $unity) { ?>

                                                        <option value="<?= $unity->option_value ?>"><?= $unity->option_text ?></option>

                                                    <?php } ?>

                                                </select>

                                            </div>

                                        </div>

                                    </form>

                                    <hr class="col-lg-11 mx-auto">

                                    <div class="table-responsive">

                                        <table class="table col-lg-11 col-sm-10 mx-auto table-borderless table-hover" id="note-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Avaliação</th>
                                                    <th scope="col">Disciplina</th>
                                                    <th scope="col">UE</th>
                                                    <th scope="col">Valor AV</th>
                                                    <th scope="col">Nota AV</th>
                                                </tr>
                                            </thead>
                                            <tbody containerListNote></tbody>
                                        </table>
                                    </div>

                                </div>



                                <div class="collapse card" id="add-reviews" data-parent="#accordion-ratings">

                                    <form id="addNote" class="col-lg-12" action="">

                                        <input value="<?= $this->view->studentProfile[0]->enrollmentId ?>" type="hidden" name="enrollmentId">
                                        <input value="<?= $this->view->studentProfile[0]->class_id ?>" type="hidden" name="classId">

                                        <div class="form-row mt-3">

                                            <div class="form-group col-lg-12" containerAvailableExam></div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-lg-2">
                                                <label for="">Nota obtida:</label>
                                                <input class="form-control" value="0" name="noteValue" type="text" id="noteValue">
                                            </div>

                                            <div class="form-group col-lg-3 ml-auto">
                                                <label for="">&nbsp;</label>
                                                <a id="addNoteStudent" class="btn btn-success w-100">Adicionar</a>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>



                        </div>



                    </div>


                </div>


                <div class=" col-lg-12 collapse accordion-container overflow-auto" id="student-profile-newsletter" data-parent="#student-profile-accordion">

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