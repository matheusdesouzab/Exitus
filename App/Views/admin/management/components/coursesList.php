<?php

if (count($this->view->listCourse) >= 1) {

    foreach ($this->view->listCourse as $i => $course) { ?>

        <form id="formCourse<?= $course->course_id ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto option-icon-group">

                <input type="hidden" name="courseId" value="<?= $course->course_id ?>">

                <div class="col-sm-8 font-weight-bold">Curso de <?= $course->course_name ?>
                </div>

                <div class="col-sm-4 d-flex justify-content-end mt-2">

                    <span idElement="#formCourse<?= $course->course_id ?>" formGroup="containerListCourse" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">

                        <i class="fas fa-edit"></i>

                    </span>

                    <span idElement="#formCourse<?= $course->course_id ?>" routeUpdate="/admin/gestao/curso/atualizar" toastData="Curso Atualizado" container="containerListCourse" routeList="/admin/gestao/curso/lista" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="bottom" title="Atualizar">

                        <i class="fas fa-check"></i>

                    </span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

                <div class="form-group col-lg-5">
                    <label for="">Nome do curso:</label>
                    <input class="form-control" disabled value="<?= $course->course_name ?>" type="text" name="courseName" id="">
                </div>

                <div class="form-group col-lg-2">
                    <label for="">Sigla:</label>
                    <input class="form-control" maxlength="4" disabled onkeyup="this.value = this.value.toUpperCase()" value="<?= $course->acronym ?>" type="text" name="acronym" id="">
                </div>

                <div class="form-group col-lg-5">

                    <label for="">Modalidade:</label>

                    <select name="courseMode" id="courseMode" disabled class="form-control custom-select" required>

                        <option value="<?= $course->course_mode_id ?>"><?= $course->course_mode ?></option>

                        <?php foreach ($this->view->courseMode as $key => $value) { ?>
                            <?php if ($course->course_mode_id != $value->option_value) { ?>
                                <option value="<?= $value->option_value ?>"><?= $value->option_text ?></option>
                            <?php } ?>
                        <?php } ?>

                    </select>
                </div>

            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhum curso adicionado</h5>

<?php } ?>