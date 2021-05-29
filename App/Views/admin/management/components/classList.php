<?php

if (count($this->view->listClass) >= 1) {

    foreach ($this->view->listClass as $i => $class) { ?>

        <?php $shift = substr($class->shift, 0, 1) ?>

        <tr id="classe<?= $class->class_id ?>">
            <td><?= $class->course ?>-<?= $class->series_acronym ?><?= $shift ?>-<?= $class->ballot ?></td>
            <td><?= $class->student_total ?></td>
            <td><?= $class->school_term ?></td>
            <td>0.0</td>
        </tr>

    <?php } ?>

    <tr class="mt-4">
        <td colspan="5" style="background-color: #ECECEC;"><?= count($this->view->listClass) ?> turmas retornadas</td>
    </tr>

<?php } else { ?>

    <tr class="mt-4">
        <td colspan="4" style="pointer-events:none">Nenhuma turma adicionada</td>
    </tr>


<?php } ?>