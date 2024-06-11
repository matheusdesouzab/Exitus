<?php 

require __DIR__ . '../../../../../config/variables.php';

?>


<?php if (count($this->view->listObservation) >= 1) { ?>

    <?php $photoDir =  "$app_url/assets/img/teacherProfilePhotos/" ?>

    <?php foreach ($this->view->listObservation as $i => $observation) { ?>

        <form id="formObservation<?= $observation->observation_id ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="enrollmentId" value="<?= $observation->enrollment_id ?>">
                <input type="hidden" name="id" value="<?= $observation->observation_id ?>">

                <div class="col-lg-8 font-weight-bold">

                    <?php $shift = substr($observation->shift, 0, 1) ?>

                    <div class="row d-flex align-items-center">
                        <div class="col-2">
                            <img class="miniature-photo" src='<?= $observation->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $observation->teacher_profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                        </div>
                        <div class="col-10"><?= $observation->teacher_name ?></div>
                    </div>

                </div>

                <div class="col-lg-4 d-flex justify-content-end option-icon-group mt-2">

                    <span idElement="#formObservation<?= $observation->observation_id ?>" formGroup="containerObservation" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">
                        <i class="fas fa-edit"></i>
                    </span>

                    <span idElement="#formObservation<?= $observation->observation_id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/obervacoes/atualizar" toastData="Observação Atualizada" container="containerObservation" routeList="/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista" class="mr-2 update-data-icon" routeData="#formObservation<?= $observation->observation_id ?>" data-toggle="tooltip" data-placement="bottom" title="Atualizar">
                        <i class="fas fa-check"></i>
                    </span>

                    <span idElement="#formObservation<?= $observation->observation_id ?>" routeDelete="/admin/gestao/turma/perfil-turma/aluno/obervacoes/deletar" toastData="Observação Deletada" routeData="#formObservation<?= $observation->observation_id ?>" container="containerObservation" routeList="/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista" class="mr-2 delete-data-icon" data-toggle="tooltip" data-placement="right" title="Deletar">
                        <i class="fas fa-trash-alt"></i>
                    </span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

                <?php

function currentDate($array)
{

    date_default_timezone_set('America/Sao_Paulo');
    $today = date('d-m');

    $data = explode(' ', $array);
    $data = explode('-', $data[0]);
    $data = $data[2] . '/' . $data[1];

    $data = ($data == $today ? 'Hoje' : $data);

    return $data;
}

                ?>

                <div class="form-group col-lg-12">
                    <label for=""><?= $observation->discipline_name ?> - <?= $observation->unity ?> unidade :</label>
                    <textarea class="form-control mb-3 mt-2" name="description" disabled id="description" rows="3"><?= $observation->observation_description ?></textarea>

                    <div class="">
                        <div class="row">
                            <small class="col-lg-5 font-weight-bold"><?= $observation->course ?>-<?= $observation->series_acronym ?><?= $shift ?>-<?= $observation->ballot ?> </small>
                            <small class="col-lg-7 text-right font-weight-bold"> <i class="fas fa-history mr-2"></i> Realizada em <?= currentDate($observation->post_date) ?></small>
                        </div>

                    </div>
                </div>


            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhuma observação encontrada</h5>


<?php } ?>