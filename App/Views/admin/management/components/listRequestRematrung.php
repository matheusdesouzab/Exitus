<?php 

$photoDir =  "/assets/img/studentProfilePhotos/";

$totalRequest = 0 ;

?>

<?php foreach ($this->view->listRematrugRequests as $key => $value) { ?>

    <?php if($value->enrollmentTotal <= $value->seriesId){ ?>

    <?php $totalRequest++ ?>

    <form class="col-lg-12 card mt-3" id="addRematrung">

        <input type="hidden" value="<?= $value->studentId ?>" name="studentId">
        <input type="hidden" value="<?= $this->view->nextClass[0]->schoolTermId ?>" name="schoolTermId"> 
        <input type="hidden" value="<?= $this->view->nextClass[0]->classId ?>" name="classId"> 

        <div class="form-row d-flex align-items-center">

            <div class="col-lg-8 font-weight-bold">

                <div class="row d-flex align-items-center">
                    <div class="col-2 miniature-photo">
                        <img class="" src='<?= $value->profilePhoto == null ? $photoDir . "foto-vazia.jpg" : $photoDir . $value->profilePhoto ?>' onerror='this.src="<?= $photoDir . "foto-vazia.jpg" ?>"'>
                    </div>
                    <div class="col-10"><?= $value->studentName ?></div>
                </div>

            </div>

            <div class="col-lg-3">

                <div class="row d-flex justify-content-end">

                    <b class="text-right"><?= $value->studentSituationSchoolYear ?></b>

                </div>

            </div>

        </div>

        <hr>

        <div class="form-row mt-2">

            <div class="form-group col-lg-2">

                <label>Resposta:</label>

                <input type="text" class="form-control" disabled value="<?= $value->rematrungSituation ?>" id="">

            </div>

            <div class="form-group col-lg-10">

                <label>Próxima turma do aluno:</label>

                <select id="unity" class="form-control custom-select" name="unity" required>

                    <?php foreach ($this->view->nextClass as $key => $class) { ?>

                        <option value="<?= $class->classId ?>"><?= $class->series ?> ª <?= $class->ballot ?> - Técnico em <?= $class->course ?> - <?= $class->shift ?> - <?= $class->schoolYear ?> - Vagas: <?= $class->studentCapacity - $class->studentTotal ?></option>

                    <?php } ?>

                </select>

            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-lg-12 d-flex justify-content-end">

                <a id="buttonAddRematrung" class="btn btn-success" href="#">Rematrícular aluno</a>

            </div>

        </div>

        </div>

    </form>

<?php }} ?>

<h5><?= $totalRequest == 0 ? "Nenhuma solicitação recente" : "" ?></h5>