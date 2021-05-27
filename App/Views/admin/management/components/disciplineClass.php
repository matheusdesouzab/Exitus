<?php

if (count($this->view->listTeacher) >= 1) {

    foreach ($this->view->listTeacher as $key => $discipline) { ?>

        <form id="formDisciplineClass<?= $discipline->discipline_class_id ?>" class="card mb-4 col-lg-12" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="disciplineClassId" value="<?= $discipline->discipline_class_id ?>">
                <input type="hidden" name="classId" value="<?= $discipline->class_id ?>">

                <div class=" col-lg-8 font-weight-bold">Disciplina de <?= $discipline->discipline_name ?>
                </div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span idElement="#formDisciplineClass<?= $discipline->discipline_class_id ?>" formGroup="containerListDisciplineClass" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                    <span idElement="#formDisciplineClass<?= $discipline->discipline_class_id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/turma-disciplina/atualizar" toastData="Curso Atualizado" container="containerListDisciplineClass" routeList="/admin/gestao/turma/perfil-turma/turma-disciplina/professores-disciplina-turma" routeData="#formDisciplineClass<?= $discipline->discipline_class_id ?>" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                    <span idElement="#formDisciplineClass<?= $discipline->discipline_class_id ?>" routeDelete="/admin/gestao/curso/deletar" toastData="Curso Atualizado" container="containerListDisciplineClass" routeList="/admin/gestao/curso/lista" class="mr-2 delete-data-icon"><i class="fas fa-ban"></i></span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">
                <div class="form-group col-lg-5">
                    <label for="">Professor:</label>
                    <select id="teacher" disabled name="teacher" class="form-control custom-select" required>

                        <option value="<?= $discipline->teacher_id ?>"><?= $discipline->teacher_name ?></option>

                        <?php foreach ($this->view->teacherAvailable as $key => $teacher) {
                            if ($discipline->teacher_id != $teacher->option_value) { ?>
                                <option value="<?= $teacher->option_value ?>"><?= $teacher->option_text ?></option>
                        <?php }
                        } ?>


                    </select>


                </div>
                <div class="form-group col-lg-7">
                    <label for="">Disciplina:</label>
                    <select id="discipline" disabled name="discipline" class="form-control custom-select" required style="pointer-events:none">

                        <option value="<?= $discipline->discipline_id ?>"><?= $discipline->discipline_name ?></option>

                        <?php foreach ($this->view->disciplineAvailable as $key => $discipline) {
                            if ($discipline->discipline_id != $discipline->option_value) { ?>
                                <option value="<?= $discipline->option_value ?>"><?= $discipline->option_text ?></option>
                        <?php }
                        } ?>

                    </select>

                </div>


            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhuma disciplina encontrada</h5>


<?php } ?>