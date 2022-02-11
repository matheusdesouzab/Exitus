<?php

$schoolPeriodSituation = null;

if (count($this->view->listSchoolTerm) >= 1) {

    foreach ($this->view->listSchoolTerm as $i => $schoolTerm) { ?>

        <?php if ($schoolTerm->fk_id_situation_school_term == 1) {

            $schoolPeriodSituation = "school-term-active";

        } else if ($schoolTerm->fk_id_situation_school_term == 2) {

            $schoolPeriodSituation = "school-term-finished";

        } else {

            $schoolPeriodSituation = "school-term-scheduled";
        } ?>

        <form id="formSchoolTerm<?= $schoolTerm->school_term_id ?>" class="card mb-4 <?= $schoolPeriodSituation ?>" >

            <div class="form-row col-lg-11 mx-auto d-flex align-items-center option-icon-group">

                <div class="col-sm-8 font-weight-bold">Período letivo do ano de <?= $schoolTerm->school_year ?></div>

                <?php 

                if (!isset($_SESSION)) session_start();
                
                if($_SESSION['Admin']['hierarchyFunction'] == 1){ 
                    
                ?>

                <div class="col-sm-4 d-flex justify-content-end mt-2">

                    <span idElement="#formSchoolTerm<?= $schoolTerm->school_term_id ?>" formGroup="containerListSchoolTerm" class="mr-2 edit-data-icon" data-toggle="tooltip" data-placement="left" title="Editar">

                        <i class="fas fa-edit"></i>

                    </span>

                    <span idElement="#formSchoolTerm<?= $schoolTerm->school_term_id ?>" routeUpdate="/admin/gestao/periodo-letivo/atualizar" toastData="Periodo Letivo Atualizado" container="containerListSchoolTerm" routeList="/admin/gestao/periodo-letivo/lista" class="mr-2 update-data-icon" data-toggle="tooltip" data-placement="bottom" title="Atualizar">

                        <i class="fas fa-check"></i>

                    </span>

                    <!-- <span idElement="#formSchoolTerm<?= $schoolTerm->school_term_id ?>" routeDelete="/admin/gestao/periodo-letivo/deletar" toastData="Periodo Letivo Deletado" container="containerListSchoolTerm" routeList="/admin/gestao/periodo-letivo/lista" class="mr-2 delete-data-icon" data-toggle="tooltip" data-placement="right" title="Deletar">

                        <i class="fas fa-trash-alt"></i>

                    </span> -->

                </div>

                <?php } ?>

            </div>

            <div class="form-row col-lg-11 mx-auto mt-4 mb-2">

                <input class="form-control" name="schoolTermId" value="<?= $schoolTerm->school_term_id ?>" type="hidden">

                <div class="form-group col-sm-4">
                    <label for="startDate">Data de início:</label>
                    <input class="form-control" disabled name="startDate" value="<?= $schoolTerm->start_date ?>" type="date" id="startDate">
                </div>

                <div class="form-group col-sm-4">
                    <label for="endDate">Data de fim:</label>
                    <input class="form-control" disabled value="<?= $schoolTerm->end_date ?>" type="date" name="endDate" id="endDate">
                </div>

                <div class="form-group col-sm-4">

                    <label for="schoolTermSituation">Situação:</label>

                    <select name="schoolTermSituation" disabled id="schoolTermSituation" class="form-control custom-select" name="schoolTermSituation" required>

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

    <h5 class="mt-3">Nenhuma periodo letivo adicionado</h5>

<?php } ?>