<?php if (count($this->view->listObservation) >= 1) { ?>

    <?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

    <?php foreach ($this->view->listObservation as $i => $observation) { ?>

        <form id="formObservation<?= $observation->observationId ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="enrollmentId" value="<?= $observation->enrollmentId ?>">
                <input type="hidden" name="id" value="<?= $observation->observationId ?>">

                <div class="col-lg-8 font-weight-bold">

                    <div class="row d-flex align-items-end">
                        <div class="col-lg-2 miniature-photo"> <img class="" src='<?= $observation->teacherProfilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $observation->teacherProfilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'></div>
                        <div class="col-lg-10 ">Danilo Xaier</div>
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

                $dateTime = explode(' ', $observation->sendDate);
                $data = explode('-', $dateTime[0]);
                $data = $data[2] . '-' . $data[1] . '-' . $data[0];
                $time = substr($dateTime[1], 0, -3);

                ?>

                <div class="form-group col-lg-12">
                    <label for=""><?= $observation->disciplineName ?> - <?= $observation->unity ?> unidade :</label>
                    <textarea class="form-control mb-3" name="description" disabled id="description" rows="3"><?= $observation->observationDescription ?></textarea>
                    <small class="font-weight-bold"><i class="fas fa-history mr-2"></i> Realizada em <?= $data ?> as <?= $time ?> </small>
                </div>


            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhuma observação encontrada</h5>


<?php } ?>