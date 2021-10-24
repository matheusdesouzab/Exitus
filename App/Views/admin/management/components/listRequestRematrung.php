<?php

$photoDir =  "/assets/img/studentProfilePhotos/";

$totalRequest = 0;

?>

<?php foreach ($this->view->listRematrugRequests as $key => $value) { ?>

    <?php if ($value->enrollmentTotal <= $value->seriesId) { ?>

        <?php $totalRequest++ ?>

        <form class="col-lg-12 card mt-3 p-3" id="addRematrung">

            <input type="hidden" value="<?= $value->studentId ?>" name="studentId">
            <input type="hidden" value="<?= $this->view->nextClass[0]->schoolTermId ?>" name="schoolTermId">
            <input type="hidden" value="<?= $this->view->nextClass[0]->classId ?>" name="classId">

            <div class="form-row">

                <div class="col-lg-6">

                    <div class="row d-flex align-items-center">

                        <div class="col-2">
                            <img class="miniature-photo" src='<?= $value->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                        </div>

                        <div class="col-10 text-left font-weight-bold"><?= $value->studentName ?></div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="row d-flex justify-content-end mr-2">

                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-light border border-info mr-2"><?= $value->studentSituationSchoolYear ?></button>
                            <button type="button" class="btn btn-light border border-info">Optou por <?= $value->rematrungSituation == 'Sim' ? 'continuar' : ' não continuar' ?> estudando</button>
                        </div>

                    </div>

                </div>

            </div>


            <div class="form-row mt-3">

                <div class="form-group col-lg-9">

                    <label>Próxima turma do aluno:</label>

                    <select id="unity" class="form-control custom-select" name="unity" required>

                        <?php foreach ($this->view->nextClass as $key => $class) { ?>

                            <option value="<?= $class->classId ?>"><?= $class->series ?> ª <?= $class->ballot ?> - <?= $class->course ?> - <?= $class->shift ?> - <?= $class->schoolYear ?> - Vagas: <?= $class->studentCapacity - $class->studentTotal ?></option>

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

<h5><?= $totalRequest == 0 ? "Nenhuma solicitação recente" : "" ?></h5>