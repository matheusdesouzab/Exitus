<?php if (count($this->view->listObservation) >= 1) { ?>

<?php foreach ($this->view->listObservation as $i => $observation) { ?>

    <form id="formClassRoom<?= $observation->classroom_id ?>" class="card mb-4" action="">

        <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

            <input type="hidden" name="classroomId" value="<?= $observation->classroom_id ?>">

            <div class="col-lg-8 font-weight-bold">
                Observação feita por <?= $observation->teacherName ?>
            </div>

            <div class="col-lg-4 d-flex justify-content-end option-icon-group mt-2">

                <span idElement="#formClassRoom<?= $observation->observationId?>" formGroup="containerListClassRoom" class="mr-2 edit-data-icon">
                    <i class="fas fa-edit"></i>
                </span>

                <span idElement="#formClassRoom<?= $observation->observationId?>" routeUpdate="/admin/gestao/sala/atualizar" toastData="Sala Atualizada" container="containerListClassRoom" routeList="/admin/gestao/sala/lista" class="mr-2 update-data-icon">
                    <i class="fas fa-check"></i>
                </span>

                <span idElement="#formClassRoom<?= $observation->observationId?>" routeDelete="/admin/gestao/sala/deletar" toastData="Periodo Letivo Atualizado" container="containerListClassRoom" routeList="/admin/gestao/sala/lista" class="mr-2 delete-data-icon">
                    <i class="fas fa-trash-alt"></i>
                </span>

            </div>

        </div>

        <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

            <div class="form-group col-lg-12">
                <label for="">Capacidade de alunos:</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?= $observation->observationDescription ?></textarea>
            </div>


        </div>

    </form>

<?php }
} else { ?>

<h5 class="mt-3">Nenhuma sala encontrada</h5>


<?php } ?>