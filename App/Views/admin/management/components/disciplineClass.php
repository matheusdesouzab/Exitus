<?php
require __DIR__ . '../../../../../config/variables.php';
?>

<?php

if (count($this->view->listTeacher) >= 1) {

    foreach ($this->view->listTeacher as $key => $discipline) { ?>

        <form id="formDisciplineClass<?= $discipline->discipline_class_id ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="disciplineClass" value="<?= $discipline->discipline_class_id ?>">
                <input type="hidden" name="classId" value="<?= $discipline->class_id ?>">

                <div class="col-sm-8 font-weight-bold">Disciplina de <?= $discipline->discipline_name ?></div>

                <div class="col-sm-4 d-flex justify-content-end mt-2">

                    <span idElement="#formDisciplineClass<?= $discipline->discipline_class_id ?>" formGroup="containerListDisciplineClass" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">
                    
                        <i class="fas fa-edit"></i>
                
                    </span>

                    <span idElement="#formDisciplineClass<?= $discipline->discipline_class_id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/turma-disciplina/atualizar" toastData="Disciplina da turma atualizada" container="containerListDisciplineClass" routeList="/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma" routeData="#formDisciplineClass<?= $discipline->discipline_class_id ?>" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="bottom" title="Atualizar">
                    
                        <i class="fas fa-check"></i>
                    
                    </span>

                    <span idElement="#formDisciplineClass<?= $discipline->discipline_class_id ?>" routeDelete="/admin/gestao/turma/perfil-turma/turma-disciplina/deletar" toastData="Disciplina da turma deletada" routeData="#formDisciplineClass<?= $discipline->discipline_class_id ?>" container="containerListDisciplineClass" routeList="/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma" class="mr-2 delete-data-icon"  data-toggle="tooltip" data-placement="right" title="Deletar"> 
                    
                        <i class="fas fa-trash-alt"></i>
                    
                    </span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">
                <div class="form-group col-lg-6">
                    <label for="">Professor:</label>
                    <select id="teacher" disabled name="teacher" class="form-control custom-select" required>

                        <option value="<?= $discipline->id ?>"><?= $discipline->name ?></option>

                        <?php foreach ($this->view->teacherAvailable as $key => $teacher) {
                            if ($discipline->id != $teacher->option_value) { ?>
                                <option value="<?= $teacher->option_value ?>"><?= $teacher->option_text ?></option>
                        <?php }
                        } ?>


                    </select>


                </div>
                <div class="form-group col-lg-6">
                    <label for="">Disciplina:</label>
                    <select id="discipline" disabled name="discipline" class="form-control custom-select" required style="pointer-events:none">

                        <option value="<?= $discipline->discipline_id ?>"><?= $discipline->discipline_name ?></option>

                    </select>

                </div>


            </div>

        </form>

    <?php }
} else { ?>

    <div class="col-lg-12">

        <div class="row">

            <div class="col-lg-12 d-flex justify-content-center"><img class="" src="<?= $app_url ?>/assets/img/illustrations/discipline_link.svg" alt=""></div>

            <h5 class="col-lg-12 mt-4 text-center">Nenhuma disciplina vinculada a turma</h5>

        </div>

    </div>


<?php } ?>