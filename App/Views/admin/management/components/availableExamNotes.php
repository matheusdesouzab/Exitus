<?php

$vetor = [];

foreach ($this->view->listAddedNotes as $key => $exam) {
    array_push($vetor, $exam->exam_id);
}

?>

<h2></h2>

<select id="examName" name="examName" class="form-control custom-select" required>

    <?php foreach ($this->view->classExams as $key => $exam) { ?>

        <?php if (! in_array($exam->exam_id, $vetor)) { ?>

            <option noteValue="<?= $exam->exam_value ?>" value="<?= $exam->exam_id ?>">
                <?= $exam->exam_description ?> - da disciplina de <?= $exam->discipline_name ?> - da <?= $exam->unity ?> Unidade - no valor de <?= $exam->exam_value ?>

        <?php }
    } ?>

</select>