<?php

if (count($this->view->listSchoolTerm) >= 1) {

    foreach ($this->view->listSchoolTerm as $i => $schoolTerm) { ?>

        <form id="formSchoolTerm<?= $schoolTerm->school_term_id ?>" class="card mb-4" action="" style='<?= $schoolTerm->fk_id_situation_school_term == 1 ? "border-left: 5px solid blue" : "" ?>'>

            <div class="form-row col-lg-11 mx-auto d-flex align-items-center">

                <div class="col-lg-8 font-weight-bold mudar-de-cor">Período letivo do ano de <?= $schoolTerm->school_year ?></div>

                <div class="col-lg-4 d-flex justify-content-end mt-2">

                    <span idElement="#formSchoolTerm<?= $schoolTerm->school_term_id ?>" formGroup="containerListSchoolTerm" class="mr-2 edit-data-icon">

                        <i class="fas fa-edit"></i>

                    </span>

                    <span idElement="#formSchoolTerm<?= $schoolTerm->school_term_id ?>" routeUpdate="/admin/gestao/periodo-letivo/atualizar" toastData="Periodo Letivo Atualizado" container="containerListSchoolTerm" routeList="/admin/gestao/periodo-letivo/lista" class="mr-2 update-data-icon">

                        <i class="fas fa-check"></i>

                    </span>

                    <span idElement="#formSchoolTerm<?= $schoolTerm->school_term_id ?>" routeDelete="/admin/gestao/periodo-letivo/deletar" toastData="Periodo Letivo Deletado" container="containerListSchoolTerm" routeList="/admin/gestao/periodo-letivo/lista" class="mr-2 delete-data-icon">

                    <i class="fas fa-trash-alt"></i>

                    </span>

                </div>

            </div>

            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">

                <input class="form-control" name="schoolTermId" value="<?= $schoolTerm->school_term_id ?>" type="hidden">

                <div class="form-group col-lg-4">
                    <label for="">Data de início:</label>
                    <input class="form-control" disabled name="startDate" value="<?= $schoolTerm->start_date ?>" type="date" id="">
                </div>

                <div class="form-group col-lg-4">
                    <label for="">Data de fim:</label>
                    <input class="form-control" disabled value="<?= $schoolTerm->end_date ?>" type="date" name="endDate" id="">
                </div>

                <div class="form-group col-lg-4">

                    <label for="">Situação:</label>

                    <select name="schoolTermSituation" disabled id="inputState" class="form-control custom-select" name="schoolTermSituation" required>

                        <option value="<?= $schoolTerm->fk_id_situation_school_term ?>"><?= $schoolTerm->situation_school_term ?></option>

                        <?php foreach ($this->view->listSchoolTermStates as $i => $situation) { ?>
                            <?php if ($situation->option_value != $schoolTerm->fk_id_situation_school_term) { ?>
                                <option value="<?= $situation->option_value ?>"><?= $situation->option_text ?></option>
                        <?php }
                        } ?>
                        
                    </select>

                </div>

            </div>

        </form>

    <?php }
} else { ?>

    <h5 class="mt-3">Nenhuma periodo letivo encontrado</h5>

<?php } ?>