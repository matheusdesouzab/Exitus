<?php 
require __DIR__ . '../../../../../config/variables.php';
?>

<?php if (count($this->view->listWarning) >= 1) { ?>

    <?php $photoDir =  "$app_url/assets/img/teacherProfilePhotos/" ?>

    <?php foreach ($this->view->listWarning as $i => $warning) { ?>

        <form id="formWarning<?= $warning->id ?>" class="card mb-4" action="">

            <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

                <input type="hidden" name="id" value="<?= $warning->id ?>">
                <input type="hidden" name="classId" value="<?= $warning->class_id ?>">

                <div class="col-lg-8 font-weight-bold">

                    <div class="row d-flex align-items-center">
                        <div class="col-2">
                            <img class="miniature-photo" src='<?= $warning->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $warning->teacher_profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                        </div>
                        <div class="col-10"><?= $warning->teacher_name ?> - <?= $warning->discipline_name ?></div>
                    </div>

                </div>

                <div class="col-lg-4 d-flex justify-content-end option-icon-group mt-2">

                    <span idElement="#formWarning<?= $warning->id ?>" formGroup="containerListWarning" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">
                        <i class="fas fa-edit"></i>
                    </span>

                    <span idElement="#formWarning<?= $warning->id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aviso/atualizar" toastData="Aviso Atualizado" container="containerListWarning" routeList="/admin/gestao/turma/perfil-turma/aviso/listagem" class="mr-2 update-data-icon" routeData="#formWarning<?= $warning->id ?>" data-toggle="tooltip" data-placement="top" title="Atualizar">
                        <i class="fas fa-check"></i>
                    </span>

                    <span idElement="#formWarning<?= $warning->id ?>" routeDelete="/admin/gestao/turma/perfil-turma/aviso/deletar" toastData="Aviso Deletado" routeData="#formWarning<?= $warning->id ?>" container="containerListWarning" routeList="/admin/gestao/turma/perfil-turma/aviso/listagem" class="mr-2 delete-data-icon" data-toggle="tooltip" data-placement="right" title="Deletar">
                        <i class="fas fa-trash-alt"></i>
                    </span>

                </div>

            </div>

            <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

                <?php

                $date = explode(' ', $warning->post_date);
                $date = explode('-', $date[0]);

                ?>

                <div class="form-group col-lg-12">
                    <label for="">Descrição do aviso:</label>
                    <textarea class="form-control mb-3 mt-2" name="description" disabled id="description" rows="5"><?= $warning->warning ?></textarea>

                    <div class="row">

                        <small class="font-weight-bold col-lg-12 text-right"> <i class="fas fa-history mr-2"></i> Adicionado em <?= $date[2] ?>/<?= $date[1] ?></small>

                    </div>
                </div>

            </div>

        </form>

    <?php }
} else { ?>

<div class="col-lg-12">

    <div class="row">

        <div class="col-lg-12 d-flex justify-content-center illustrations"><img class="" src="<?= $app_url ?>/assets/img/illustrations/warning.svg" alt=""></div> 

        <h5 class="col-lg-12 mt-4 text-center">Nenhum aviso adicionado</h5>

    </div>

</div>

<?php } ?>