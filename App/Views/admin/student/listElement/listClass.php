<?php

foreach ($this->view->listClass as $i => $class) {

    $class5 = $class->series_acronym . ' ' . $class->ballot . ' - Técnico em ' . $class->course . ' - ' . $class->shift . ' - Sala: ' . $class->classroom_number;

?>

    <option value="<?= $class->id_class ?>"><?= $class5 ?></option>

<?php } ?>