<?php

foreach ($this->view->listClass as $i => $class) {

    $totalVacancies = $class->class_capacity - $class->student_total;


    $newName = $class->series_acronym . ' ' . $class->ballot . ' - ' . $class->course . ' - ' . $class->shift . ' - Sala: ' . $class->classroom_number . ' - ' . 'Vagas: ' . $totalVacancies;

?>
    <?php if ($totalVacancies >= 1) { ?>

        <option value="<?= $class->id_class ?>"><?= $newName ?></option>

    <?php } ?>

<?php } ?>