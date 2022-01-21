<?php

if (count($this->view->listClass) >= 1) {

    foreach ($this->view->listClass as $i => $class) { ?>

        <?php $shift = substr($class->shift, 0, 1) ?>

        <tr id="classe<?= $class->class_id ?>">
            <td><?= $class->course ?>-<?= $class->series_acronym ?><?= $shift ?>-<?= $class->ballot ?></td>
            <td><?= $class->classroom_number ?></td>
            <td><?= $class->student_total ?></td>
            <td><?= $class->school_term ?></td>
        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td colspan="5" class="font-weight-bold" style="pointer-events:none"><?= count($this->view->listClass) ?> turmas listadas <i class="fas fa-history ml-2"></i></td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td colspan="5" style="pointer-events:none">Nenhuma turma encontrada <i class="fas fa-history ml-2"></i></td>
    </tr>


<?php } ?>