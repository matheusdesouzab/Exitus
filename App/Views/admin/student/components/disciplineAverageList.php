<?php


if (count($this->view->disciplineAverageList) >= 1) {

    foreach ($this->view->disciplineAverageList as $key => $discipline) { ?>

        <form id="formDisciplineAverage<?= $discipline->disciplineAvarageId ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="id" value="<?= $discipline->disciplineAvarageId ?>">
                <input value="<?= $discipline->enrollmentId ?>" type="hidden" name="enrollmentId">
                <input value="<?= $discipline->disciplineClass ?>" type="hidden" name="disciplineClass" id="disciplineClass">
                <input value="<?= $discipline->average ?>" type="hidden" name="average" id="average">

                <div class=" col-lg-8 font-weight-bold">Disciplina de <?= $discipline->disciplineName ?>
                </div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span idElement="#formDisciplineAverage<?= $discipline->disciplineAvarageId ?>" formGroup="containerDisciplineAverageList" class="mr-2 edit-data-icon"><i class="fas fa-edit"></i></span>

                    <span idElement="#formDisciplineAverage<?= $discipline->disciplineAvarageId ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/medias-finais/atualizar" toastData="Média atualizada" container="containerDisciplineAverageList" routeList="/admin/gestao/turma/perfil-turma/aluno/medias-finais/lista" routeData="#formDisciplineAverage<?= $discipline->disciplineAvarageId ?>" class="mr-2 update-data-icon"><i class="fas fa-check"></i></span>

                    <span form="#formDisciplineAverage<?= $discipline->disciplineAvarageId ?>" class="mr-2 refesh-data-icon"><i class="fas fa-sync-alt"></i></span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

                <div class="form-group col-lg-6">
                    <label for="">Média Final</label>
                    <input class="form-control" disabled type="text" value="<?= $discipline->average ?>" name="situation" id="situation" style="pointer-events:none">
                </div>

                <div class="form-group col-lg-6">
                    <label for="">Legenda:</label>
                    <select class="form-control custom-select" disabled name="subtitle" id="subtitle" required>
                        <option value="<?= $discipline->subtitle_id ?>"> <?= $discipline->subtitle ?> </option>
                        <?php foreach ($this->view->listSubtitles as $key => $subtitle) {
                            if ($subtitle->option_value != $discipline->subtitle_id) { ?>
                                <option value="<?= $subtitle->option_value ?>"> <?= $subtitle->option_text ?> </option>
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