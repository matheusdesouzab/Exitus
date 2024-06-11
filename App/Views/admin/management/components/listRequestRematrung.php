<?php
 
require __DIR__ . '../../../../../config/variables.php';

$photoDir =  "$app_url/assets/img/studentProfilePhotos/";

$totalRequest = 0;

?>

<?php foreach ($this->view->listRematrugRequests as $key => $value) { ?>

    <?php if ($value->enrollment_total <= $value->series_id) { ?>

        <?php $totalRequest++ ?>

        <form class="col-lg-12 col-sm-11 mx-auto card mt-3 p-3" id="addRematrung">

            <input type="hidden" value="<?= $value->student_id ?>" name="studentId">
            <input type="hidden" value="<?= $this->view->nextClass[0]->school_term_id ?>" name="schoolTermId">
            <input type="hidden" value="<?= $this->view->nextClass[0]->class_id ?>" name="classId">

            <div class="form-row">

                <div class="col-lg-6">

                    <div class="row d-flex align-items-center">

                        <div class="col-2">
                            <img class="miniature-photo" src='<?= $value->profile_photo == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profile_photo ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>" ' style="width: 30px;">
                        </div>

                        <div class="col-10 text-left font-weight-bold"><?= $value->student_name ?></div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="row d-flex justify-content-end mr-2">

                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-light border border-info mr-2"><?= $value->student_situation_school_year ?></button>
                            <button type="button" class="btn btn-light border border-info">Optou por <?= $value->rematrung_situation == 'Sim' ? 'continuar' : ' não continuar' ?> estudando</button>
                        </div>

                    </div>

                </div>

            </div>


            <div class="form-row mt-3">

                <div class="form-group col-lg-9">

                    <label>Próxima turma do aluno:</label>

                    <select id="newClass" class="form-control custom-select" name="newClass" required>

                        <?php foreach ($this->view->nextClass as $key => $class) { ?>

                            <option value="<?= $class->class_id ?>"><?= $class->series ?> ª <?= $class->ballot ?> - <?= $class->course ?> - <?= $class->shift ?> - <?= $class->school_year ?> - Vagas: <?= $class->student_capacity - $class->student_total ?></option>

                        <?php } ?>

                    </select>

                </div>

                <div class="form-group col-lg-3">

                    <label for="">&nbsp; </label><br>

                    <a id="buttonAddRematrung" class="btn btn-success w-100" href="#">Rematrícular aluno</a>

                </div>

            </div>

        </form>

<?php }
} ?>

<?php if ($totalRequest == 0) { ?>

    <div class="col-lg-12">

        <div class="row">

            <div class="col-lg-12 d-flex justify-content-center"><img class="" src="<?= $app_url ?>/assets/img/illustrations/arrived.svg" alt=""></div> 

            <h5 class="col-lg-12 mt-4 text-center">Nenhuma solicitação recebida</h5>

        </div>

    </div>

<?php } ?>