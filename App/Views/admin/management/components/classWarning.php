

<?php if (count($this->view->listWarning) >= 1) { ?>

<?php $photoDir =  "/assets/img/teacherProfilePhotos/" ?>

<?php foreach ($this->view->listWarning as $i => $warning) { ?>

    <form id="formWarning<?= $warning->id ?>" class="card mb-4" action="">

        <div class="form-row d-flex align-items-center col-lg-11 mx-auto">

            <input type="hidden" name="id" value="<?= $warning->id ?>">

            <div class="col-lg-8 font-weight-bold">

                <div class="row d-flex align-items-center">
                    <div class="col-2">
                        <img class="miniature-photo" src='<?= $warning->teacher_profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $warning->teacher_profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                    </div>
                    <div class="col-10"><?= $warning->teacher_name ?></div>
                </div>

            </div>

            <div class="col-lg-4 d-flex justify-content-end option-icon-group mt-2">

                <span idElement="#formWarning<?= $warning->id ?>" formGroup="containerWarning" class="mr-2 edit-data-icon">
                    <i class="fas fa-edit"></i>
                </span>

                <span idElement="#formWarning<?= $warning->id ?>" routeUpdate="/admin/gestao/turma/perfil-turma/aluno/obervacoes/atualizar" toastData="Observação Atualizada" container="containerWarning" routeList="/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista" class="mr-2 update-data-icon" routeData="#formWarning<?= $warning->id ?>">
                    <i class="fas fa-check"></i>
                </span>

                <span idElement="#formWarning<?= $warning->id ?>" routeDelete="/admin/gestao/turma/perfil-turma/aluno/obervacoes/deletar" toastData="Observação Deletada" routeData="#formWarning<?= $warning->id ?>" container="containerWarning" routeList="/admin/gestao/turma/perfil-turma/aluno/obervacoes/lista" class="mr-2 delete-data-icon">
                    <i class="fas fa-trash-alt"></i>
                </span>

            </div>

        </div>

        <div class="form-row mt-4 mb-2 col-lg-11 mx-auto">

            <?php

            $date = explode('-', $warning->post_date);

            ?>

            <div class="form-group col-lg-12">
                <label for=""><?= $warning->discipline_name ?></label>
                <textarea class="form-control mb-3 mt-2" name="description" disabled id="description" rows="3"><?= $warning->warning ?></textarea>
            </div>


        </div>

    </form>

<?php }
} else { ?>

<h5 class="mt-3">Nenhuma observação encontrada</h5>


<?php } ?>