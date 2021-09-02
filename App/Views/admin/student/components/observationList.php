

<?php if (count($this->view->listObservation) >= 1) { ?>

    <?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

    <?php foreach ($this->view->listObservation as $i => $observation) { ?>

        <form id="formObservation<?= $observation->observationId ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="enrollmentId" value="<?= $observation->enrollmentId ?>">
                <input type="hidden" name="id" value="<?= $observation->observationId ?>">

                <div class="col-lg-8 font-weight-bold">

                    <?php $shift = substr($observation->shift, 0, 1) ?>

                    <div class="row d-flex align-items-center">
                        <div class="col-2 miniature-photo">
                            <img class="" src='<?= $observation->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $observation->teacherProfilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                        </div>
                        <div class="col-10"><?= $observation->teacherName ?></div>
                    </div>

                </div>

                <div class="col-lg-4 d-flex justify-content-end option-icon-group mt-2">

                    <span idElement="#formObservation<?= $observation->observationId ?>" formGroup="containerObservation" class="mr-2 edit-data-icon">
                        <i class="fas fa-edit"></i>
                    </span>

                    <span idElement="#formObservation<?= $observation->observationId ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/obervacoes/atualizar" toastData="Observação Atualizada" container="containerObservation" routeList="/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista" class="mr-2 update-data-icon" routeData="#formObservation<?= $observation->observationId ?>">
                        <i class="fas fa-check"></i>
                    </span>

                    <span idElement="#formObservation<?= $observation->observationId ?>" routeDelete="/admin/gestao/turma/perfil-turma/aluno/obervacoes/deletar" toastData="Observação Deletada" routeData="#formObservation<?= $observation->observationId ?>" container="containerObservation" routeList="/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista" class="mr-2 delete-data-icon">
                        <i class="fas fa-trash-alt"></i>
                    </span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

                <?php

                $date = explode('-', $observation->post_date);

                ?>

                <div class="form-group col-lg-12">
                    <label for=""><?= $observation->disciplineName ?> - <?= $observation->unity ?> unidade :</label>
                    <textarea class="form-control mb-3 mt-2" name="description" disabled id="description" rows="3"><?= $observation->observationDescription ?></textarea>

                    <div class="">
                        <div class="row">
                            <small class="col-lg-5 font-weight-bold"><?= $observation->course ?>-<?= $observation->series_acronym ?><?= $shift ?>-<?= $observation->ballot ?> </small>
                            <small class="col-lg-7 text-right font-weight-bold"> <i class="fas fa-history mr-2"></i> Realizada em <?= $date[2] ?> / <?= $date[1] ?></small>
                        </div>

                    </div>
                </div>


            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhuma observação encontrada</h5>


<?php } ?>