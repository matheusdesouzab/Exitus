<div class="row p-3 d-flex justify-content-around col-lg-11 mx-auto bg-white" style="border-radius:15px">

    <div class="col-lg-9">

        <div class="row accordion" id="teacher-profile-accordion">

            <ul class="list-group horizontal-control-list mx-auto list-group-horizontal">

                <li class="list-group-item" data-target="#teacher-profile-data" aria-expanded="true" data-toggle="collapse"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

                <li class="list-group-item" data-toggle="collapse" aria-expanded="false" data-target="#student-profile-assessment"><a href="#"> <i class="far fa-list-alt mr-2"></i> Avaliações</a></li>

            </ul>

            <div class="row">

                <div class="col-lg-12">

                    <div class="row">

                        <div class="col-lg-12 collapse show overflow-auto p-3 accordion-container" id="teacher-profile-data" data-parent="#teacher-profile-accordion">

                            <div class="row">

                                <div class="col-lg-2">

                                    <div class="row">

                                        <?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

                                        <div class="col-lg-12 mt-4"> <img class="mx-auto" src='<?= $this->view->teacherProfile[0]->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $this->view->teacherProfile[0]->teacher_profile_photo ?>' alt="" style="width: 100px; height: 100px; object-position:top; object-fit: cover" onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>

                                    </div>

                                </div>

                                <div class="col-lg-10">

                                    <?php foreach ($this->view->teacherProfile as $key => $teacher) { ?>

                                        <form id="teacherModal<?= $teacher->teacher_id ?>" class="" action="">

                                            <input type="hidden" value="<?= $teacher->teacher_id ?>" name="teacherId">
                                            <input type="hidden" value="<?= $teacher->telephone_id_teacher ?>" name="telephoneId">
                                            <input type="hidden" value="<?= $teacher->teacher_address_id ?>" name="addressId">

                                            <div class="row">

                                                <div class="option-list col-lg-12">

                                                    <span idElement="#teacherModal<?= $teacher->teacher_id ?>" formGroup="containerListTeacher" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                                                    <span idElement="#teacherModal<?= $teacher->teacher_id ?>" routeUpdate="/admin/professor/lista/perfil-professor/atualizar" toastData="Dados atualizados" container="containerListTeacher" routeList="/admin/professor/lista/listagem" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-7 col-12">

                                                    <h5 class="mt-3 mb-3 ml-2">Dados pessoais:</h5>

                                                    <div class="input-group d-flex col-12 col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nome:</span>
                                                        </div>
                                                        <input type="text" id="name" name="name" disabled class="form-control" value="<?= $teacher->teacher_name ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>


                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">CPF:</span>
                                                        </div>
                                                        <input type="text" id="cpf" name="cpf" disabled class="form-control" value="<?= $teacher->teacher_cpf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Sexo:</span>
                                                        </div>

                                                        <select id="sex" name="sex" disabled class="form-control custom-select">
                                                            <option value="<?= $teacher->teacher_sex_id ?>"><?= $teacher->teacher_sex ?></option>
                                                            <?php foreach ($this->view->availableSex as $key => $sex) { ?>
                                                                <?php if ($sex->option_value != $teacher->teacher_sex_id) { ?>
                                                                    <option value="<?= $sex->option_value ?>"><?= $sex->option_text ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>

                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Nacionalidade:</span>
                                                        </div>
                                                        <input type="text" id="nationality" name="nationality" disabled class="form-control" value="<?= $teacher->teacher_nacionality ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Naturalidade:</span>
                                                        </div>
                                                        <input type="text" id="naturalness" name="naturalness" disabled class="form-control" value="<?= $teacher->teacher_naturalness ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Data de Nascimento:</span>
                                                        </div>
                                                        <input type="date" id="birthDate" name="birthDate" disabled class="form-control" value="<?= $teacher->teacher_birth_date ?>" max="2006-01-31" min="1940-01-31" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">PcD:</span>
                                                        </div>

                                                        <select id="pcd" name="pcd" disabled class="form-control custom-select">
                                                            <option value="<?= $teacher->teacher_pcd_id ?>"><?= $teacher->teacher_pcd ?></option>
                                                            <?php foreach ($this->view->pcd as $key => $pcd) { ?>
                                                                <?php if ($pcd->option_value != $teacher->teacher_pcd_id) { ?>
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
                                                            <option value="<?= $teacher->blood_type_id_teacher ?>"><?= $teacher->blood_type_teacher ?></option>
                                                            <?php foreach ($this->view->bloodType as $key => $bloodType) { ?>
                                                                <?php if ($bloodType->option_value != $teacher->blood_type_id_teacher) { ?>
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
                                                        <input type="text" id="zipCode" name="zipCode" disabled class="form-control" value="<?= $teacher->teacher_zipCode ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">UF:</span>
                                                        </div>
                                                        <input type="text" id="uf" name="uf" disabled class="form-control" value="<?= $teacher->teacher_uf ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Município:</span>
                                                        </div>
                                                        <input type="text" id="county" name="county" disabled class="form-control" value="<?= $teacher->teacher_county ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Bairro:</span>
                                                        </div>
                                                        <input type="text" id="district" name="district" disabled class="form-control" value="<?= $teacher->teacher_district ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Endereço:</span>
                                                        </div>
                                                        <input type="text" id="address" name="address" disabled class="form-control" value="<?= $teacher->teacher_address ?>" aria-label="Username" aria-describedby="addon-wrapping">
                                                    </div>

                                                    <div class="input-group d-flex justify-content-start col-lg-12 flex-nowrap">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="addon-wrapping">Telefone</span>
                                                        </div>
                                                        <input id="telephoneNumber" name="telephoneNumber" type="text" disabled class="form-control" value="<?= $teacher->teacher_telephone_number ?>" aria-label="Username" aria-describedby="addon-wrapping">
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



                <div class="col-lg-12 collapse overflow-auto p-3 accordion-container" id="student-profile-assessment" data-parent="#teacher-profile-accordion">

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


                            </div>



                        </div>



                    </div>


                </div>



                <div class="col-lg-12 collapse overflow-auto" id="modalThree" data-parent="#teacher-profile-accordion">
                    <h5>Mais</h5>
                </div>

            </div>

        </div>

    </div>
</div>
</div>


<div class="col-lg-2 side-collapse-options">

    <ul class="list-group text-center">

        <li class="list-group-item border-0" data-target="#teacher-profile-data" aria-expanded="true" id="dados" data-toggle="collapse"><a class="" href="#"><i class="fas fa-portrait mr-2"></i> Dados</a></li>

        <li class="list-group-item border-0" id="nota" data-toggle="collapse" aria-expanded="false" data-target="#student-profile-assessment"><a href="#"> <i class="far fa-list-alt mr-2"></i> Avaliações</a></li>



    </ul>

</div>
</div>